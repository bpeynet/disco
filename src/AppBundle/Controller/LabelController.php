<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class LabelController extends Controller
{
    /**
     * @Route("/label", name="Label")
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

        return $this->render('label/search.html.twig',array(
	        	'recherche'=>$retour,
	        	'post'=>$request->request->all()
        	));
    }

    /**
	 * @Route("/label/show/{id}", name="showLabel")
     */
	public function showAction($id) {
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
}

