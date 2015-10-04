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

        //Encodage du MDP
        $encoder = $this->container->get('security.password_encoder');

        //// TODO: génerer un mot de passe
        $generatedPass = "TODO";
        $username = "admin";
        $encoded = $encoder->encodePassword($user, $generatedPass);

        $user->setPassword($encoded);

        //Mise en forme des infos concernant l'utilisateur
        $user->setUsername($username);
        $user->setPrenom("Premier");
        $user->setNom("Utilisateur");
        $user->setRoles("ROLE_SUPER_ADMIN");

        $em->persist($user);
        $em->flush();

        $this->get("disco.logger")->info("INSTALLATION - creation de l'utilisateur admin");
        $this->addFlash('success','Le premier utilisateur a été créé');
        return $this->render('install/install.html.twig',array(
                'generatedPass' => $generatedPass,
                'username' => $username
            ));
      } else {
        return $this->redirect($this->generateUrl('index'));
      }
    }
}
