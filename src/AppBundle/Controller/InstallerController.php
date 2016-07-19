<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\DiscoController;
use AppBundle\Entity\User;



class InstallerController extends DiscoController
{
    /**
     * @Route("/install", name="install")
     */
    public function install()
    {
      $em = $this->getDoctrine()->getManager();

      $users = $em->getRepository('AppBundle:User')
        ->createQueryBuilder('u')
        ->getQuery()
        ->getResult();

      if (empty($users)) {
        $user = new User();
        $em = $this->getDoctrine()->getManager();

        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
        $generatedPass = substr( str_shuffle( $chars ), 0, 8 );
        $encoder = $this->container->get('security.password_encoder');
        $encoded = $encoder->encodePassword($user, $generatedPass);

        $user->setPassword($encoded);

        //Mise en forme des infos concernant l'utilisateur
        $user->setUsername("admin");
        $user->setPrenom("Premier");
        $user->setNom("Utilisateur");
        $user->setRoles("ROLE_SUPER_ADMIN");

        $em->persist($user);
        $em->flush();

        $this->get("disco.logger")->info("INSTALLATION - creation de l'utilisateur admin");
        $this->addFlash('success','Le premier utilisateur a été créé');
        return $this->render('install/install.html.twig',array(
                'generatedPass' => $generatedPass,
                'username' => $user->getUsername()
            ));
      } else {
        return $this->redirect($this->generateUrl('index'));
      }
    }
}
