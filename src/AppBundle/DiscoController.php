<?php

namespace AppBundle;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DiscoController extends Controller {
    protected function discoLog($message) {
        $username = $this->get('security.token_storage')->getToken()->getUser()->getUsername();
        $this->get("disco.logger")->info($username." ".$message);
    }
    
    /**
     * Envoie dans une requête HTTP les data vers le serveur Rails
     * sur la machine de Radio Campus
     * au contrôleur controller
     * @param type $data
     * @param type $controller
     * @param type $reponse true si l'on souhaite récupérer une réponse
     * @param type $header tableau d'options à mettre en en-tête de la requête HTTP
     * @return type
     */
    protected function triggerHTTP($data, $controller, $reponse = 0, $header = NULL) {
        $url = 'http://'.$this->container->getParameter('ip_rails').'/'.$controller;
        $port = 3000;
        $options=array(
            CURLOPT_URL            => $url, // Url cible (l'url la page que vous voulez télécharger)
            CURLOPT_HEADER         => false, // Ne pas inclure l'entête de réponse du serveur dans la chaine retournée
            CURLOPT_POST           => true,
            CURLOPT_PORT           => $port,
            CURLOPT_POSTFIELDS     => $data,
            CURLOPT_RETURNTRANSFER => $reponse
        );
        $CURL=curl_init();
        if ($header) {
            curl_setopt($CURL, CURLOPT_HTTPHEADER, $header);
        }
        curl_setopt_array($CURL,$options);
        $resultat = curl_exec($CURL);
        curl_close($CURL);
        return $resultat;
    }
    
}
