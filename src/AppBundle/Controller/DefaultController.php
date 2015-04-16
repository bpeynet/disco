<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\StoreBundle\Entity\FCd;

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
			->getRepository('AppBundle:FCd')
			->find($id);

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
}

