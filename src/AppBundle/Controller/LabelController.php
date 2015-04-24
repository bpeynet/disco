<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Label;
use AppBundle\Form\LabelType;
use Symfony\Component\HttpFoundation\Request;


class LabelController extends Controller
{
    /**
     * @Route("/label", name="label")
     */
    public function indexAction(Request $request)
    {

    	$doctrine = $this->getDoctrine();
	    $em = $doctrine->getManager();
    	$limit = $this->container->getParameter('listingLimit');

    	$retour = null;
    	
    	if($request->isMethod("POST")) {

    		$num = $request->request->getInt('num',-1);
    		$libelle = $request->request->get('nom');
    		
	    	if($num >= 1) {

	    		return $this->redirect($this->generateUrl('showLabel',array('id'=>$num)));
	    	}

    		$retour = $em->getRepository('AppBundle:Label')->createQueryBuilder('l')
    			->where('l.libelle LIKE :libelle')
    			->setParameter('libelle','%'.$libelle.'%')
				->orderBy('l.libelle', 'ASC')
				->setMaxResults($limit)
				->getQuery()
				->getResult();

    	} else {
    		$retour = $em->getRepository('AppBundle:Label')->createQueryBuilder('l')
    			->orderBy('l.libelle','ASC')
    			->setMaxResults($limit)
    			->getQuery()
    			->getResult();
    	}

        return $this->render('label/search.html.twig',array(
	        	'recherche'=>$retour,
	        	'post'=>$request->request->all()
        	));
    }

    /**
     * @Route("/label/show/{id}", name="showLabel")
     */
    public function showAction($id) {
        $label = $this->getDoctrine()
            ->getRepository('AppBundle:Label')
            ->find($id);

        if(!$label) {
            throw $this->createNotFoundException(
                'Aucun Label trouvé pour cet id : '.$id
            );
        }

        return $this->render(
            'label/show.html.twig',
            array('label' => $label)
        );
    }

    /**
	 * @Route("/label/delete/{id}", name="deleteLabel")
     */
	public function deleteAction($id) {
		$label = $this->getDoctrine()
			->getRepository('AppBundle:Label')
			->find($id);

		if(!$label) {
			throw $this->createNotFoundException(
            	'Aucun Label trouvé pour cet id : '.$id
        	);
		}

        $em = $this->getDoctrine()->getManager();
        $em->remove($label);
        $em->flush();

		return $this->redirect($this->generateUrl('label'));
	}


    /**
     * @Route("/label/edit/{id}", name="editLabel")
     */
    public function editAction($id,Request $request) {
        $label = $this->getDoctrine()
            ->getRepository('AppBundle:Label')
            ->find($id);

        if(!$label) {
            throw $this->createNotFoundException(
                'Aucun Label trouvé pour cet id : '.$id
            );
        }

        $post = $label;
        $form = $this->createForm(new LabelType(),$post);
        $form->add('submit', 'submit', array(
                'label' => 'Finaliser l\'édition',
                'attr' => array('class' => 'btn btn-success btn-block','style'=>'font-weight:bold')
            ));

        $form->handleRequest($request);

        if($form->isValid()) {
            $libelle = strtoupper($form->get('libelle')->getData());
            $email = $form->get('email')->getData();
            $telephone = $form->get('telephone')->getData();
            $adresse = $form->get('adresse')->getData();
            $adresse2 = $form->get('adresse2')->getData();
            $cp = $form->get('cp')->getData();
            $ville = $form->get('ville')->getData();
            $mailProgra = $form->get('mailProgra')->getData();
            $contact1 = $form->get('contact1')->getData();
            $siteweb = $form->get('siteweb')->getData();
            $info = $form->get('info')->getData();
            if(!$telephone) { $telephone = ""; }
            if(!$adresse) { $adresse = ""; }
            if(!$adresse2) { $adresse2 = ""; }
            if(!$cp) { $cp = ""; }
            if(!$ville) { $ville = ""; }
            if(!$contact1) { $contact1 = ""; }
            if(!$siteweb) { $siteweb = ""; }
            if(!$info) { $info = ""; }
            
            $label->setLibelle($libelle);
            $label->setEmail($email);
            $label->setTelephone($telephone);
            $label->setAdresse($adresse);
            $label->setAdresse2($adresse2);
            $label->setCp($cp);
            $label->setVille($ville);
            $label->setMailprogra($mailProgra);
            $label->setContact1($contact1);
            $label->setSiteweb($siteweb);
            $label->setInfo($info);

            $em = $this->getDoctrine()->getManager();

            $em->persist($label);
            $em->flush();
        }


        return $this->render('label/edit.html.twig',array('form'=>$form->createView(),'label'=>$label));
    }

    /**
     * @Route("/label/create", name="createLabel")
     */
    public function createAction(Request $request)
    {
        $post = new Label();
        $form = $this->createForm(new LabelType(),$post);
        $form->add('submit', 'submit', array(
                'label' => 'Créer le Label',
                'attr' => array('class' => 'btn btn-success btn-block','style'=>'font-weight:bold')
            ));

        $form->handleRequest($request);

        if($form->isValid()) {
            $libelle = strtoupper($form->get('libelle')->getData());
            $email = $form->get('email')->getData();
            $telephone = $form->get('telephone')->getData();
            $adresse = $form->get('adresse')->getData();
            $adresse2 = $form->get('adresse2')->getData();
            $cp = $form->get('cp')->getData();
            $ville = $form->get('ville')->getData();
            $mailProgra = $form->get('mailProgra')->getData();
            $contact1 = $form->get('contact1')->getData();
            $siteweb = $form->get('siteweb')->getData();
            $info = $form->get('info')->getData();
            if(!$email) { $email = ""; }
            if(!$telephone) { $telephone = ""; }
            if(!$adresse) { $adresse = ""; }
            if(!$adresse2) { $adresse2 = ""; }
            if(!$cp) { $cp = ""; }
            if(!$ville) { $ville = ""; }
            if(!$mailProgra) { $mailProgra = ""; }
            if(!$contact1) { $contact1 = ""; }
            if(!$siteweb) { $siteweb = ""; }
            if(!$info) { $info = ""; }

            $label = new Label();
            $label->setLibelle($libelle);
            $label->setEmail($email);
            $label->setTelephone($telephone);
            $label->setAdresse($adresse);
            $label->setAdresse2($adresse2);
            $label->setCp($cp);
            $label->setVille($ville);
            $label->setMailprogra($mailProgra);
            $label->setContact1($contact1);
            $label->setSiteweb($siteweb);
            $label->setInfo($info);

            $em = $this->getDoctrine()->getManager();

            $em->persist($label);
            $em->flush();

            $num = $em->createQuery(
                    'SELECT max(l.label)
                    FROM AppBundle:Label l')
                ->getResult()[0][1];

            return $this->redirect($this->generateUrl('showLabel',array('id'=>$num)));

        } else {
            return $this->render('label/create.html.twig',array('form'=>$form->createView()));
        }
    

    }

}

