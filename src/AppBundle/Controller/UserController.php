<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use AppBundle\Form\UserOwnType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;


class UserController extends Controller
{

    /**
     *  @Route("/user/edit/{id}/role/{value}", name="editUserRole")
     */
    public function editRoleAction($id, $value, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->find($id);

        if (!$user) {
            $reponse = "Erreur lors du traitement : utilisateur non trouvé.";
        } else {
            $reponse = "Edition effectuée";
        }

        return $reponse;
    }

    /**
     * @Route("/user/delete/{id}", name="deleteUser")
     */
    public function deleteAction($id)
    {
        $this->denyAccessUnlessGranted('ROLE_SUPER_ADMIN', null, 'Seul un admin peut supprimer un utilisateur.');
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->find($id);

        if(!$user) {
            throw $this->createNotFoundException(
                'Aucun user trouvé pour cet id : '.$id
            );
        }

        $em->remove($user);
        $em->flush();

        $this->addFlash('success','Utilisateur supprimé.');
        return $this->redirect($this->generateUrl('admin'));
    }

    /**
     * @Route("/user/profile/{id}", name="showUser")
     */
    public function showUser($id)
    {
        $this->denyAccessUnlessGranted('ROLE_USER', null, 'Vous devez être connecté pour visualiser un utilisateur.');
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->find($id);

        if(!$user) {
            throw $this->createNotFoundException(
                'Aucun user trouvé pour cet id : '.$id
            );
        }

        return $this->render('user/show.html.twig',array(
                'user' => $user
            ));
    }

    /**
     * @Route("/user/edit", name="editProfile")
     */
    public function editMyselftAction(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_USER', null, 'Vous devez être connecté pour faire cela.');

        $user = $this->get('security.token_storage')->getToken()->getUser();
        $id = $user->getUser();
        $em = $this->getDoctrine()->getManager();

        if($request->isMethod('POST')) {
            $mail = $request->request->get('email');
            $mdp = $request->request->get('mdp');
            $mdp_v = $request->request->get('v_mdp');
            $mdp_a = $request->request->get('a_mdp');

            $encoder = $this->container->get('security.password_encoder');

            if($mail or $mdp) {
                if($encoder->isPasswordValid($user,$mdp_a)) {
                    if($mail) {
                        $this->addFlash('success','Votre mail a bien été modifié.');
                        $user->setEmail($mail);
                    }
                    if($mdp) {
                        if($mdp == $mdp_v) {
                            //Encodage du MDP
                            $encoded = $encoder->encodePassword($user, $mdp);
                            $user->setPassword($encoded);
                            $this->addFlash('success','Votre mot de passe a bien été modifié.');
                        } else {
                            $this->addFlash('error','Les mots de passe en correspondent pas.');
                        }
                    }

                    $em->persist($user);
                    $em->flush();

                    return $this->redirect($this->generateUrl('showUser',array('id' => $id)));
                } else {
                    $this->addFlash('error','L\'ancien mot de passe semble eronné');
                }

            } else {
                $this->addFlash('info','Aucune information n\'a pu être modifiée.');
           }
        }
        return $this->render('user/edit.html.twig',array('user' => $user));
    }

    /**
     * @Route("/user/edit/{id}", name="editUser")
     */
    public function editAction(Request $request, $id)
    {
        $this->denyAccessUnlessGranted('ROLE_SUPER_ADMIN', null, 'Seul un admin peut éditer ces informations.');

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->find($id);

        $form = $this->createForm(new UserType(),$user);
        $form->add('submit', 'submit', array(
                'label' => 'Editer l\'Utilisateur',
                'attr' => array('class' => 'btn btn-success btn-block','style'=>'font-weight:bold')
            ));

        $form->handleRequest($request);

        if($request->isMethod('POST')) {
            if ($form->isValid()) {
                $user = $form->getData();
                $em = $this->getDoctrine()->getManager();

                $mdp = $request->request->get('mdp');
                $mdp_v = $request->request->get('v_mdp');

                $user->setPrenom(ucfirst(strtolower($user->getPrenom())));
                $user->setNom(strtoupper($user->getNom()));
                $user->setRoles($request->request->get('role'));
                $user->setLibelle($user->getPrenom()." ".$user->getNom());

                $em->persist($user);
                $em->flush();

                $this->addFlash('success','Informations éditées !');

                if(!empty($mdp)) {
                    if($mdp == $mdp_v) {
                        $encoder = $this->container->get('security.password_encoder');
                        $encoded = $encoder->encodePassword($user, $mdp);
                        $user->setPassword($encoded);
                        $this->addFlash('success','Mot de Passe édité correctement !');
                    } else {
                        $this->addFlash('error','Les mots de passe ne correspondent pas !');
                        return $this->render('user/editAdmin.html.twig',array('form'=>$form->createView(), 'user' => $user));
                    }                
                    
                }

                $em->persist($user);
                $em->flush();

                return $this->redirect($this->generateUrl('showUser',array('id' => $id)));
            } else {
                $this->addFlash('error','Les champs on été mal renseignés.');
           }
        }
        return $this->render('user/editAdmin.html.twig',array('form'=>$form->createView(), 'user' => $user));
    }

    /**
     * @Route("/user/create", name="createUser")
     */
    public function createAction(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_SUPER_ADMIN', null, 'Seul un admin peut créer un utilisateur.');

        $form = $this->createForm(new UserType(),new User());
        $form->add('submit', 'submit', array(
                'label' => 'Créer l\'Utilisateur',
                'attr' => array('class' => 'btn btn-success btn-block','style'=>'font-weight:bold')
            ));

        $form->handleRequest($request);

        if($request->isMethod('POST')) {
            if ($form->isValid()) {
                $infos = $request->request;
                if(!empty($infos->get('pwd')) && $infos->get('pwd') == $infos->get('pwd_verif')) {
                    $user = $form->getData();
                    $em = $this->getDoctrine()->getManager();

                    //Encodage du MDP
                    $encoder = $this->container->get('security.password_encoder');
                    $encoded = $encoder->encodePassword($user, $infos->get('pwd'));

                    $user->setPassword($encoded);

                    //Mise en forme des infos concernant l'utilisateur
                    $user->setPrenom(ucfirst(strtolower($user->getPrenom())));
                    $user->setNom(strtoupper($user->getNom()));
                    $user->setRoles($request->request->get('role'));
                    $user->setLibelle($user->getPrenom()." ".$user->getNom());

                    $em->persist($user);
                    $em->flush();

                    $this->addFlash('success','L\'Utilisateur a bien été créé !');
                    return $this->redirect($this->generateUrl('admin'));
                } else {
                    $this->addFlash('error','Les mots de passe doivent correspondre, et ne pas être vides.');
                }
            } else {
                $this->addFlash('error','Les champs on été mal renseignés.');
           }
        }
        return $this->render('user/create.html.twig',array('form'=>$form->createView()));
    }
}

