<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Cd;
use AppBundle\Form\CdType;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{

 

	    // 	if(has($request->request->get('label'))) {
	    // 		$retour['label'] = $this->getDoctrine()->getManager()
	    // 			->getRepository("AppBundle:Label")->createQueryBuilder('l')
					// ->where('l.libelle LIKE :libelle')
					// ->setParameter('libelle', '%'.$request->request->get('label').'%')
					// ->orderBy('l.libelle', 'ASC')
					// ->setMaxResults(50)
					// ->getQuery()
					// ->getResult();
	    // 	}
	    // 	if(has($request->request->get('artiste'))) {
	    // 		$retour['artiste'] = $this->getDoctrine()->getManager()
	    // 			->getRepository("AppBundle:Artiste")->createQueryBuilder('a')
					// ->where('a.libelle LIKE :libelle')
					// ->setParameter('libelle', '%'.$request->request->get('artiste').'%')
					// ->orderBy('a.libelle', 'ASC')
					// ->setMaxResults(50)
					// ->getQuery()
					// ->getResult();
	    // 	}

    /**
	 * @Route("/artiste/show/{id}", name="showArtiste")
     */
	public function showArtisteAction($id) {
		$artiste = $this->getDoctrine()
			->getRepository('AppBundle:Artiste')
			->find($id);

		if(!$artiste) {
			throw $this->createNotFoundException(
            	'Aucun artiste trouvé pour cet id : '.$id
        	);
		}

		return $this->render(
		    'default/artiste_view.html.twig',
		    array('artiste' => $artiste)
		);
	}

    /**
	 * @Route("/label/show/{id}", name="showLabel")
     */
	public function showLabelAction($id) {
		$label = $this->getDoctrine()
			->getRepository('AppBundle:Label')
			->find($id);

		if(!$label) {
			throw $this->createNotFoundException(
            	'Aucun label trouvé pour cet id : '.$id
        	);
		}

		return $this->render(
		    'default/label_view.html.twig',
		    array('label' => $label)
		);
	}

	/**
	 * @Route("/form", name="form")
     */
	public function formAction(Request $request) {
		$post = new Cd();
		$form = $this->createForm(new CdType(),$post);
		$form->add('submit', 'submit', array(
				'label' => 'Create',
				'attr' => array('class' => 'btn btn-default pull-right')
			));
		return $this->render('default/form.html.twig',array('form'=>$form->createView()));
		/*
		$form->handleRequest($request);
		if($form->isSubmitted() && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($post);
			$em->flush();
		}

		return $this->redirect( $this->generateUrl(
				'post',
				array('id'=>$post->getCd()
			)
		));
		*/
	}
}

