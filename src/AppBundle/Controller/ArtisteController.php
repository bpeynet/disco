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
		$cd = $this->getDoctrine()
			->getRepository('AppBundle:Cd')
			->find($id);

		if(!$cd) {
			throw $this->createNotFoundException(
            	'Aucun cd trouvé pour cet id : '.$id
        	);
		}

		return $this->render(
		    'cd/show.html.twig',
		    array('cd' => $cd)
		);
	}

    /**
     * @Route("/artiste/create", name="createArtiste")
     */
    public function createAction()
    {
        $post = new Artiste();
        $form = $this->createForm(new ArtisteType(),$post);
        $form->add('submit', 'submit', array(
                'label' => 'Créer',
                'attr' => array('class' => 'btn btn-success btn-block','style'=>'font-weight:bold')
            ));

        $nom = null;
            $nom = $form->get('nom')->getData();
    

        return $this->render('artiste/create.html.twig',array('form'=>$form->createView(),'nom'=>$nom));
    }


}

