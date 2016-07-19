<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\DiscoController;
use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;


class AdminController extends DiscoController
{
    /**
     * @Route("/admin/{showInactifs}", name="admin")
     */
    public function indexAction(Request $request, $showInactifs = false)
    {
        $this->denyAccessUnlessGranted('ROLE_SUPER_ADMIN', null, 'L\'administration vous est interdite.');
        
        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository('AppBundle:User')->createQueryBuilder('u');

        $showInactifs = $showInactifs && true;

        if ($showInactifs) {
          $users = $users->where('u.inactif IS NOT NULL');
        } else {
          $users = $users->where('u.inactif IS NULL');
        }

        $users = $users->orderBy('u.prenom','ASC')
            ->getQuery()
            ->getResult();

        return $this->render('admin/panel.html.twig',array(
                'users' => $users,
                'showInactifs' => $showInactifs
            ));
    }

}
