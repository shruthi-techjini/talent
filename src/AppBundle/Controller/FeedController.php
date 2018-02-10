<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FeedController extends Controller{
	
	public function myFeedAction(){
		return $this->render('default/index.html.twig',array('title'=>'home'));
	}
	
	
}