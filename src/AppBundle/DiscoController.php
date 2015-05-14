<?php

namespace AppBundle;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DiscoController extends Controller {
    protected function discoLog($message) {
        $username = $this->get('security.token_storage')->getToken()->getUser()->getUsername();
        $this->get("disco.logger")->info($username." ".$message);
    }
}
