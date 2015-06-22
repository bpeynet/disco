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
     * @Route("/admin", name="admin")
     */
    public function indexAction(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_SUPER_ADMIN', null, 'L\'administration vous est interdite.');

        $doctrine = $this->getDoctrine();
        $em = $doctrine->getManager();

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

    /**
     * @Route("/admin/encryptPass", name="encryptPwd")
     */
    public function encryptPwdAction()
    {
        $this->denyAccessUnlessGranted('ROLE_SUPER_ADMIN', null, 'Réservé aux admins.');

        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository('AppBundle:User')->findAll();

        foreach ($users as $key => $user) {
            if($user->getPassword()[0] == '$') {
                $this->addFlash('error','Un encryptage a déjà été effectué !');
                return $this->redirect($this->generateUrl('admin'));
            } else {
                $plainPassword = $user->getPassword();
                $encoder = $this->container->get('security.password_encoder');
                $encoded = $encoder->encodePassword($user, $plainPassword);

                $user->setPassword($encoded);
                $em->persist($user);
                $em->flush();
            }
        }

        $this->discoLog("a chiffré les mots de passe");
        $this->addFlash('success','Mots de passe encryptés !');
        return $this->redirect($this->generateUrl('admin'));

    }

}

