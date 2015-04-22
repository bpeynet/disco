<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Cd;
use AppBundle\Form\CdType;
use Symfony\Component\HttpFoundation\Request;


class CdController extends Controller
{
    /**
     * @Route("/cd", name="cd")
     */
    public function indexAction(Request $request)
    {
    	$retour = null;
    	$langues = $this->getDoctrine()->getRepository('AppBundle:Langue')->findAll();
    	$genres = $this->getDoctrine()->getRepository('AppBundle:Genre')->findAll();
    	$rotations = $this->getDoctrine()->getRepository('AppBundle:Rotation')->findAll();
    	$supports = $this->getDoctrine()->getRepository('AppBundle:Support')->findAll();
    	$types = $this->getDoctrine()->getRepository('AppBundle:Type')->findAll();
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

    		$retour['cd'] = $this->getDoctrine()->getManager()
    			->getRepository('AppBundle:Cd')->createQueryBuilder('c')
    			->where('c.titre LIKE :titre')
    			->setParameter('titre','%'.$titre.'%');
			if(!empty($artiste)) {
				$retour['cd'] = $retour['cd']->innerJoin('c.artiste','a')
				->andWhere('a.libelle LIKE :artiste')
				->setParameter('artiste','%'.$artiste.'%');	
			}
			if(!empty($label)) {
				$retour['cd'] = $retour['cd']->innerJoin('c.label','l')
				->andWhere('l.libelle LIKE :label')
				->setParameter('label','%'.$label.'%');
			}
			if($annee != 0) {
				$retour['cd'] = $retour['cd']->andWhere('c.annee = :annee')
				->setParameter('annee',$annee);
			}
			if(!empty($langue)) {
				$retour['cd'] = $retour['cd']->andWhere('c.langue = :langue')
				->setParameter('langue', $langue);
			}
			if(!empty($genre)) {
				$retour['cd'] = $retour['cd']->andWhere('c.genre = :genre')
				->setParameter('genre', $genre);
			}
			if(!empty($rotation)) {
				$retour['cd'] = $retour['cd']->andWhere('c.rotation = :rotation')
				->setParameter('rotation', $rotation);
			}
			if(!empty($support)) {
				$retour['cd'] = $retour['cd']->andWhere('c.support = :support')
				->setParameter('support', $support);
			}
			if(!empty($type)) {
				$retour['cd'] = $retour['cd']->andWhere('c.type = :type')
				->setParameter('type', $type);
			}

			$retour['cd'] = $retour['cd']->orderBy('c.titre', 'ASC')
				->setMaxResults(50)
				->getQuery()
				->getResult();

    	} else {
    		$retour['cd'] = $this->getDoctrine()->getManager()
    			->getRepository('AppBundle:Cd')->createQueryBuilder('c')
    			->orderBy('c.cd','DESC')
    			->setMaxResults(50)
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
}

