<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Cd;
use AppBundle\Form\FCdType;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    /**
     * @Route("/app/example", name="homepage")
     */
    public function indexAction()
    {
        return $this->render('default/index.html.twig');
    }


	public function showAction($id) {
		$cd = $this->getDoctrine()
			->getRepository('AppBundle:Cd')
			->find($id);

		//$artiste = $this->getDoctrine()->getRepository('AppBundle:FArtiste')->find($cd->getArtiste());

		if(!$cd) {
			throw $this->createNotFoundException(
            	'Aucun cd trouvé pour cet id : '.$id
        	);
		}

		dump($cd);

		return $this->render(
		    'default/index.html.twig',
		    array('cd' => $cd)
		);
	}

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

