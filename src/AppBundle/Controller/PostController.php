<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\PostType;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use AppBundle\Repository\PostRepository;
use AppBundle\Entity\PostGenreMapping;
use AppBundle\Repository\CategoryRepository;

/**
 * Post controller.
 *
 */
class PostController extends Controller
{
	/**
	 * Lists all post entities.
	 *
	 */
	public function indexAction()
	{
		$em = $this->getDoctrine()->getManager();
		
		$user = $this->container->get('security.token_storage')->getToken('user')->getUser()->getId();
		
		$posts = $em->getRepository('AppBundle:Post')->findByUserId($user);
		
		
		return $this->render('post/index.html.twig', array(
				'posts' => $posts,
				'title' => "Post",
				
		));
	}

	/**
	 * Creates a new post entity.
	 *
	 */
	public function newAction(Request $request)
	{
		$em = $this->getDoctrine()->getManager();
		$post = new Post();
		$genreArray = array();
		$genres = $em->getRepository('AppBundle:Genre')->findAll();
		foreach($genres as $genre){
			$genreArray[$genre->getId()] = $genre->getName();;
		}
		$form = $this->createForm(PostType::class, $post,array(
            'genres' => $genreArray,
			'selectedGenres' => array()
				
        ));
		$form->handleRequest($request);
		

		if ($form->isSubmitted() && $form->isValid()) {
			$user = $this->container->get('security.token_storage')->getToken('user')->getUser()->getId();
			$post->setCategoryId(1);
			$post->setSubCategoryId($post->getSubCategoryId()->getId());
			$post->setLanguage($post->getLanguage()->getId());
			$post->setUserId($user);
			$post->setStatus(PostRepository::STATUS_ACTIVE);
			$em->persist($post);
			$em->flush();
			
			$formData = $request->request->get('post');
			$genres = $formData['genre'];
			foreach($genres as $key=>$value){
				$postGenre = new PostGenreMapping();
				$postGenre->setGenreId($genres[$key]);
				$postGenre->setPostId($post->getId());
				$postGenre->setStatus(CategoryRepository::STATUS_ACTIVE);
				$em->persist($postGenre);
				$em->flush();
			}
			
			try{
				$file = $post->getFile();
				$fileName =$post->getId().'.'.$file->guessExtension();
				$dirPath = $this->getParameter('post_image_directory');
				
				if (!file_exists($dirPath)) {
					mkdir($dirPath , 0777, true);
				}
				$file->move(
						$dirPath,
						$fileName
						);
				$post->setImage($fileName);
				$em->persist($post);
				$em->flush();
			}catch (\Exception $e){
				$this->container->get('session')->getFlashBag()
				->add('error','Account Test status changed successfully, but mail sending failed, please check the mail log and send the email manually.');
			}
			return $this->redirectToRoute('post_show', array('id' => $post->getId()));
		}

		return $this->render('post/new.html.twig', array(
				'post' => $post,
				'form' => $form->createView(),
				'title' => "Create Post",
		));
	}

	/**
	 * Finds and displays a post entity.
	 *
	 */
	public function showAction(Post $post)
	{
		$em = $this->getDoctrine()->getManager();
		$comments = $em->getRepository('AppBundle:Comments')->findByPostId($post->getId());
		
		return $this->render('post/show.html.twig', array(
				'post' => $post,
				'title' => "Post",
				'comments' => $comments
		));
	}

	/**
	 * Displays a form to edit an existing post entity.
	 *
	 */
	public function editAction(Request $request, Post $post)
	{
		$em = $this->getDoctrine()->getManager();

		$user = $this->container->get('security.token_storage')->getToken('user')->getUser()->getId();
		$postCheck = $em->getRepository('AppBundle:Post')->findOneBy(array('userId'=>$user,'id'=>$post->getId()));

		if(!$postCheck instanceof Post){
			return $this->redirectToRoute("my_feed");
		}
		
		$genreArray = array();
		$genres = $em->getRepository('AppBundle:Genre')->findAll();
		foreach($genres as $genre){
			$genreArray[$genre->getId()] = $genre->getName();;
		}
		
		$selectedGenreArray = array();
		$genres = $em->getRepository('AppBundle:PostGenreMapping')->findBy(array('postId'=>$post->getId(), 'status'=>CategoryRepository::STATUS_ACTIVE));
		foreach($genres as $genre){
			$selectedGenreArray[$genre->getId()] = $genre->getGenreId();
		}
// 		print_r($post->getId());print_r($selectedGenreArray);exit;
		$editForm = $this->createForm(postType::class, $post, array('genres' => $genreArray,'selectedGenres' => $selectedGenreArray
		));
		$editForm->handleRequest($request);

		if ($editForm->isSubmitted() && $editForm->isValid()) {
			$post->setCategoryId(1);
			$post->setSubCategoryId($post->getSubCategoryId()->getId());
			$post->setLanguage($post->getLanguage()->getId());
			
			$formData = $request->request->get('post');
			$genres = $formData['genre'];
			$diffArray = array_diff($selectedGenreArray, $genres);
				
			if($selectedGenreArray !== $genres){
				$updateGenre = $em->getRepository('AppBundle:PostGenreMapping')->updateOldGenre($post->getId());
				foreach($genres as $key=>$value){
					$postGenre = new PostGenreMapping();
					$postGenre->setGenreId($genres[$key]);
					$postGenre->setPostId($post->getId());
					$postGenre->setStatus(CategoryRepository::STATUS_ACTIVE);
					$em->persist($postGenre);
					$em->flush();
				}
			}
			$em->flush();

			return $this->redirectToRoute('post_show', array('id' => $post->getId()));
		}

		return $this->render('post/edit.html.twig', array(
				'post' => $post,
				'form' => $editForm->createView(),
				'title' => "Update Post",
				'id' => $post->getId()
		));
	}
}
