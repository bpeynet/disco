<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;


class AirplayController extends Controller
{
    /**
     * @Route("/airplay", name="airplay")
     */
    public function indexAction(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_USER', null, 'Vous devez être connecté pour voir cette page.');

        $doctrine = $this->getDoctrine();
        $em = $doctrine->getManager();
        $limit = $this->container->getParameter('listingLimit');

        $airplays = $em->getRepository('AppBundle:Airplay')->createQueryBuilder('a')
            ->orderBy('a.airplay','DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();

        return $this->render('airplay/search.html.twig',array(
                'airplays'=>$airplays
            ));
    }

    /**
     * @Route("/airplay/show/{id}", name="showAirplay")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $airplay = $em->getRepository('AppBundle:Airplay')->find($id);

        if(!$airplay) {
            throw $this->createNotFoundException(
                'Aucun airplay trouvé pour cet id : '.$id
            );
        }

        $liste = $em->getRepository('AppBundle:AirplayCd')->findBy(
                array('airplay' => $id),
                array('ordre' => 'asc')
            );

        return $this->render('airplay/show.html.twig', array(
                'airplay' => $airplay,
                'liste' => $liste
            ));

    }

    /**
     * @Route("/airplay/create", name="createAirplay")
     */
    public function createAction()
    {
        $em = $this->getDoctrine()->getManager();
        $airplay = $em->getRepository('AppBundle:Airplay')->find($id);

        if(!$airplay) {
            throw $this->createNotFoundException(
                'Aucun airplay trouvé pour cet id : '.$id
            );
        }

        $liste = $em->getRepository('AppBundle:AirplayCd')->findBy(
                array('airplay' => $id),
                array('ordre' => 'asc')
            );

        return $this->render('airplay/show.html.twig', array(
                'airplay' => $airplay,
                'liste' => $liste
            ));

    }

}