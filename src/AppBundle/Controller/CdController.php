<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\DiscoController;
use AppBundle\Entity\Cd;
use AppBundle\Entity\CdNote;
use AppBundle\Entity\CdComment;
use AppBundle\Entity\Piste;
use AppBundle\Form\CdType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;


class CdController extends DiscoController
{
    /**
     * @Route("/cd", name="cd")
     */
    public function indexAction(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_USER', null, 'Une connexion est nécessaire.');

    	$doctrine = $this->getDoctrine();
	    $em = $doctrine->getManager();
    	$limit = $this->container->getParameter('listingLimit');

    	$retour = null;
    	$langues = $doctrine->getRepository('AppBundle:Langue')->findAll();
    	$genres = $doctrine->getRepository('AppBundle:Genre')->findAll();
    	$rotations = $doctrine->getRepository('AppBundle:Rotation')->findAll();
    	$supports = $doctrine->getRepository('AppBundle:Support')->findAll();
    	$types = $doctrine->getRepository('AppBundle:Type')->findAll();
    	if($request->isMethod("POST")) {
    		$num = $request->request->getInt('num',-1);
    		$artiste = $request->request->get("artiste");
    		$titre = $request->request->get("titre","");
    		$label = $request->request->get("label");
    		$annee = $request->request->getInt("annee");
    		$langue = $request->request->getInt("langue",-1);
    		$genre = $request->request->getInt("genre",-1);
    		$rotation = $request->request->getInt("rotation",-1);
    		$support = $request->request->getInt("support",-1);
    		$type = $request->request->getInt("type",-1);
	    	if($num >= 1) {

	    		return $this->redirect($this->generateUrl('showCd',array('id'=>$num)));
	    	}

    		$retour = $em->getRepository('AppBundle:Cd')->createQueryBuilder('c')
    			->andWhere('c.titre LIKE :titre_l')
    			->setParameter('titre_l','%'.$titre.'%')
                ->orWhere('c.titre = :titre')
                ->setParameter('titre',$titre);
			if(!empty($artiste)) {
				$retour = $retour->innerJoin('c.artiste','a')
				->andWhere('a.libelle LIKE :artiste_l')
				->setParameter('artiste_l','%'.$artiste.'%')
                ->orWhere('a.libelle = :artiste')
                ->setParameter('artiste',$artiste);
			}
			if(!empty($label)) {
				$retour = $retour->innerJoin('c.label','l')
				->andWhere('l.libelle LIKE :label_l')
				->setParameter('label_l','%'.$label.'%')
                ->orWhere('l.libelle = :label')
                ->setParameter('label',$label);

			}
			if($annee != 0) {
				$retour = $retour->andWhere('c.annee = :annee')
				->setParameter('annee',$annee);
			}
			if(!empty($langue)) {
				$retour = $retour->andWhere('c.langue = :langue')
				->setParameter('langue', $langue);
			}
			if(!empty($genre)) {
				$retour = $retour->andWhere('c.genre = :genre')
				->setParameter('genre', $genre);
			}
			if(!empty($rotation)) {
				$retour = $retour->andWhere('c.rotation = :rotation')
				->setParameter('rotation', $rotation);
			}
			if(!empty($support)) {
				$retour = $retour->andWhere('c.support = :support')
				->setParameter('support', $support);
			}
			if(!empty($type)) {
				$retour = $retour->andWhere('c.type = :type')
				->setParameter('type', $type);
			}

			$retour = $retour->orderBy('c.titre', 'ASC')
                ->andWhere('c.suppr != 1')
				->setMaxResults($limit)
				->getQuery()
				->getResult();

            if (empty($retour)) {
                $this->addFlash('error', 'Aucun disque trouvé !');
            }

    	} else {
    		$retour = $em->getRepository('AppBundle:Cd')->createQueryBuilder('c')
                ->where('c.suppr != 1')
    			->orderBy('c.cd','DESC')
    			->setMaxResults($limit)
    			->getQuery()
    			->getResult();
    	}

        return $this->render('cd/search.html.twig',array(
	        	'recherche'=>$retour,
	        	'langues'=>$langues,
	        	'genres'=>$genres,
	        	'rotations'=>$rotations,
	        	'supports'=>$supports,
	        	'types'=>$types,
	        	'post'=>$request->request->all()
        	));
    }

