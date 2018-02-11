<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\CategoryType;

/**
 * Category controller.
 *
 */
class CategoryController extends Controller
{
    /**
     * Lists all category entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $categories = $em->getRepository('AppBundle:Category')->findAll();

        return $this->render('category/index.html.twig', array(
            'categories' => $categories,
        	'title'=>'Category'
        ));
    }

    /**
     * Creates a new category entity.
     *
     */
    public function newAction(Request $request)
    {
        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
        	$user = $this->container->get('security.token_storage')->getToken('user')->getUser()->getId();
        	$category->setCreatedBy($user);
        	$category->setUpdatedBy($user);
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();

            return $this->redirectToRoute('category_index', array('id' => $category->getId()));
        }

        return $this->render('category/new.html.twig', array(
            'category' => $category,
            'form' => $form->createView(),
        	'title'=>'Category'
        ));
    }

    /**
     * Finds and displays a category entity.
     *
     */
    public function showAction(Category $category)
    {
        return $this->render('category/show.html.twig', array(
            'category' => $category,
        	'title'=>'Category'
        ));
    }

    /**
     * Displays a form to edit an existing category entity.
     *
     */
    public function editAction(Request $request, Category $category)
    {
        $editForm = $this->createForm(CategoryType::class, $category);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
        	$user = $this->container->get('security.token_storage')->getToken('user')->getUser()->getId();
        	$category->setUpdatedBy($user);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('category_index', array('id' => $category->getId()));
        }

        return $this->render('category/edit.html.twig', array(
            'category' => $category,
            'form' => $editForm->createView(),
        	'title'=>'Category',
        	'id' => $category->getId()
        ));
    }
}
