<?php
namespace AppBundle\Service;

use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Entity\User;

class HelperService{
	
	private $container;
	
	function __construct(ContainerInterface $container){
		$this->container = $container;
	}
	
	function  generateVerificationToken(){
		$token = uniqid();
		
		$userToken = $this->container->get('doctrine')->getRepository(User::class)->findOneByVerificationToken($token);

		if($userToken instanceof User){
			$this->generateVerificationToken();
		}else{
			return $token;
		}
	}	
	
	
}