    /**
     * @Route("/cd/a-traiter", name="cdNonTraites")
     */
    public function nonTraitesAction()
    {
        $this->denyAccessUnlessGranted('ROLE_PROGRA', null, 'Seuls les programmateurs ont accès à cette page.');

        $cds = $this->getDoctrine()->getRepository('AppBundle:Cd')->createQueryBuilder('cd')
            ->where('cd.retourLabel = 0')
            ->orderBy('cd.dsaisie', 'ASC')
            ->orderBy('cd.userProgra', 'ASC')
            ->orderBy('cd.rotation', 'ASC')
            ->setMaxResults(100)
            ->getQuery()
            ->getResult();

        return $this->render(
            'cd/traitements.html.twig',
            array('cds' => $cds)
        );
    }

    /**
     * @Route("/cd/show/{id}", name="showCd")
     */
    public function showAction($id) {
        $this->denyAccessUnlessGranted('ROLE_USER', null, 'Une connexion est nécessaire.');

        $cd = $this->getDoctrine()
            ->getRepository('AppBundle:Cd')
            ->find($id);

        if(!$cd || $cd->getSuppr()) {
            throw $this->createNotFoundException(
                'Aucun cd trouvé pour cet id : '.$id
            );
        }

        return $this->render(
            'cd/show.html.twig',
            array('cd' => $cd)
        );
    }

    /**
	 * @Route("/cd/delete/{id}", name="deleteCd", options={"expose"=true})
     */
	public function deleteAction($id) {
        $this->denyAccessUnlessGranted('ROLE_PROGRA', null, 'Seul un programmateur peut supprimer un disque.');

		$cd = $this->getDoctrine()
			->getRepository('AppBundle:Cd')
			->find($id);

		if(!$cd) {
			throw $this->createNotFoundException(
            	'Aucun cd trouvé pour cet id : '.$id
        	);
		}

		$em = $this->getDoctrine()->getManager();
        $cd->setSuppr(1);
        $em->persist($cd);
        $em->flush();

        $this->discoLog("suppression logique du CD ".$cd->getCd()." ".$cd->getTitre());
        $this->addFlash('success','Le Cd ne s\'affichera plus. Si cela est une erreur, contactez l\'admin !');
        return $this->redirect($this->generateUrl('cd'));
	}

    /**
     * @Route("/cd/edit/{id}", name="editCd")
     */
    public function editAction(Request $request, $id)
    {
        $this->denyAccessUnlessGranted('ROLE_PROGRA', null, 'Seul un programmateur peut éditer un disque.');

        $em = $this->getDoctrine()->getManager();
        $cd = $em->getRepository('AppBundle:Cd')->find($id);

        if(!$cd || $cd->getSuppr()) {
            throw $this->createNotFoundException(
                'Aucun cd trouvé pour cet id : '.$id
            );
        }

        $form = $this->createForm(new CdType(),$cd);
        $form->add('submit', 'submit', array(
                'label' => 'Sauvegarder le CD',
                'attr' => array('class' => 'btn btn-success btn-block','style'=>'font-weight:bold')
            ));

        $form->handleRequest($request);

        $req = $request->request->get('appbundle_cd');

        $full_fr = true;
        foreach ($cd->getPistes() as $key => $piste) {
            if(!$piste->getLangue()) { $full_fr = false; break; }
        }

        if ($form->isValid()) {
            $cd = $form->getData();

            $artiste = $em->getRepository('AppBundle:Artiste')->findOneByLibelle($req['artiste']);

            if(!$artiste or empty($req['artiste'])) {
                $this->addFlash('error','L\'artiste renseigné n\'existait pas.');

                if($request->request->get('full_fr')) {
                    $pistes_var['full_fr'] = 1;
                }
                $pistes = $this->savePistes($req['nbPiste'],$request);
            } else {
                $cd->setArtiste($artiste);
            }


            $em->createQuery(
                    'DELETE FROM AppBundle:Piste p
                    WHERE p.cd = :cd'
                )
                ->setParameter('cd',$cd)
                ->getResult();

            for($i = 1; $i <= $req['nbPiste']; $i++) {
                $piste = new Piste();
                $piste->setCd($cd);
                $piste->setTitre($request->request->get('titre_'.$i));
                if(empty($request->request->get('artiste_'.$i))) {
                    $p_artiste = $cd->getArtiste();
                } else {
                    $p_artiste = $em->getRepository('AppBundle:Artiste')->findOneByLibelle($request->request->get('artiste_'.$i));
                    if(empty($p_artiste)) { $p_artiste = $cd->getArtiste(); }
                }

                $piste->setArtiste($p_artiste);
                if($request->request->get('fr_'.$i)) {
                    $piste->setLangue(true);
                } else { $piste->setLangue(false); }
                if($request->request->get('anim_'.$i)) {
                    $piste->setAnim(true);
                } else { $piste->setAnim(false); }
                if($request->request->get('paulo_'.$i)) {
                    $piste->setPaulo(true);
                } else { $piste->setPaulo(false); }
                if($request->request->get('star_'.$i)) {
                    $piste->setStar(true);
                } else { $piste->setStar(false); }

                $em->persist($piste);
            }

            $em->flush();

            $pistes = $this->savePistes($req['nbPiste'],$request);

            $this->discoLog("a modifié le CD ".$cd->getCd()." ".$cd->getTitre());
            $this->addFlash('success','Le CD a bien été sauvegardé !');

        } else {
            if ($request->isMethod('POST')) {
                $this->addFlash('error','Les champs ont été mal renseignés.');
                $pistes = $this->savePistes($req['nbPiste'],$request);
            } else {
                $pistes = array();
                $i = 0;
                foreach ($cd->getPistes() as $key => $piste) {
                    $pistes[$i]['titre'] = $piste->getTitre();
                    $pistes[$i]['artiste'] = $piste->getArtiste();
                    if($piste->getLangue()){
                        $pistes[$i]['fr'] = 1;
                    } else { $pistes[$i]['fr'] = 0; }
                    if($piste->getPaulo()){
                        $pistes[$i]['paulo'] = 1;
                    } else { $pistes[$i]['paulo'] = 0; }
                    if($piste->getStar()){
                        $pistes[$i]['star'] = 1;
                    } else { $pistes[$i]['star'] = 0; }
                    if($piste->getAnim()){
                        $pistes[$i]['anim'] = 1;
                    } else { $pistes[$i]['anim'] = 0; }
                    $i++;
                }
            }
            if($request->request->get('full_fr')) {
                $pistes_var['full_fr'] = 1;
            }
        }

        return $this->render('cd/edit.html.twig', array(
                'cd' => $cd,
                'form' => $form->createView(),
                'pistes' => $pistes,
                'full_fr' => $full_fr
            ));

    }

