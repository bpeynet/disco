<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Artiste;
use AppBundle\Form\ArtisteType;
use Symfony\Component\HttpFoundation\Request;


class ArtisteController extends Controller
{
    /**
     * @Route("/artiste", name="artiste")
     */
    public function indexAction(Request $request)
    {

    	$doctrine = $this->getDoctrine();
	    $em = $doctrine->getManager();
    	$limit = $this->container->getParameter('listingLimit');

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

        return $this->render('artiste/search.html.twig',array(
	        	'recherche'=>$retour,
	        	'post'=>$request->request->all()
        	));
    }

    /**
	 * @Route("/artiste/show/{id}", name="showArtiste")
     */
	public function showAction($id) {
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
     * @Route("/artiste/delete/{id}", name="deleteArtiste")
     */
    public function deleteAction($id) {
        $artiste = $this->getDoctrine()
            ->getRepository('AppBundle:Artiste')
            ->find($id);

        if(!$artiste) {
            throw $this->createNotFoundException(
                'Aucun artiste trouvé pour cet id : '.$id
            );
        }
        
        $em = $this->getDoctrine()->getManager();
        $em->remove($artiste);
        $em->flush();

        return $this->redirect($this->generateUrl('artiste'));
    }

    /**
     * @Route("/artiste/edit/{id}", name="editArtiste")
     */
    public function editAction($id, Request $request) {
        $artiste = $this->getDoctrine()
            ->getRepository('AppBundle:Artiste')
            ->find($id);

        if(!$artiste) {
            throw $this->createNotFoundException(
                'Aucun artiste trouvé pour cet id : '.$id
            );
        }

        $post = $artiste;
        $form = $this->createForm(new ArtisteType(),$post);
        $form->add('submit', 'submit', array(
                'label' => 'Editer l\'Artiste',
                'attr' => array('class' => 'btn btn-success btn-block','style'=>'font-weight:bold')
            ));

        $form->handleRequest($request);

        if($form->isValid()) {
            $libelle = strtoupper($form->get('libelle')->getData());
            $siteweb = $form->get('siteweb')->getData();
            $myspace = $form->get('myspace')->getData();
            if(!$siteweb) { $siteweb = ""; }
            if(!$myspace) { $myspace = ""; }

            $artiste->setLibelle($libelle);
            $artiste->setSiteweb($siteweb);
            $artiste->setMyspace($myspace);

            $em = $this->getDoctrine()->getManager();

            $em->persist($artiste);
            $em->flush();

        }

        return $this->render('artiste/edit.html.twig',array('form'=>$form->createView(),'artiste' => $artiste));
    }

    /**
     * @Route("/artiste/create", name="createArtiste")
     */
    public function createAction(Request $request)
    {
        $post = new Artiste();
        $form = $this->createForm(new ArtisteType(),$post);
        $form->add('submit', 'submit', array(
                'label' => 'Créer l\'Artiste',
                'attr' => array('class' => 'btn btn-success btn-block','style'=>'font-weight:bold')
            ));

        $form->handleRequest($request);

        if($form->isValid()) {
            $libelle = strtoupper($form->get('libelle')->getData());
            $siteweb = $form->get('siteweb')->getData();
            $myspace = $form->get('myspace')->getData();
            if(!$siteweb) { $siteweb = ""; }
            if(!$myspace) { $myspace = ""; }

            $artiste = new Artiste();
            $artiste->setLibelle($libelle);
            $artiste->setSiteweb($siteweb);
            $artiste->setMyspace($myspace);

            $em = $this->getDoctrine()->getManager();

            $em->persist($artiste);
            $em->flush();

            $num = $em->createQuery(
                    'SELECT max(a.artiste)
                    FROM AppBundle:Artiste a')
                ->getResult()[0][1];

            return $this->redirect($this->generateUrl('showArtiste',array('id'=>$num)));

        } else {
            return $this->render('artiste/create.html.twig',array('form'=>$form->createView()));
        }
    

    }


}

