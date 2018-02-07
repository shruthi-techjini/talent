<?php
namespace AppBundle\Service;

use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Constants\MailTemplates;

class MailerService{
	
	private $container;
	
	function __construct(ContainerInterface $container){
		$this->container = $container;	
	}
	
	function sendRegistrationMail($options = array()){
		
		$mailer = $this->container->get('mailer');
		
		$message = (new \Swift_Message('Welcome to I do have Talent'))
						->setFrom('shruthiindra01@gmail.com')
						->setTo($options['toEmail'])
						->setBody(MailTemplates::registerMail($options),'text/html');
		
		try{
			$mailer->send($message);
			return true;
		} 
		catch (\Exception $e){
			return false;
		}
	}
	
	function sendResetPasswordMail($options = array()){
		$mailer = $this->container->get('mailer');
		
		$message = (new \Swift_Message('Reset your password - I do have Talent'))
					->setFrom('shruthiindra01@gmail.com')
					->setTo($options['toEmail'])
					->setBody(MailTemplates::resetPasswordMail($options),'text/html');
		
		try{
			$mailer->send($message);
			return true;
		}
		catch (\Exception $e){
			return false;
		}
	}
	
	
	
}