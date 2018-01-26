<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\RegisterType;
use AppBundle\Entity\User;
use AppBundle\Constants\Constants;

class RegisterController extends Controller{
	
	public function signupAction(Request $req){

		$form = $this->createForm(RegisterType::class);
		return $this->render('register/signup.html.twig',array('form'=>$form->createView(),'title'=>'Signup'));
	}
	
	public  function verifyTokenAction(Request $req, $token){

		$em = $this->getDoctrine()->getManager();
		$user = $em->getRepository(User::class)->findOneByVerificationToken($token);
		
		if($user instanceof User){
			$user->setVerificationToken(null);
			$user->setStatus(Constants::USER_STATUS_VERIFIED);
			$em->persist($user);
			$em->flush();
			echo "you have successfully verified you email";exit;
		}else{
			echo "Invalid token";exit;
		}
		
	}
}


