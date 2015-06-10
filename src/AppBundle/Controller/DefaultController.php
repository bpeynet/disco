<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\DiscoController;
use AppBundle\Entity\Cd;
use AppBundle\Form\CdType;
use Symfony\Component\HttpFoundation\Request;
use fPDFBundle;


class DefaultController extends DiscoController
{

    /**
     * @Route("/test/mail/{id}", name="testMail")
     */
    public function testMailAction($id)
    {
        $cd = $this->getDoctrine()->getManager()->getRepository('AppBundle:Cd')->find($id);

        $airplays = $this->getDoctrine()->getManager()->getRepository('AppBundle:AirplayCd')->findByCd($cd);

        $message = \Swift_Message::newInstance()
            ->setSubject("Radio Campus Grenoble / ".$cd->getArtiste()->getLibelle()." - ".$cd->getTitre()." [retour d'écoute]")
            ->setFrom('test@test.fr')
            ->setTo('rcgtest@yopmail.com')
            ->setBody($this->renderView('mails/retour-label.html.twig', array('cd' => $cd, 'airplays' => $airplays)))
        ;
        $test = $this->get('mailer')->send($message);



        $this->addFlash('success','Le mail a été envoyé !!!! :DDDDDDD');

        return $this->redirect($this->generateUrl('index'));
    }

    /**
     * @Route("/test/etiquettes", name="testEtiquettes")
     */
    public function etiquettesAction()
    {
        $cds = $this->getDoctrine()->getManager()->createQuery(
                'SELECT cd
                FROM AppBundle:Cd cd
                ORDER BY cd.cd DESC'
            )
            ->setMaxResults(24)
            ->getResult();

        foreach ($cds as $key => $cd) {
            $cd->setEtiquette(true);
        }

        $this->getDoctrine()->getManager()->flush();

        // //on stocke la vue à convertir en PDF, en n'oubliant pas les paramètres twig si la vue comporte des données dynamiques
        // $html = $this->renderView('default/vignettes.html.twig', array('cds' => $cds));
         
        // //on instancie la classe Html2Pdf_Html2Pdf en lui passant en paramètre
        // //le sens de la page "portrait" => p ou "paysage" => l
        // //le format A4,A5...
        // //la langue du document fr,en,it...
        // $html2pdf = new \Html2Pdf('P','A4','fr');
 
        // //SetDisplayMode définit la manière dont le document PDF va être affiché par l’utilisateur
        // //fullpage : affiche la page entière sur l'écran
        // //fullwidth : utilise la largeur maximum de la fenêtre
        // //real : utilise la taille réelle
        // $html2pdf->pdf->SetDisplayMode('real');
 
        // //writeHTML va tout simplement prendre la vue stocker dans la variable $html pour la convertir en format PDF
        // $html2pdf->writeHTML($html);
 
        // //Output envoit le document PDF au navigateur internet avec un nom spécifique qui aura un rapport avec le contenu à convertir (exemple : Facture, Règlement…)
        // $html2pdf->Output('','S');

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(40,10,'Hello World!');
        $pdf->Output();

        $response = new Response();
        $response->clearHttpHeaders();
        $response->setContent(file_get_contents($pdf));
        $response->headers->set('Content-Type', 'application/pdf');
        $response->headers->set('Content-disposition', 'filename='. $fichier);
         
        return $response;
    }

    /**
     * @Route("/", name="index")
     */
    public function indexAction(Request $request) {

        if ($this->get('security.context')->isGranted('ROLE_INACTIF')) {
            $this->addFlash('error','Votre compte est inactif, vous ne pouvez donc pas vous connecter. Si cela est une erreur, prévenez un Admin.');
            return $this->redirect($this->generateUrl('logout'));
        }

        $this->denyAccessUnlessGranted('ROLE_USER', null, 'Une connexion est nécessaire.');

        $results = array();
        $q = $request->query->get('q');
        if ($q) {
            $em = $this->getDoctrine()->getManager();

            $max = 50;

            $results = $em->getRepository("AppBundle:Cd")->createQueryBuilder('c')
                ->where('c.titre LIKE :titre')
				->setParameter('titre', "%$q%")
				->setMaxResults($max)
				->getQuery()
				->getResult();

            if (count($results) < $max) {
                $results = array_merge($results,
                    $em->getRepository("AppBundle:Artiste")->createQueryBuilder('a')
                        ->where('a.libelle LIKE :lib')
                        ->setParameter('lib', "%$q%")
                        ->setMaxResults($max - count($results))
                        ->getQuery()
                        ->getResult());
            }

            if (count($results) < $max) {
                $results = array_merge($results,
                    $em->getRepository("AppBundle:Label")->createQueryBuilder('l')
                        ->where('l.libelle LIKE :lib')
                        ->setParameter('lib', "%$q%")
                        ->setMaxResults($max - count($results))
                        ->getQuery()
                        ->getResult());
            }
        }

        return $this->render('default/search.html.twig', array('results' => $results, 'q' => $q));
    }

}

