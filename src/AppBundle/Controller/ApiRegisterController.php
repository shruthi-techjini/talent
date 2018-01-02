<?php
namespace AppBundle\Controller;
	
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\RegisterType;

class ApiRegisterController extends FOSRestController{
	
	public function testAction(Request $request){
		
		print_r($request->query->all());
		$articles = json_encode(array("hi","w"));
		
		return  new Response($articles);
	}
	
	public function RegisterAction(Request $request){
	
		$form = $this->createForm(RegisterType::class,array());
		//$form->handleRequest($request);
		$form->submit($request->query->all());
		
		if($form->isValid()){
			echo "sdk";
			
		}else{
			echo "fdj";
			
			//var_dump($form->getErrors());
		}
		
		
		$articles = json_encode(array("er","erd"));
	
		return  new Response($articles);
	}
	
	
}