<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    
    public function indexAction(Request $request)
    {
    	//echo "==";exit;
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig',array('title'=>'home'));
    }
    
    public function myPageAction(Request $req){
    	return $this->render('default/mypage.html.twig',array('title'=>'home'));
    }
}
