<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\DiscoController;
use AppBundle\Entity\Artiste;
use AppBundle\Form\ArtisteType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;


class ArtisteController extends DiscoController
{
    /**
     * @Route("/artiste", name="artiste")
     */
    public function indexAction(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_USER', null, 'Une connexion est nécessaire.');

    	$doctrine = $this->getDoctrine();
	    $em = $doctrine->getManager();
    	$limit = $this->container->getParameter('listinglimit');

    	$retour = null;

    	if($request->isMethod("POST")) {

    		$num = $request->request->getInt('num',-1);
    		$libelle = $request->request->get('nom');

    		if($num >= 1) {
	    		return $this->redirect($this->generateUrl('showArtiste',array('id'=>$num)));
	    	}

    		$retour = $em->getRepository('AppBundle:Artiste')->createQueryBuilder('a')
    			->where('a.libelle LIKE :libelle')
    			->setParameter('libelle','%'.$libelle.'%')
    			->orderBy('a.libelle','ASC')
				->setMaxResults($limit)
				->getQuery()
				->getResult();

    	} else {
    		$retour = $em->getRepository('AppBundle:Artiste')->createQueryBuilder('a')
    			->orderBy('a.artiste','DESC')
    			->setMaxResults($limit)
    			->getQuery()
    			->getResult();
    	}

        if (!$retour) {
            $this->addFlash('error','Auncun résultat pour cette recherche.');
        }


        return $this->render('artiste/search.html.twig',array(
	        	'recherche'=>$retour,
	        	'post'=>$request->request->all()
        	));
    }

    /**
	 * @Route("/artiste/show/{id}", name="showArtiste")
     */
	public function showAction($id) {
        $this->denyAccessUnlessGranted('ROLE_USER', null, 'Une connexion est nécessaire.');

		$artiste = $this->getDoctrine()
			->getRepository('AppBundle:Artiste')
			->find($id);

		if(!$artiste) {
			throw $this->createNotFoundException(
            	'Aucun artiste trouvé pour cet id : '.$id
        	);
		}

		return $this->render(
		    'artiste/show.html.twig',
		    array('artiste' => $artiste)
		);
	}

    /**
     * @Route("/artiste/delete/{id}", name="deleteArtiste", options={"expose"=true})
     */
    public function deleteAction($id) {
        $this->denyAccessUnlessGranted('ROLE_PROGRA', null, 'Seul un programmateur peut supprimer un artiste.');

        $artiste = $this->getDoctrine()
            ->getRepository('AppBundle:Artiste')
            ->find($id);

        if(!$artiste) {
            throw $this->createNotFoundException(
                'Aucun artiste trouvé pour cet id : '.$id
            );
        }

        $em = $this->getDoctrine()->getManager();
        if($artiste->getDisques()->isEmpty()) {
            $em->remove($artiste);
            $em->flush();
            $this->addFlash('success','Suppression effectuée !');
            $this->discoLog("a supprimé l'artiste ".$artiste->getArtiste()." - ".$artiste->getLibelle());
            return $this->redirect($this->generateUrl('artiste'));
        } else {
            $this->addFlash('error','Un artiste lié à des disques ne peut pas être supprimé !');
            return $this->redirect($this->generateUrl('showArtiste',array('id'=>$id)));
        }
    }

    /**
     * @Route("/artiste/edit/{id}", name="editArtiste")
     */
    public function editAction($id, Request $request) {
        $this->denyAccessUnlessGranted('ROLE_PROGRA', null, 'Seul un programmateur peut modifier un artiste.');

        $artiste = $this->getDoctrine()
            ->getRepository('AppBundle:Artiste')
            ->find($id);

        if(!$artiste) {
            throw $this->createNotFoundException(
                'Aucun artiste trouvé pour cet id : '.$id
            );
        }

        $form = $this->createForm(new ArtisteType(),$artiste);

        $form->add('submit', 'submit', array(
                'label' => 'Sauvegarder l\'Artiste',
                'attr' => array('class' => 'btn btn-success btn-block','style'=>'font-weight:bold')
            ));
        $form->handleRequest($request);

        if($request->isMethod('POST')){
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->flush();
                $this->discoLog("a modifié l'artiste ".$artiste->getArtiste()." ".$artiste->getLibelle());
                $this->addFlash('success','L\'Artiste a bien été édité !');
            } else {
                $this->addFlash('error','Les champs on été mal renseignés.');
            }
        }

