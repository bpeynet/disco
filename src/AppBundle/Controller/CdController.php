<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Cd;
use AppBundle\Form\CdType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;


class CdController extends Controller
{
    /**
     * @Route("/cd", name="cd")
     */
    public function indexAction(Request $request)
    {

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
    			->where('c.titre LIKE :titre')
    			->setParameter('titre','%'.$titre.'%');
			if(!empty($artiste)) {
				$retour = $retour->innerJoin('c.artiste','a')
				->andWhere('a.libelle LIKE :artiste')
				->setParameter('artiste','%'.$artiste.'%');	
			}
			if(!empty($label)) {
				$retour = $retour->innerJoin('c.label','l')
				->andWhere('l.libelle LIKE :label')
				->setParameter('label','%'.$label.'%');
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

    	} else {
    		$retour = $em->getRepository('AppBundle:Cd')->createQueryBuilder('c')
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
     * @Route("/cd/create", name="createCd")
     */
    public function createAction(Request $request)
    {
        $post = new Cd();
        $form = $this->createForm(new CdType(),$post);
        $form->add('submit', 'submit', array(
                'label' => 'Créer le CD',
                'attr' => array('class' => 'btn btn-success btn-block','style'=>'font-weight:bold')
            ));

        $form->handleRequest($request);

        if($form->isValid()) {

            $data = $form->getData();

            $em = $this->getDoctrine()->getManager();

            $em->persist($data);
            $em->flush();

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
     * @Route("search/artiste", name="searchArtiste")
     */
    public function searchAAction()
    {
        $term = htmlspecialchars($_GET['term']);

        $em = $this->getDoctrine()->getManager();
        $res = $em->getRepository('AppBundle:Artiste')->createQueryBuilder('a')
            ->where('a.libelle LIKE :libelle')
            ->setParameter('libelle','%'.$term.'%')
            ->orderBy('a.libelle','ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();

        $retour = array();

        foreach ($res as $key => $value) {
            $row = array();
            $row['num'] = $value->getArtiste();
            $row['label'] = $value->getLibelle();
            $row['value'] = $value->getLibelle();
            array_push($retour, $row);
        }

        echo json_encode($retour);

        return $this->render('cd/vide.html.twig',array('retour'=>$retour));
    }

}

