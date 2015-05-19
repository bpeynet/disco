<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\DiscoController;
use AppBundle\Entity\Cd;
use AppBundle\Form\CdType;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends DiscoController
{

	/**
	 * @Route("/", name="index")
	 */
 	public function indexAction() {

 		return $this->redirect($this->generateUrl('search'));
 	}

    /**
     * @Route("/test/mail", name="testMail")
     */
    public function testMailAction()
    {
        $message = \Swift_Message::newInstance()
            ->setSubject('Test D:')
            ->setFrom('send@example.com')
            ->setTo('cc@yopmail.com')
            ->setBody($this->renderView('mails/retour-label.html.twig', array('name' => 'coucou')))
        ;
        $this->get('mailer')->send($message);

        $this->addFlash('success','Le mail a été envoyé !!!! :DDDDDDD');

        return $this->redirect($this->generateUrl('search'));
    }

    /**
     * @Route("/search", name="search")
     */
    public function search(Request $request) {

        $this->denyAccessUnlessGranted('ROLE_USER', null, 'Une connexion est nécessaire.');

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

