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
     * @Route("/test/mail/{id}", name="testMail")
     */
    public function testMailAction($id)
    {
        $cd = $this->getDoctrine()->getManager()->getRepository('AppBundle:Cd')->find($id);

        $message = \Swift_Message::newInstance()
            ->setSubject("Radio Campus Grenoble / ".$cd->getArtiste()->getLibelle()." - ".$cd->getTitre()." [retour d'écoute]")
            ->setFrom('test@test.fr')
            ->setTo('rcgtest@yopmail.com')
            ->setBody($this->renderView('mails/retour-label.html.twig', array('cd' => $cd)))
        ;
        $test = $this->get('mailer')->send($message);



        $this->addFlash('success','Le mail a été envoyé !!!! :DDDDDDD');

        return $this->redirect($this->generateUrl('index'));
    }

    /**
     * @Route("/test/etiquettes", name="testEtiquettes")
     */
    public function etiquettesAction()
    {
        $cds = $this->getDoctrine()->getManager()->createQuery(
                'SELECT cd
                FROM AppBundle:Cd cd
                ORDER BY cd.cd DESC'
            )
            ->setMaxResults(24)
            ->getResult();

        return $this->render('default/vignettes.html.twig', array('cds' => $cds));
    }

    /**
     * @Route("/", name="index")
     */
    public function indexAction(Request $request) {

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

