<?php
namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\User;
use AppBundle\Service\HelperService;
use AppBundle\Service\MailerService;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use AppBundle\Form\ResetPasswordType;

class PasswordController extends Controller{
	
	public  function forgotPasswordAction(Request $request){
		$error = "";
		
		if($request->get('email')){
			
			$em = $this->getDoctrine()->getManager();
			$user = $em->getRepository(User::class)->findOneByEmail($request->get('email'));
			
			if($user instanceof User){

				$helper = new HelperService($this->container);
				$token = $helper->generateVerificationToken();
				//echo $this->generateUrl('reset_password',array('token'=>$token),UrlGeneratorInterface::ABSOLUTE_URL);exit;
				$user->setVerificationToken($token);
				$em->persist($user);
				$em->flush();
				
				$mailer = new  MailerService($this->container);
				$mailOptions = array('toEmail'  => $user->getEmail(),
									 'firstName'=> $user->getFirstName(),
									 'lastName' => $user->getLastName(),
									 'url'      => $this->generateUrl('reset_password',array('token'=>$token),UrlGeneratorInterface::ABSOLUTE_URL)
				);
				$mailer = $mailer->sendResetPasswordMail($mailOptions);
				
				if($mailer){
					return $this->render('password/forgot_password_successfull.html.twig',array('title'=>'Forgot Password Success','error'=>$error));
				}else{
					$error = "Unable to send an email to your mail Id";
				}
				
			}else{
				$error = "Given email id is invalid. Please provide the valid email or write to shruthi.r@techjini.com";
			}
		}
		return $this->render('password/forgot_password.html.twig',array('title'=>'Forgot Password','error'=>$error));
		
	}
	
	public function resetPasswordAction(Request $req, $token){
		
		$em = $this->getDoctrine()->getManager();
		$user = $em->getRepository(User::class)->findOneByVerificationToken($token);
		
		if($user instanceof User){
			
			$form = $this->createForm(ResetPasswordType::class,$user);
			$form->handleRequest($req);
			
			if($form->isSubmitted() && $form->isValid()){
				
				$encoder = $this->container->get('security.password_encoder');
				$password = $encoder->encodePassword($user, $user->getPassword());
				$user->setPassword($password);
				$user->setVerificationToken(null);
				$em->persist($user);
				$em->flush();
				
				$req->getSession()
				->getFlashBag()
				->add('success', 'Successfully changed your pasword! Login now');
				
				return  $this->redirect($this->generateUrl('login_check'));
			}
			
			return $this->render('password/reset.html.twig',array('title'=>'Reset Password','token'=>$token,'form'=>$form->createView()));
		
		}else{
			
			return $this->render('password/reset_token_invalid.html.twig',array('title'=>'Reset Password error'));
		}
		
	}
	
}