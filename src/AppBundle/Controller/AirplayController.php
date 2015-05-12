<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Airplay;
use AppBundle\Form\AirplayType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;


class AirplayController extends Controller
{
    /**
     * @Route("/airplay", name="airplay")
     */
    public function indexAction(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_USER', null, 'Vous devez être connecté pour voir cette page.');

        $doctrine = $this->getDoctrine();
        $em = $doctrine->getManager();
        $limit = $this->container->getParameter('listingLimit');

        $airplays = $em->getRepository('AppBundle:Airplay')->createQueryBuilder('a')
            ->orderBy('a.airplay','DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();

        return $this->render('airplay/search.html.twig',array(
                'airplays'=>$airplays
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
     * @Route("/airplay/edit/{id}", name="editAirplay")
     */
    public function editAction(Request $request, $id)
    {
        $this->denyAccessUnlessGranted('ROLE_PROGRA', null, 'Seul un programmateur peut éditer un airplay.');

        $airplay = $this->getDoctrine()
            ->getRepository('AppBundle:Airplay')
            ->find($id);

        if(!$artiste) {
            throw $this->createNotFoundException(
                'Aucun airplay trouvé pour cet id : '.$id
            );
        }

        $form = $this->createForm(new AirplayType(),$airplay);
        $form->add('submit', 'submit', array(
                'label' => 'Editer l\'Airplay',
                'attr' => array('class' => 'btn btn-success btn-block','style'=>'font-weight:bold')
            ));

        $form->handleRequest($request);

    }

    /**
     * @Route("/airplay/create", name="createAirplay")
     */
    public function createAction(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_PROGRA', null, 'Seul un programmateur peut créer un airplay.');

        $post = new Airplay();
        $form = $this->createForm(new AirplayType(),$post);
        $form->add('submit', 'submit', array(
                'label' => 'Créer l\'Airplay',
                'attr' => array('class' => 'btn btn-success btn-block','style'=>'font-weight:bold')
            ));

        $form->handleRequest($request);

        $rq = $request->request;

        $data = $form->getData();
        $em = $this->getDoctrine()->getManager();

        $types = $em->getRepository('AppBundle:Type')->findAll();

        if(!empty($rq->get('date'))) {
            $date_mini = substr($rq->get('date'),6,4).'-'.substr($rq->get('date'),3,2).'-'.substr($rq->get('date'),0,2).' 00:00:00';
        } else {
            $date_mini = date("Y-m-d H:i:s", mktime(0,0,0,date("m")-3, date("d"), date("Y")));
        }
        
        $generatedAirplay = $em->createQuery(
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
            ->setParameter('type_select', $rq->get('type'))
            ->getResult();

        if($request->isMethod('POST') && !empty($rq->get('appbundle_airplay'))) {
            if ($form->isValid()) {

                $em->persist($data);
                $em->flush();

                $num = $em->createQuery(
                        'SELECT max(a.airplay)
                        FROM AppBundle:Airplay a')
                    ->getResult()[0][1];

                $this->addFlash('success','L\'Airplay a bien été créé !');

                return $this->redirect($this->generateUrl('editAirplay',array('id'=>$num)));

            } else {
                if ($request->isMethod('POST')) {
                    $this->addFlash('error','Les champs on été mal renseignés.');
                }
           }
        }
        return $this->render('airplay/create.html.twig',array('form'=>$form->createView(),'generation'=>$generatedAirplay, 'types' => $types, 'date' => $date_mini, 'types_check' => $rq->get('type')));

    }

}