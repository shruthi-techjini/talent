<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\PostType;
use Symfony\Component\HttpFoundation\File\UploadedFile;

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

		$posts = $em->getRepository('AppBundle:Post')->findAll();

		return $this->render('post/index.html.twig', array(
				'posts' => $posts,
				'title' => "Post"
		));
	}

	/**
	 * Creates a new post entity.
	 *
	 */
	public function newAction(Request $request)
	{
		$post = new Post();
		$form = $this->createForm(PostType::class, $post);
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			
			$post->setCategoryId(1);
			$post->setSubCategoryId(1);
		$post->setUserId(2);
		$post->setStatus(1);
		$post->setCreatedDateTime(new \DateTime());
		$post->setUpdatedDateTime(new \DateTime());
			$em->persist($post);
			$em->flush();
			
			$file = $post->getImage();
			print_r($file);
			echo $file['file']->guessExtension();

			echo $post->getId();exit;
			return $this->redirectToRoute('post_show', array('id' => $post->getId()));
		}

		return $this->render('post/new.html.twig', array(
				'post' => $post,
				'form' => $form->createView(),
				'title' => "Create Post"
		));
	}

	/**
	 * Finds and displays a post entity.
	 *
	 */
	public function showAction(Post $post)
	{
		$deleteForm = $this->createDeleteForm($post);

		return $this->render('post/show.html.twig', array(
				'post' => $post,
				'delete_form' => $deleteForm->createView(),
				'title' => "Post"
		));
	}

	/**
	 * Displays a form to edit an existing post entity.
	 *
	 */
	public function editAction(Request $request, Post $post)
	{
		$deleteForm = $this->createDeleteForm($post);
		$editForm = $this->createForm(postType::class, $post);
		$editForm->handleRequest($request);

		if ($editForm->isSubmitted() && $editForm->isValid()) {
			$this->getDoctrine()->getManager()->flush();

			return $this->redirectToRoute('post_edit', array('id' => $post->getId()));
		}

		return $this->render('post/edit.html.twig', array(
				'post' => $post,
				'edit_form' => $editForm->createView(),
				'delete_form' => $deleteForm->createView(),
				'title' => "Update Post"
		));
	}

	/**
	 * Deletes a post entity.
	 *
	 */
	public function deleteAction(Request $request, Post $post)
	{
		$form = $this->createDeleteForm($post);
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->remove($post);
			$em->flush();
		}

		return $this->redirectToRoute('post_index');
	}

	/**
	 * Creates a form to delete a post entity.
	 *
	 * @param post $post The post entity
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createDeleteForm(Post $post)
	{
		return $this->createFormBuilder()
		->setAction($this->generateUrl('post_delete', array('id' => $post->getId())))
		->setMethod('DELETE')
		->getForm()
		;
	}
}
