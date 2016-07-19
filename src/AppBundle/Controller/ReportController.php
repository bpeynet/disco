<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\DiscoController;
use DateTime;
use DateInterval;
use AppBundle\Entity\Report;
use Symfony\Component\HttpFoundation\Request;

class ReportController extends DiscoController
{
    /**
     * @Route("/report", name="report")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $genres = $em->getRepository("AppBundle:Genre")->findAll();
        return $this->render('report/askReport.html.twig',array(
            'genres'    => $genres
            ));
    }
    
    /**
     * @Route("/report/asked", name="askreport")
     */
    public function askReportAction()
    {
        $parameters = array ('begin_date' => $_POST['begin_date'],
                             'end_date'   => $_POST['end_date'],
                             'styles'     => $_POST['styles']);
        if (!$this->validateDateGap($parameters['begin_date'],$parameters['end_date'])) {
            return $this->redirectToRoute('report');
        } else {
            $parametersBIS = array ('begin_date' => $parameters['begin_date'],
                                    'end_date'   => $parameters['end_date'],
                                    'styles'     => json_encode($parameters['styles']));
            $fields_string = "";
            foreach($parametersBIS as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
            rtrim($fields_string, '&');
            $resultat = $this->triggerHTTP($fields_string, 'rapport',1);
            $resultat = json_decode($resultat, true);
            $em = $this->getDoctrine()->getManager();
            $genres = $em->getRepository("AppBundle:Genre")->findAll();
            return $this->render('report/Report.html.twig', array(
                'choix'     => $parameters,
                'genres'    => $genres,
                'resultat'  => $resultat
                    ));
        }
    }

    public function validateDateGap($date1, $date2) {
        $format = 'd/m/Y';
        $d1 = DateTime::createFromFormat($format, $date1);
        $d2 = DateTime::createFromFormat($format, $date2);
        if ($d1 && $d1->format($format) == $date1
                && $d2 && $d2->format($format) == $date2) {
            $gap = date_diff($d1,$d2,false);
            return $gap->invert==0;
        } else {
            return false;
        }
    }

}

