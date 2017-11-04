<?php

namespace Api\TalentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ApiTalentBundle:Default:index.html.twig');
    }
}
