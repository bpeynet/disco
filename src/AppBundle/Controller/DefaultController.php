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
 		return $this->render(
		    'default/index.html.twig');
 	}

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

