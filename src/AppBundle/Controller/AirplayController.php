<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\DiscoController;
use AppBundle\Entity\Airplay;
use AppBundle\Entity\AirplayCd;
use AppBundle\Form\AirplayType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;


class AirplayController extends DiscoController
{
    /**
     * @Route("/airplay/{page}", name="airplay")
     */
    public function indexAction(Request $request, $page = 1)
    {
        $this->denyAccessUnlessGranted('ROLE_USER', null, 'Vous devez être connecté pour voir cette page.');

        $doctrine = $this->getDoctrine();
        $em = $doctrine->getManager();
        $limit = 10;

        $airplays = $em->getRepository('AppBundle:Airplay')->createQueryBuilder('a')
            ->orderBy('a.airplay','DESC')
            ->setFirstResult(($page-1)*10)
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();

        $nbAirplay = $em->getRepository('AppBundle:Airplay')->createQueryBuilder('a')
            ->select('count(a)')
            ->getQuery()
            ->getSingleScalarResult();

        $pageMax = ceil($nbAirplay/10);

        $nonPublies = $request->request->get('non_publies');
        $publies = $request->request->get('publie');

        if($publies or $nonPublies) {
            if ($nonPublies) {
                $tabNonPublies = explode(",", $request->request->get('non_publies'));

                foreach ($tabNonPublies as $key => $publication) {
                    if ($publication) {
                        $airplay = $em->getRepository('AppBundle:Airplay')->find($publication);
                        $airplay->setPublie(false);
                        $em->persist($airplay);
                    }
                }                
            }

            if($publies) {
                foreach ($publies as $key => $publication) {
                    $airplay = $em->getRepository('AppBundle:Airplay')->find($publication);
                    $airplay->setPublie(true);
                    $em->persist($airplay);
                }
            }

            $this->discoLog("a modifié les publications d'Airplays");
            $this->addFlash('success','Les publications d\'Airplays ont été éditées.');

        }

        $em->flush();

        return $this->render('airplay/search.html.twig',array(
                'airplays'=>$airplays,
                'page' => $page,
                'pageMax' => $pageMax
            ));
    }

    /**
     * @Route("/airplay/show/{id}", name="showAirplay")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $airplay = $em->getRepository('AppBundle:Airplay')->find($id);

        if(!$airplay) {
            throw $this->createNotFoundException(
                'Aucun airplay trouvé pour cet id : '.$id
            );
        }

        $liste = $em->getRepository('AppBundle:AirplayCd')->findBy(
                array('airplay' => $id),
                array('ordre' => 'asc')
            );

        return $this->render('airplay/show.html.twig', array(
                'airplay' => $airplay,
                'liste' => $liste
            ));

    }

    /**
     * Création d'une date minimale
     */
    private function dateMini($date_mini)
    {
        if(!empty($date_mini)) {
            return $date_mini = substr($date_mini,6,4).'-'.substr($date_mini,3,2).'-'.substr($date_mini,0,2).' 00:00:00';
        } else {
            return $date_mini = date("Y-m-d H:i:s", mktime(0,0,0,date("m")-3, date("d"), date("Y")));
        }
    }

    /**
     * Fonction pour générer un airplay à partir de paramètres
     */
    private function generateAirplay($date_mini, $type)
    {
        return $this->getDoctrine()->getManager()->createQuery(
                    'SELECT cd
                    FROM AppBundle:Cd cd
                    WHERE cd.rotation <= 3
                        AND cd.dsaisie >= :date_mini
                        AND cd.type IN (:type_select)
                        AND cd.airplay = 0
                        AND cd.suppr = 0
                    ORDER BY cd.rotation DESC,
                        cd.noteMoy DESC'
                )
                ->setParameter('date_mini',$date_mini)
                ->setParameter('type_select', $type)
                ->getResult();
    }

    /**
     * Permet de sauver l'état de l'Airplay
     */
    private function saveAirplay($airplay, $request, $rq, $cUser = false)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->get('security.context')->getToken()->getUser();
        if ($cUser) {
            $airplay->setCuser($user);
        }
        $airplay->setMuser($user);

        $classement = explode(",", $request->request->get('classement'));

        if($rq->get('publier')) {
            $airplay->setPublie(true);
        } else {
            $airplay->setPublie(false);
        }

        $em->persist($airplay);
        $em->flush();

        $em->createQuery(
            'DELETE FROM AppBundle:AirplayCd ac
                WHERE ac.airplay = :airplay'
            )
            ->setParameter('airplay',$airplay->getAirplay())
            ->getResult();

