<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\RegisterType;
use AppBundle\Entity\User;
use AppBundle\Constants\Constants;
use AppBundle\Service\MailerService;
use AppBundle\Service\HelperService;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use AppBundle\Form\LoginType;

class RegisterController extends Controller{
	
	public function signupAction(Request $request){

		$user = new user();
		$form = $this->createForm(RegisterType::class, $user);
		
		$form->handleRequest($request);
		
		if($form->isSubmitted()) {
			
			if($form->isValid()){
					
				$em = $this->getDoctrine()->getManager();
					
				$user->setPassword(md5($request->get('password')['first']));
				$helper = new HelperService($this->container);
				$token = $helper->generateVerificationToken();
				$user->setVerificationToken($token);
				$em->persist($user);
				$em->flush();
					
					
				$mailer = new  MailerService($this->container);
				$mailOptions = array('toEmail'=>$request->get('email'),'firstName'=>$request->get('firstName'),
						'lastName'=>$request->get('lastName'),
						'url'=>$this->generateUrl('verify_token',array('token'=>$token),UrlGeneratorInterface::ABSOLUTE_URL)
				);
				$mailer = $mailer->sendRegistrationMail($mailOptions);
					
				if($mailer){
					 return $this->redirect($this->generateUrl('register_success'));
				}
			}
		}
		return $this->render('register/signup.html.twig',array('form'=>$form->createView(),'title'=>'Signup'));
	}
	
	public function registerSuccessAction(){ 
		return $this->render('register/register_success.html.twig',array('title'=>'Signup Success'));
	}
	
	public  function verifyTokenAction(Request $req, $token){

		$em = $this->getDoctrine()->getManager();
		$user = $em->getRepository(User::class)->findOneByVerificationToken($token);
		
		if($user instanceof User){
			$user->setVerificationToken(null);
			$user->setStatus(Constants::USER_STATUS_VERIFIED);
			$em->persist($user);
			$em->flush();
			return $this->render('register/token_verify_success.html.twig',array('title'=>'Signup Success'));
		}else{
			return $this->render('register/token_verify_failure.html.twig',array('title'=>'Signup Error'));
		}
	}
	
	public function login1Action(Request $req){
		
		$user = new User();
		$form = $this->createForm(LoginType::class,$user);
		$form->handleRequest($req);
		
		if($form->isSubmitted() && $form->isValid()){
			echo "===";exit;
		}
		
		return $this->render('register/login.html.twig',array('title'=>'Login','form'=>$form->createView()));
		
	}
}


