<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;


class AdminController extends Controller
{
    /**
     * @Route("/admin", name="admin")
     */
    public function indexAction(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_SUPER_ADMIN', null, 'L\'administration vous est interdite.');

        $doctrine = $this->getDoctrine();
        $em = $doctrine->getManager();
        $limit = $this->container->getParameter('listingLimit');

        $users = $em->getRepository('AppBundle:User')->createQueryBuilder('u')
            ->orderBy('u.libelle','ASC')
            ->getQuery()
            ->getResult();

        $roles = $em->getRepository('AppBundle:User')->createQueryBuilder('r')
            ->select('DISTINCT r.roles')
            ->getQuery()
            ->getResult();

        return $this->render('admin/panel.html.twig',array(
                'users'=>$users,
                'roles'=>$roles 
            ));
    }

}