        foreach ($classement as $key => $row) {
            if($row && $row != "") {
                $cd = $em->getRepository('AppBundle:Cd')->find($row);
                if($cd) {
                    $airplay_cd = new AirplayCd();
                    $airplay_cd->setCd($cd);
                    $airplay_cd->setAirplay($airplay);
                    $airplay_cd->setOrdre($key+1);

                    $em->persist($airplay_cd);
                } else {
                    $this->addFlash('error','Erreur lors du traitement d\'un CD.');
                }
            }
        }

        $em->flush();
    }

    /**
     * Return en fonction de l'édition ou création
     */
    private function returnHtmlAirplay($action,$form,$generatedAirplay,$types,$date_mini,$type)
    {
        return $this->render('airplay/'.$action.'.html.twig',array(
            'form'=>$form->createView(),
            'generation'=>$generatedAirplay,
            'types' => $types,
            'date_mini' => $date_mini,
            'types_check' => $type
        ));
    }

    /**
     * @Route("/airplay/edit/{id}", name="editAirplay")
     */
    public function editAction(Request $request, $id)
    {
        $this->denyAccessUnlessGranted('ROLE_PROGRA', null, 'Seul un programmateur peut éditer un airplay.');

        $em = $this->getDoctrine()->getManager();
        $rq = $request->request;

        $airplay = $em
            ->getRepository('AppBundle:Airplay')
            ->find($id);

        if(!$airplay) {
            throw $this->createNotFoundException(
                'Aucun airplay trouvé pour cet id : '.$id
            );
        }

        $types = $em->getRepository('AppBundle:Type')->findAll();

        $form = $this->createForm(new AirplayType(),$airplay);
        $form->add('submit', 'submit', array(
                'label' => 'Editer l\'Airplay',
                'attr' => array('class' => 'btn btn-success btn-block','style'=>'font-weight:bold')
            ));

        $form->handleRequest($request);

        $date_mini = $this->dateMini($rq->get('date'));

        $generatedAirplay = $em->createQuery(
                'SELECT cd
                FROM AppBundle:Cd cd, AppBundle:AirplayCd ac
                WHERE cd.cd = ac.cd
                    AND ac.airplay = :airplay
                ORDER BY ac.ordre ASC'
            )
            ->setParameter('airplay',$id)
            ->getResult();



        if($request->isMethod('POST') && !empty($rq->get('appbundle_airplay'))) {


            if ($form->isValid()) {

                $this->saveAirplay($airplay, $request, $rq);

                $this->discoLog("a modifié l'airplay ".$airplay->getAirplay()." '".$airplay->getLibelle()."'");
                $this->addFlash('success','L\'Airplay a bien été modifié !');

                return $this->redirect($this->generateUrl('editAirplay',array('id'=>$airplay->getAirplay())));

            } else {
                if ($request->isMethod('POST')) {
                    $this->addFlash('error','Les champs on été mal renseignés.');
                }
           }
        }

        return $this->returnHtmlAirplay('edit',$form,$generatedAirplay,$types,$date_mini,$rq->get('type'));
    }

    /**
     * @Route("/airplay/create", name="createAirplay")
     */
    public function createAction(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_PROGRA', null, 'Seul un programmateur peut créer un airplay.');

        $post = new Airplay();
        
        $form = $this->createForm(new AirplayType());
        $form->add('submit', 'submit', array(
                'label' => 'Créer l\'Airplay',
                'attr' => array('class' => 'btn btn-success btn-block','style'=>'font-weight:bold')
            ));

        $form->handleRequest($request);

        $rq = $request->request;

        $airplay = $form->getData();
        $em = $this->getDoctrine()->getManager();

        $types = $em->getRepository('AppBundle:Type')->findAll();

        $date_mini = $this->dateMini($rq->get('date'));

        $generatedAirplay = $this->generateAirplay($date_mini, $rq->get('type'));

        if($request->isMethod('POST') && !empty($rq->get('appbundle_airplay'))) {
            if ($form->isValid()) {

                $this->saveAirplay($airplay, $request, $rq, true);

                $this->discoLog("a créé l'airplay ".$airplay->getAirplay()." '".$airplay->getLibelle()."'");
                $this->addFlash('success','L\'Airplay a bien été créé !');

                return $this->redirect($this->generateUrl('editAirplay',array('id'=>$airplay->getAirplay())));

            } else {
                if ($request->isMethod('POST')) {
                    $this->addFlash('error','Les champs on été mal renseignés.');
                }
           }
        }

        return $this->returnHtmlAirplay('create',$form,$generatedAirplay,$types,$date_mini,$rq->get('type'));

    }

}
