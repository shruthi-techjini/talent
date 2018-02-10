<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\User;
use AppBundle\Form\EditProfileType;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class ProfileController extends Controller{
	
	public function editProfileAction(Request $req,$id){
		$em = $this->getDoctrine()->getManager();
		
		$existingUser = $this->container->get('security.token_storage')->getToken('user')->getUser()->getId();
		$user = $em->getRepository('AppBundle:User')->findOneById($id);
		
		if($user->getId() != $existingUser){
			return $this->redirectToRoute("my_feed");
		}
		
		
		$form = $this->createForm(EditProfileType::class, $user);
		$form->handleRequest($req);
		
		if ($form->isSubmitted() && $form->isValid()) {
			
			
			$em->persist($user);
			$em->flush();
			
			try{
				$file = $user->getFile();
				$fileName =$user->getId().'.'.$file->guessExtension();
				$dirPath = $this->getParameter('user_image_directory');
			
				if (!file_exists($dirPath)) {
					mkdir($dirPath , 0777, true);
				}
				$file->move(
						$dirPath,
						$fileName
						);
				$user->setProfilePic($fileName);
				$em->persist($user);
				$em->flush();
			}catch (\Exception $e){
				$this->container->get('session')->getFlashBag()
				->add('error','Account Test status changed successfully, but mail sending failed, please check the mail log and send the email manually.');
			}
			return $this->redirectToRoute('my_feed');
		}
		return $this->render('profile/edit.html.twig', array(
				'post' => $user,
				'form' => $form->createView(),
				'title' => "Edit user",
				'id'=>$id
		));
	}
	
}