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
	 * @Route("/", name="index")
	 */
 	public function indexAction() {

 		return $this->redirect($this->generateUrl('search'));
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

    /**
     * @Route("/search", name="search")
     */
    public function search(Request $request) {
        $results = array();
        $q = $request->query->get('q');
        if ($q) {
            $em = $this->getDoctrine()->getManager();

            $max = 50;

            $results = $em->getRepository("AppBundle:Cd")->createQueryBuilder('c')
                ->where('c.titre LIKE :titre')
				->setParameter('titre', "%$q%")
				->setMaxResults($max)
				->getQuery()
				->getResult();

            if (count($results) < $max) {
                $results = array_merge($results,
                    $em->getRepository("AppBundle:Artiste")->createQueryBuilder('a')
                        ->where('a.libelle LIKE :lib')
                        ->setParameter('lib', "%$q%")
                        ->setMaxResults($max - count($results))
                        ->getQuery()
                        ->getResult());
            }

            if (count($results) < $max) {
                $results = array_merge($results,
                    $em->getRepository("AppBundle:Label")->createQueryBuilder('l')
                        ->where('l.libelle LIKE :lib')
                        ->setParameter('lib', "%$q%")
                        ->setMaxResults($max - count($results))
                        ->getQuery()
                        ->getResult());
            }
        }

        return $this->render('default/search.html.twig', array('results' => $results, 'q' => $q));
    }

}