    /**
     * @Route("/cd/create", name="createCd")
     */
    public function createAction(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_PROGRA', null, 'Seul un programmateur peut créer un disque.');

        $valid = true;

        $post = new Cd();
        $user = $this->get('security.token_storage')->getToken()->getUser();
        if($user != false) { $post->setUserProgra($user); }
        $form = $this->createForm(new CdType(),$post);
        $form->add('submit', 'submit', array(
                'label' => 'Créer le CD',
                'attr' => array('class' => 'btn btn-success btn-block','style'=>'font-weight:bold')
            ));
        
        $req = $request->request->get('appbundle_cd');

        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        $pistes_var['full_fr'] = false;

        $artiste = $em->getRepository('AppBundle:Artiste')->findOneByLibelle($req['artiste']);

        if(!$artiste or empty($req['artiste'])) {
            $this->addFlash('error','L\'artiste renseigné n\'existe pas.');
            $valid = false;
        }

        if($form->isValid() && $valid) {

            $cd = $form->getData();

            $cd->setLabel(null);
            $cd->setMaison(null);
            $cd->setDistrib(null);

            $cd->setArtiste($artiste);

            for($i = 1; $i <= $req['nbPiste']; $i++) {
                $piste = new Piste();
                $piste->setCd($cd);
                $piste->setTitre($request->request->get('titre_'.$i));
                if(empty($request->request->get('artiste_'.$i))) {
                    $p_artiste = $cd->getArtiste();
                } else {
                    $p_artiste = $em->getRepository('AppBundle:Artiste')->findOneByLibelle($request->request->get('artiste_'.$i));
                    if(empty($p_artiste)) { $p_artiste = $cd->getArtiste(); }
                }

                $piste->setArtiste($p_artiste);
                if($request->request->get('fr_'.$i)) {
                    $piste->setLangue(true);
                } else { $piste->setLangue(false); }
                if($request->request->get('anim_'.$i)) {
                    $piste->setAnim(true);
                } else { $piste->setAnim(false); }
                if($request->request->get('paulo_'.$i)) {
                    $piste->setPaulo(true);
                } else { $piste->setPaulo(false); }
                if($request->request->get('star_'.$i)) {
                    $piste->setStar(true);
                } else { $piste->setStar(false); }

                $em->persist($piste);
            }

            $em->persist($cd);
            $em->flush();

            $num = $cd->getCd();

            $this->discoLog("a créé le CD $num ".$cd->getTitre());
            $this->addFlash('success','Le CD a bien été créé !');

            return $this->redirect($this->generateUrl('showCd',array('id'=>$num)));

        } else {
            if ($request->isMethod('POST')) {
                $this->addFlash('error','Les champs ont été mal renseignés.');
            }
            if($request->request->get('full_fr')) {
                $pistes_var['full_fr'] = 1;
            }
            $pistes = $this->savePistes($req['nbPiste'],$request);
            return $this->render('cd/create.html.twig',array(
                'form'=>$form->createView(),
                'pistes' => $pistes,
                'pistes_var' => $pistes_var
            ));
        }
    }

