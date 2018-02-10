<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FeedController extends Controller{
	
	public function myFeedAction(){
		
		$posts = $this->getDoctrine()->getManager()->getRepository('AppBundle:Post')->findAll();
		return $this->render('default/index.html.twig',array('title'=>'home','posts'=>$posts));
	}
	
	
}