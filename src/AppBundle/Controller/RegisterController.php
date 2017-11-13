<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\RegisterType;

class RegisterController extends Controller{
	
	public function signupAction(Request $req){

		$form = $this->createForm(RegisterType::class);
		return $this->render('register/signup.html.twig',array('form'=>$form->createView(),'title'=>'Signup'));
	}
}


