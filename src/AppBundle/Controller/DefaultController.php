<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Cd;
use AppBundle\Form\CdType;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
    	$retour = null;
    	$langues = $this->getDoctrine()->getRepository('AppBundle:Langue')->findAll();
    	$genres = $this->getDoctrine()->getRepository('AppBundle:Genre')->findAll();
    	$rotations = $this->getDoctrine()->getRepository('AppBundle:Rotation')->findAll();
    	$supports = $this->getDoctrine()->getRepository('AppBundle:Support')->findAll();
    	$types = $this->getDoctrine()->getRepository('AppBundle:Type')->findAll();
    	if(isset($_POST['search'])) {
    		if($_POST['cd']) {
    			$retour = $this->getDoctrine()->getRepository('AppBundle:Cd')->findByCd($_POST['cd']);
    		} else {
    			$query = "WHERE cd.artiste = a.artiste AND (cd.label = l.label OR cd.maison = l.label OR cd.distrib = l.label) ";
    			$parameters = array();
    			if($_POST['artiste']) {
    				$query += " AND a.nom = :artiste ";
    				$parameters['artiste'] = $_POST['artiste'];
    			}
	    		$retour = $this->getDoctrine()->getManager()->createQuery(
					    "SELECT cd
					    FROM AppBundle:Cd cd, AppBundle:Artiste a, AppBundle:Label l
					    $query
					    ORDER BY cd.cd ASC"
					)->setParameters($parameters)->setMaxResults(50)->getResult();
    		}
    	}
        return $this->render('default/index.html.twig',array(
        	'test'=>$retour,
        	'langues'=>$langues,
        	'genres'=>$genres,
        	'rotations'=>$rotations,
        	'supports'=>$supports,
        	'types'=>$types
        ));
    }

    /**
	 * @Route("/show/{id}", name="show")
     */
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

