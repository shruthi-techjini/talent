<?php
namespace AppBundle\Controller;
	
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\RegisterType;
use AppBundle\Entity\User;
use AppBundle\Service\MailerService;
use AppBundle\Service\HelperService;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class ApiRegisterController extends FOSRestController{
	
	public function testAction(Request $request){
		
		print_r($request->query->all());
		$articles = json_encode(array("hi","w"));
		
		return  new Response($articles);
	}
	
	public function RegisterAction(Request $request){
	
		$user = new user();
		$form = $this->createForm(RegisterType::class, $user);
		$form->submit($request->query->all());
		
		if($form->isValid()){
			
			$em = $this->getDoctrine()->getManager();
			
			$user->setPassword(md5($request->get('password')));
			$helper = new HelperService($this->container);
			$token = $helper->generateVerificationToken();
			$user->setVerificationToken($token);
			//$em->persist($user);
			//$em->flush();
			
			
			$mailer = new  MailerService($this->container);
			$mailOptions = array('toEmail'=>$request->get('email'),'firstName'=>$request->get('firstName'),
								'lastName'=>$request->get('lastName'),
								'url'=>$this->generateUrl('verify_token',array('token'=>$token),UrlGeneratorInterface::ABSOLUTE_URL)
			);
			$mailer->sendRegistrationMail($mailOptions);
			
			if($mailer){
				echo "==";exit;
			}else{
				echo "22";exit;
			}
		}else{
			
			
			
		}
		return  $form;
	}
	
	
}