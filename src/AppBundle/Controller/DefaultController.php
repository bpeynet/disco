<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\DiscoController;
use AppBundle\Entity\Cd;
use AppBundle\Form\CdType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;


class DefaultController extends DiscoController
{
    /**
     * @Route("/test/mail/{id}", name="testMail")
     */
    public function testMailAction($id)
    {
        $cd = $this->getDoctrine()->getManager()->getRepository('AppBundle:Cd')->find($id);

        $airplays = $this->getDoctrine()->getManager()->getRepository('AppBundle:AirplayCd')->findByCd($cd);

        $message = \Swift_Message::newInstance()
            ->setSubject("Radio Campus Grenoble / ".$cd->getArtiste()->getLibelle()." - ".$cd->getTitre()." [retour d'écoute]")
            ->setFrom('test@test.fr')
            ->setTo('rcgtest@yopmail.com')
            ->setBody($this->renderView('mails/retour-label.html.twig', array('cd' => $cd, 'airplays' => $airplays)))
        ;
        $test = $this->get('mailer')->send($message);



        $this->addFlash('success','Le mail a été envoyé !!!! :DDDDDDD');

        return $this->redirect($this->generateUrl('index'));
    }

    /**
     * @Route("/", name="index")
     */
    public function indexAction(Request $request) {

        if ($this->get('security.context')->isGranted('ROLE_INACTIF')) {
            $this->addFlash('error','Votre compte est inactif, vous ne pouvez donc pas vous connecter. Si cela est une erreur, prévenez un Admin.');
            return $this->redirect($this->generateUrl('logout'));
        }

        $this->denyAccessUnlessGranted('ROLE_USER', null, 'Vous devez être identifié.');

        $results = array();
        $q = $request->query->get('q');
        if ($q) {
          $results = $this->generalSearch($q);
          if (empty($results)) {
            $this->addFlash('error',"Rien trouvé !");
          }
        }

        return $this->render('default/search.html.twig', array('results' => $results, 'q' => $q));
    }

    private function generalSearch($q, $max = 50)
    {
      $em = $this->getDoctrine()->getManager();
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

      return $results;
    }
}