        return $this->render('artiste/edit.html.twig',array('form'=>$form->createView(),'artiste' => $artiste));

    }

    /**
     * @Route("/artiste/create/{libelle}", name="createArtiste", options={"expose"=true})
     */
    public function createAction(Request $request, $libelle = "")
    {
        $this->denyAccessUnlessGranted('ROLE_PROGRA', null, 'Seul un programmateur peut créer un artiste.');

        $artiste = new Artiste();
        $artiste->setLibelle($libelle);
        $form = $this->createForm(new ArtisteType(),$artiste);
        $form->add('submit', 'submit', array(
                'label' => 'Créer l\'Artiste',
                'attr' => array('class' => 'btn btn-success btn-block','style'=>'font-weight:bold')
            ));

        if($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();

                $em->persist($artiste);
                $em->flush();

                $this->discoLog("a créé l'artiste ".$artiste->getArtiste()." ".$artiste->getLibelle());
                $this->addFlash('success','L\'Artiste a bien été créé !');

                return $this->redirect($this->generateUrl('showArtiste',array('id'=>$artiste->getArtiste())));

            } else {
                $this->addFlash('error','Les champs on été mal renseignés.');
           }
        }
        return $this->render('artiste/create.html.twig',array('form'=>$form->createView()));
    }


    /**
     *  @Route("/artiste/autocomplete/{like}", name="autocompleteArtiste", options={"expose"=true})
     */
    public function autocompleteAction($like, Request $request)
    {
        $limit = $this->container->getParameter('autocompletelimit');

        $em = $this->getDoctrine()->getManager();
        $res = $em->getRepository('AppBundle:Artiste')->createQueryBuilder('a')
            ->select('a.artiste AS num, a.libelle AS label, a.libelle AS value');
        if($like) {
            $res = $res->where('a.libelle LIKE :libelle')
                ->setParameter('libelle','%'.$request->query->get('term').'%');
        } else {
            $res = $res->where('a.libelle = :libelle')
                ->setParameter('libelle',$request->query->get('term'));
        }
        $res = $res
            ->orderBy('a.libelle','ASC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();

        $response = new JsonResponse();
        $response->setData($res);
        return $response;
    }

    /**
     *  @Route("/artiste/doublons", name="antiDoublonsArtiste")
     */
    public function antiDoublonsAction(Request $request)
    {
      $rep = $this->getDoctrine()->getRepository('AppBundle:Artiste');

      $artisteAConserver = false;
      $artiste = false;

      if ($request->isMethod('POST')) {
        $artisteAConserver = $rep->findOneBy(array('libelle' => $request->request->get('artisteAConserver')));
        $artiste = $rep->findOneBy(array('libelle' => $request->request->get('artiste')));
        if ($artiste && $artisteAConserver) {
          $step = $request->request->getInt('step',1);
          if ($step == 1) {
            $this->addFlash('info',"Vérifiez et confirmez en bas de la page");
          } else if ($step == 2) {
            if ($request->request->get('confirm') == "oui") {

              foreach($artiste->getDisques() as $cd) {
                $cd->setArtiste($artisteAConserver);
              }

              $exId = $artiste->getArtiste();
              $exNom = $artiste->getLibelle();

              $em = $this->getDoctrine()->getManager();
              $em->remove($artiste);
              $em->flush();
              $this->addFlash('success',$exNom.' a été remplacé par '.$artisteAConserver->getLibelle());
              $this->discoLog("a remplacé $exNom ($exId) par ".$artisteAConserver->getLibelle());
              return $this->redirect($this->generateUrl('artiste'));

            } else {
              $this->addFlash('error',"C'est votre dernier mot ?");
            }
          }
        } else if (!$artiste) {
          $this->addFlash('error','Impossible de trouver '.$request->request->get('artiste'));
        } else {
          $this->addFlash('error','Impossible de trouver '.$request->request->get('artisteAConserver'));
        }
      }

      return $this->render('artiste/doublons.html.twig',array(
        'artiste' => $artiste,
        'artisteAConserver' => $artisteAConserver
      ));
    }
}
