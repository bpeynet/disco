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
    	if(isset($_POST['titre'])) {
    		$retour['cd'] = $this->getDoctrine()->getManager()
    			->getRepository("AppBundle:Cd")->createQueryBuilder('c')
				->where('c.titre LIKE :titre')
				->setParameter('titre', '%'.$_POST['titre'].'%')
				->orderBy('c.titre', 'ASC')
				->setMaxResults(50)
				->getQuery()
				->getResult();
    	}
    	if(isset($_POST['label'])) {
    		$retour['label'] = $this->getDoctrine()->getManager()
    			->getRepository("AppBundle:Label")->createQueryBuilder('l')
				->where('l.libelle LIKE :libelle')
				->setParameter('libelle', '%'.$_POST['label'].'%')
				->orderBy('l.libelle', 'ASC')
				->setMaxResults(50)
				->getQuery()
				->getResult();
    	}
    	if(isset($_POST['artiste'])) {
    		$retour['artiste'] = $this->getDoctrine()->getManager()
    			->getRepository("AppBundle:Artiste")->createQueryBuilder('a')
				->where('a.libelle LIKE :libelle')
				->setParameter('libelle', '%'.$_POST['artiste'].'%')
				->orderBy('a.libelle', 'ASC')
				->setMaxResults(50)
				->getQuery()
				->getResult();
    	}
        return $this->render('default/index.html.twig',array(
        	'test'=>$retour,
        	'langues'=>$langues,
        	'genres'=>$genres,
        	'rotations'=>$rotations,
        	'supports'=>$supports,
        	'types'=>$types,
        	'post'=>$_POST
        ));
    }

    /**
	 * @Route("/cd/show/{id}", name="showCd")
     */
	public function showCdAction($id) {
		$cd = $this->getDoctrine()
			->getRepository('AppBundle:Cd')
			->find($id);

		if(!$cd) {
			throw $this->createNotFoundException(
            	'Aucun cd trouvé pour cet id : '.$id
        	);
		}

		return $this->render(
		    'default/cd_view.html.twig',
		    array('cd' => $cd)
		);
	}

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

