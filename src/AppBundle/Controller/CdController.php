<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Cd;
use AppBundle\Entity\Piste;
use AppBundle\Form\CdType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;


class CdController extends Controller
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
    			->where('c.titre LIKE :titre_l')
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
     * @Route("/cd/show/{id}", name="showCd")
     */
    public function showAction($id) {
        $this->denyAccessUnlessGranted('ROLE_USER', null, 'Une connexion est nécessaire.');

        $cd = $this->getDoctrine()
            ->getRepository('AppBundle:Cd')
            ->find($id);

        if(!$cd) {
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
	 * @Route("/cd/delete/{id}", name="deleteCd")
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

        $this->addFlash('success','Le Cd ne s\'affichera plus. Si cela est une erreur, contactez l\'admin !');
        return $this->redirect($this->generateUrl('cd'));
	}


    /**
     * @Route("/cd/create", name="createCd")
     */
    public function createAction(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_PROGRA', null, 'Seul un programmateur peut créer un disque.');

        $post = new Cd();
        $form = $this->createForm(new CdType(),$post);
        $form->add('submit', 'submit', array(
                'label' => 'Créer le CD',
                'attr' => array('class' => 'btn btn-success btn-block','style'=>'font-weight:bold')
            ));

        $form->handleRequest($request);

        if($form->isValid()) {
            $em = $this->getDoctrine()->getManager();


            
            $cd = $form->getData();

            $cd->setLabel(null);
            $cd->setMaison(null);
            $cd->setDistrib(null);

            $req = $request->request->get('appbundle_cd');

            $artiste = $em->getRepository('AppBundle:Artiste')->findOneByLibelle($req['artiste']);
            $genre = $em->getRepository('AppBundle:Genre')->find(intval($req['genre']));
            $cd->setArtiste($artiste);
            $cd->setGenre($genre);

            $em->persist($cd);
            $em->flush();

            for($i = 1; $i <= $req['nbPiste']; $i++) {
                $piste = new Piste();
                $piste->setPiste($i);
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
                $em->flush();

            }
            $num = $em->createQuery(
                    'SELECT max(c.cd)
                    FROM AppBundle:Cd c')
                ->getResult()[0][1];




            $this->addFlash('success','Le CD a bien été créé !');

            return $this->redirect($this->generateUrl('showCd',array('id'=>$num)));

        } else {
            if ($request->isMethod('POST')) {
                $this->addFlash('error','Les champs on été mal renseignés.');
            }
            return $this->render('cd/create.html.twig',array('form'=>$form->createView()));
        }
    }

    /**
     *  @Route("/cd/autocomplete/{like}", name="autocompleteTitre")
     */
    public function autocompleteAction($like, Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_PROGRA', null, 'Seul un programmateur peut modifier un disque.');
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


}

