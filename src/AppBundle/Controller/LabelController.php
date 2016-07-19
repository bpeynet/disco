<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\DiscoController;
use AppBundle\Entity\Label;
use AppBundle\Form\LabelType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;


class LabelController extends DiscoController
{
    /**
     * @Route("/label", name="label")
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

	    		return $this->redirect($this->generateUrl('showLabel',array('id'=>$num)));
	    	}

    		$retour = $em->getRepository('AppBundle:Label')->createQueryBuilder('l')
    			->where('l.libelle LIKE :libelle')
    			->setParameter('libelle','%'.$libelle.'%')
				->orderBy('l.libelle', 'ASC')
				->setMaxResults($limit)
				->getQuery()
				->getResult();

    	} else {
    		$retour = $em->getRepository('AppBundle:Label')->createQueryBuilder('l')
    			->orderBy('l.libelle','ASC')
    			->setMaxResults($limit)
    			->getQuery()
    			->getResult();
    	}

        if (!$retour) {
            $this->addFlash('error','Aucun résultat pour cette recherche.');
        }

        return $this->render('label/search.html.twig',array(
	        	'recherche'=>$retour,
	        	'post'=>$request->request->all()
        	));
    }

    /**
     * @Route("/label/show/{id}", name="showLabel")
     */
    public function showAction($id) {
        $this->denyAccessUnlessGranted('ROLE_USER', null, 'Une connexion est nécessaire.');

        $label = $this->getDoctrine()
            ->getRepository('AppBundle:Label')
            ->find($id);

        if(!$label) {
            throw $this->createNotFoundException(
                'Aucun Label trouvé pour cet id : '.$id
            );
        }

        return $this->render(
            'label/show.html.twig',
            array('label' => $label)
        );
    }

    /**
	 * @Route("/label/delete/{id}", name="deleteLabel", options={"expose"=true})
     */
	public function deleteAction($id) {
        $this->denyAccessUnlessGranted('ROLE_PROGRA', null, 'Seul un programmateur peut supprimer un label.');

		$label = $this->getDoctrine()
			->getRepository('AppBundle:Label')
			->find($id);

		if(!$label) {
			throw $this->createNotFoundException(
            	'Aucun Label trouvé pour cet id : '.$id
        	);
		}

        $em = $this->getDoctrine()->getManager();
        if($label->getDisques()->isEmpty()) {
            $this->discoLog("a supprimé de label ".$label->getLabel()." ".$label->getLibelle());
            $em->remove($label);
            $em->flush();

            $this->addFlash('success','Le Label a bien été supprimé.');
            return $this->redirect($this->generateUrl('label'));
        } else {
            $this->addFlash('error','Un Label lié à des disques ne peut pas être supprimé !');
        }
        return $this->redirect($this->generateUrl('showLabel',array('id'=>$label->getLabel())));

	}


