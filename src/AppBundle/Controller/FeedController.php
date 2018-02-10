<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Comments;
use Symfony\Component\HttpFoundation\Request;

class FeedController extends Controller{
	
	public function myFeedAction(){
		
		$posts = $this->getDoctrine()->getManager()->getRepository('AppBundle:Post')->findAll();
		return $this->render('default/index.html.twig',array('title'=>'home','posts'=>$posts));
	}
	
	public function commentAction(Request $req){
		$comment = new Comments();
		
		$user = $this->container->get('security.token_storage')->getToken('user')->getUser()->getId();
		
		$em = $this->getDoctrine()->getManager();
		
		$comment->setUserId($user);
		$comment->setUpdatedBy($user);
		$comment->setPostId($req->get('postId'));
		$comment->setComment($req->get('comment'));
		
		$em->persist($comment);
		$em->flush();
		
		return $this->redirectToRoute('post_show',array('id'=>$req->get('postId')));
		
	}
	
	
}