<?php

namespace App\TalentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AppTalentBundle:Default:index.html.twig');
    }
}