    /**
     * @Route("/label/edit/{id}", name="editLabel")
     */
    public function editAction($id,Request $request) {
        $this->denyAccessUnlessGranted('ROLE_PROGRA', null, 'Seul un programmateur peut modifier un label.');

        $label = $this->getDoctrine()
            ->getRepository('AppBundle:Label')
            ->find($id);

        if(!$label) {
            throw $this->createNotFoundException(
                'Aucun Label trouvé pour cet id : '.$id
            );
        }

        $form = $this->createForm(new LabelType(),$label);

        $form->add('submit', 'submit', array(
                'label' => 'Sauvegarder',
                'attr' => array('class' => 'btn btn-success btn-block','style'=>'font-weight:bold')
            ));
        $form->handleRequest($request);

        if($request->isMethod('POST')) {
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager()->flush();

                $this->discoLog("a édité le label ".$label->getLabel()." ".$label->getLibelle());
                $this->addFlash('success','Edition terminée !');

            } else {
                $this->addFlash('error','Problème(s) lors de l\'édition.');
            }

        }
        return $this->render('label/edit.html.twig',array('form'=>$form->createView(),'label'=>$label));
    }

    /**
     * @Route("/label/create/{libelle}", name="createLabel", options={"expose"=true}, requirements={"libelle"=".+"})
     */
    public function createAction(Request $request, $libelle="")
    {
        $this->denyAccessUnlessGranted('ROLE_PROGRA', null, 'Seul un programmateur peut créer un label.');

        $label = new Label();
        $label->setLibelle($libelle);
        $form = $this->createForm(new LabelType(),$label);
        $form->add('submit', 'submit', array(
                'label' => 'Créer le Label',
                'attr' => array('class' => 'btn btn-success btn-block','style'=>'font-weight:bold')
            ));

        $form->handleRequest($request);

        if($request->isMethod('POST')) {
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($label);
                $em->flush();

                $num = $label->getLabel();

                $this->discoLog("a créé le label ".$label->getLabel()." ".$label->getLibelle());
                $this->addFlash('success','Le label a été créé !');

                return $this->redirect($this->generateUrl('showLabel',array('id'=>$num)));
            } else {
                $this->addFlash('error','Certains champs sont mal remplis.');
                return $this->render('label/create.html.twig',array('form'=>$form->createView()));
            }
        }

        return $this->render('label/create.html.twig',array('form'=>$form->createView()));
    }

    /**
     *  @Route("/label/autocomplete/{like}", name="autocompleteLabel", options={"expose"=true}, requirements={"like"=".+"})
     */
    public function autocompleteAction($like, Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_USER', null, 'Une connexion est nécessaire.');

        $limit = $this->container->getParameter('autocompletelimit');

        $em = $this->getDoctrine()->getManager();
        $res = $em->getRepository('AppBundle:Label')->createQueryBuilder('l')
            ->select('l.label AS num, l.libelle AS label, l.libelle AS value');
        if($like) {
            $res = $res->where('l.libelle LIKE :libelle')
                ->setParameter('libelle','%'.$request->query->get('term').'%');
        } else {
            $res = $res->where('l.libelle = :libelle')
                ->setParameter('libelle',$request->query->get('term'));
        }
            $res= $res
            ->orderBy('l.libelle','ASC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();

        $response = new JsonResponse();
        $response->setData($res);
        return $response;
    }

    /**
     *  @Route("/label/doublons", name="antiDoublonsLabel")
     */
    public function antiDoublonsAction(Request $request)
    {
      $rep = $this->getDoctrine()->getRepository('AppBundle:Label');

      $labelAConserver = false;
      $label = false;
      $distrib = false;
      $maison = false;

      if ($request->isMethod('POST')) {
        $labelAConserver = $rep->findOneBy(array('libelle' => $request->request->get('labelAConserver')));
        $label = $rep->findOneBy(array('libelle' => $request->request->get('label')));

        if ($label && $labelAConserver) {
          $disques = $rep = $this->getDoctrine()->getRepository('AppBundle:Cd');
          $distrib = $disques->findBy(array('distrib' => $label->getLabel()));
          $maison  = $disques->findBy(array('maison'  => $label->getLabel()));

          $step = $request->request->getInt('step',1);
          if ($step == 1) {
            $this->addFlash('info',"Vérifiez et confirmez en bas de la page");

          } else if ($step == 2) {
            if ($request->request->get('confirm') == "oui") {

              foreach($label->getDisques() as $cd) {
                $cd->setLabel($labelAConserver);
              }

              foreach($distrib as $cd){
                $cd->setDistrib($labelAConserver);
              }

              foreach($maison as $cd) {
                $cd->setMaison($labelAConserver);
              }

              $exId = $label->getLabel();
              $exNom = $label->getLibelle();

              $em = $this->getDoctrine()->getManager();
              $em->remove($label);
              $em->flush();
              $this->addFlash('success',$exNom.' a été remplacé par '.$labelAConserver->getLibelle());
              $this->discoLog("a remplacé $exNom ($exId) par ".$labelAConserver->getLibelle());
              return $this->redirect($this->generateUrl('label'));

            } else {
              $this->addFlash('error',"C'est votre dernier mot ?");
            }
          }
        } else if (!$artiste) {
          $this->addFlash('error','Impossible de trouver '.$request->request->get('label'));
        } else {
          $this->addFlash('error','Impossible de trouver '.$request->request->get('labelAConserver'));
        }
      }

      return $this->render('label/doublons.html.twig',array(
        'label' => $label,
        'labelAConserver' => $labelAConserver,
        'distrib' => $distrib,
        'maison' => $maison
      ));
    }

}
