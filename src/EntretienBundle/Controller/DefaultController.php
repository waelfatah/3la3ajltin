<?php

namespace EntretienBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@Entretien/Default/index.html.twig');
    }
    public function BackAction()
    {
        return $this->render('@Entretien/back/dashboard.html.twig');
    }
}