    private function savePistes($nbPistes, $request)
    {
        $pistes = null;
        if ($nbPistes>0) {
            for ($i=1; $i <= $nbPistes; $i++) {
                $pistes[$i]['titre'] = $request->request->get('titre_'.$i);
                $pistes[$i]['artiste'] = $this->getDoctrine()->getManager()->getRepository('AppBundle:Artiste')->find($request->request->get('artiste_'.$i));
                if($request->request->get('fr_'.$i)){
                    $pistes[$i]['fr'] = 1;
                } else { $pistes[$i]['fr'] = 0; }
                if($request->request->get('paulo_'.$i)){
                    $pistes[$i]['paulo'] = 1;
                } else { $pistes[$i]['paulo'] = 0; }
                if($request->request->get('star_'.$i)){
                    $pistes[$i]['star'] = 1;
                } else { $pistes[$i]['star'] = 0; }
                if($request->request->get('anim_'.$i)){
                    $pistes[$i]['anim'] = 1;
                } else { $pistes[$i]['anim'] = 0; }
            }
        }
        return $pistes;
    }

    /**
     *  @Route("/cd/autocomplete/{like}", name="autocompleteTitre")
     */
    public function autocompleteAction($like, Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_USER', null, 'Vous devez être connecté pour chercher un disque.');
        $limit = $this->container->getParameter('listingLimit');

        $em = $this->getDoctrine()->getManager();
        $res = $em->getRepository('AppBundle:Cd')->createQueryBuilder('c')
            ->select('c.cd AS num, c.titre AS label, c.titre AS value');
        if($like) {
            $res = $res->where('c.titre LIKE :titre')
                ->setParameter('titre','%'.$request->query->get('term').'%');
        } else {
            $res = $res->where('c.titre = :titre')
                ->setParameter('titre',$request->query->get('term'));
        }
        $res= $res
            ->orderBy('c.titre','ASC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();

        $response = new JsonResponse();
        $response->setData($res);
        return $response;
    }

    /**
     * @Route("/cd/{id}/comment", name="commentCd")
     */
    public function commentAction(Request $request, $id)
    {
        $this->denyAccessUnlessGranted('ROLE_USER', null, 'Vous devez être connecté pour poster un commentaire.');
        $em = $this->getDoctrine()->getManager();

        $post = $request->request;
        $comment = new CdComment();
        $cd = $em->getRepository('AppBundle:Cd')->find($id);


        $comment->setComment($post->get('message'));
        $comment->setUser($this->get('security.token_storage')->getToken()->getUser());
        $comment->setCd($cd);

        $em->persist($comment);
        $em->flush();

        $response = new JsonResponse();
        $response->setData();
        return $response;
    }

    /**
     * @Route("/cd/{cd}/comments/{comment}", name="recupComments")
     */
    public function recupComment(Request $request, $cd, $comment)
    {
        $em = $this->getDoctrine()->getManager();
        $comments = $em->getRepository('AppBundle:CdComment')->createQueryBuilder('c')
            ->select('c')
            ->where('c.cd = :cd')
            ->setParameter('cd',$cd)
            ->andWhere('c.dbkey > :last_comment')
            ->setParameter('last_comment',$comment)
            ->orderBy('c.dbkey','ASC')
            ->getQuery()
            ->getResult();

        $retour = array();
        foreach ($comments as $key => $comment) {
            $retour[$key]['user'] = $comment->getUser()->getLibelle();
            $retour[$key]['dbkey'] = $comment->getDbkey();
            $retour[$key]['chrono'] = $comment->getChrono()->format("d/m/Y - H:i");
            $retour[$key]['comment'] = $comment->getComment();
        }


        $response = new JsonResponse();
        $response->setData($retour);
        return $response;
    }

    /**
     * @Route("/cd/note/{id}", name="noteCd")
     */
    public function noteAction(Request $request, $id)
    {
        $this->denyAccessUnlessGranted('ROLE_PROGRA', null, 'Seuls les programmateurs peuvent noter un CD.');

        if(!empty($request->request->get('note'))) {
            $note = $request->request->get('note');
            $note = str_replace(',', '.', $note);

            if(is_numeric($note) && $note >= 0 && $note <= 5) {
                round($note, 1);

                $em = $this->getDoctrine()->getManager();

                $user = $this->get('security.token_storage')->getToken()->getUser();
                $cd = $em->getRepository('AppBundle:Cd')->find($id);

                if(!$cd) {
                    throw $this->createNotFoundException(
                        'Aucun cd trouvé pour cet id : '.$id
                    );
                }

                $repository = $em->getRepository('AppBundle:CdNote');
                $verif_note = $repository->findOneBy(array('user'=>$user,'cd'=>$cd));

                if(!$verif_note) {
                    $cd_note = new CdNote();
                    $cd_note->setCd($cd);
                    $cd_note->setUser($user);
                    $cd_note->setNote($note);

                    $em->persist($cd_note);

                    $note_moy = $em->getRepository('AppBundle:CdNote')->createQueryBuilder('n')
                        ->select('avg(n.note)')
                        ->where('n.cd = :cd')
                        ->setParameter('cd',$cd)
                        ->getQuery()
                        ->getResult();

                    $cd->setNoteMoy($note_moy[0][1]);

                    $em->persist($cd);
                    $em->flush();

                    $this->addFlash('success','La note que vous avez choisie a été affectée au CD.');
                } else {
                    $this->addFlash('error','Impossible de noter deux fois un CD.');
                }


            } else {
                $this->addFlash('error','La note d\'un CD doit être numérique, comprise entre 0 et 5.');
            }

        } else {
            $this->addFlash('error','Une erreur est survenue lors de la notation du CD !');
        }

        return $this->redirect($this->generateUrl('showCd',array('id'=>$id)));
    }

    /**
     * @Route("/cd/{id}/editRetour", name="editRetourLabel")
     */
    public function editRetourLabelAction(Request $request, $id)
    {
        $this->denyAccessUnlessGranted('ROLE_PROGRA', null, 'Seuls les programmateurs peuvent éditer le retour label.');

        $em = $this->getDoctrine()->getManager();

        $cd = $em->getRepository('AppBundle:Cd')->find($id);

        if(!$cd) {
            throw $this->createNotFoundException(
                'Aucun cd trouvé pour cet id : '.$id
            );
        }

        $cd->setRetourComment($request->request->get('retour_comment'));

        $em->persist($cd);
        $em->flush();

        $this->discoLog("a modifié le message de retour au label du disque ".$cd->getCd()." ".$cd->getTitre());
        $this->addFlash('info','Le message de retour label a été modifié.');

        return $this->redirect($this->generateUrl('showCd',array('id'=>$id)));
    }

    /**
     * @Route("/cd/getinfos/{id}", name="getInfosCd", options={"expose"=true})
     */
    public function getInfosAction($id)
    {
        $cd = $this->getDoctrine()->getManager()->getRepository('AppBundle:Cd')->find($id);

        if(!$cd || $cd->getSuppr() || $cd->getAirplay()) {
            return null;
        }

        $tab = array(
            'artiste'=>$cd->getArtiste()->getLibelle(),
            'titre' => $cd->getTitre(),
            'annee' => $cd->getAnnee(),
            'note' => $cd->getNoteMoy(),
            'ecoute' => $cd->getEcoute()
        );
        if ($cd->getRotation()) {
            $tab['rotation'] = $cd->getRotation()->getLibelle();
        } else {
            $tab['rotation'] = '';
        }
        if ($cd->getGenre()) {
            $tab['genre'] = $cd->getGenre()->getLibelle();
        } else {
            $tab['genre'] = '';
        }
        if ($cd->getType()) {
            $tab['type'] = $cd->getType()->getLibelle();
        } else {
            $tab['type'] = '';
        }

        $tab['star'] = 0;
        $tab['paulo'] = 0;
        $tab['anim'] = 0;

        foreach ($cd->getPistes() as $key => $piste) {
            if($piste->getStar()) {
                $tab['star']++;
            }if($piste->getPaulo()) {
                $tab['paulo']++;
            }if($piste->getAnim()) {
                $tab['anim']++;
            }
        }

        $response = new JsonResponse();
        $response->setData($tab);
        return $response;

    }


}

