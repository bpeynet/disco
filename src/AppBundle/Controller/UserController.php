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

        $id = $this->get('security.token_storage')->getToken()->getUser()->getUser();

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->find($id);


        if($request->isMethod('POST')) {
            $mail = $request->request->get('email');
            $mdp = $request->request->get('mdp');
            if($mail or $mdp) {
                if($mail) {
                    $user->setEmail($mail);
                }
                if($mdp) {
                    $user->setPassword($mdp);
                }

                $em->persist($user);
                $em->flush();

                $this->addFlash('success','Vos informations ont bien été mises à jour.');
                return $this->redirect($this->generateUrl('showUser',array('id' => $id)));
            } else {
                $this->addFlash('error','Aucune information n\'a pu être modifiée.');
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
                $data = $form->getData();
                $em = $this->getDoctrine()->getManager();

                $data->setPrenom(ucfirst(strtolower($data->getPrenom())));
                $data->setNom(strtoupper($data->getNom()));
                $data->setRoles($request->request->get('role'));
                $data->setLibelle($data->getPrenom()." ".$data->getNom());

                $em->persist($data);
                $em->flush();

                $this->addFlash('success','Edition terminée !');
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
                $data = $form->getData();
                $em = $this->getDoctrine()->getManager();

                $data->setPrenom(ucfirst(strtolower($data->getPrenom())));
                $data->setNom(strtoupper($data->getNom()));
                $data->setRoles($request->request->get('role'));
                $data->setLibelle($data->getPrenom()." ".$data->getNom());

                $em->persist($data);
                $em->flush();

                $this->addFlash('success','L\'Utilisateur a bien été créé !');
                return $this->redirect($this->generateUrl('admin'));
            } else {
                $this->addFlash('error','Les champs on été mal renseignés.');
           }
        }
        return $this->render('user/create.html.twig',array('form'=>$form->createView()));
    }
}

