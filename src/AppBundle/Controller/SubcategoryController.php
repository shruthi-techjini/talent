<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Subcategory;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\SubcategoryType;

/**
 * Subcategory controller.
 *
 */
class SubcategoryController extends Controller
{
    /**
     * Lists all subcategory entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $subcategories = $em->getRepository('AppBundle:Subcategory')->findAll();

        return $this->render('subcategory/index.html.twig', array(
            'subcategories' => $subcategories,
        	'title'=>'Subcategory'
        ));
    }

    /**
     * Creates a new subcategory entity.
     *
     */
    public function newAction(Request $request)
    {
        $subcategory = new Subcategory();
        $form = $this->createForm(SubcategoryType::class, $subcategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $user = $this->container->get('security.token_storage')->getToken('user')->getUser()->getId();
            $subcategory->setCategoryId($subcategory->getCategoryId()->getId());
            $subcategory->setCreatedBy($user);
            $subcategory->setUpdatedBy($user);
            $em->persist($subcategory);
            $em->flush();

            return $this->redirectToRoute('subcategory_index');
        }

        return $this->render('subcategory/new.html.twig', array(
            'subcategory' => $subcategory,
            'form' => $form->createView(),
        	'title'=>'Subcategory'
        ));
    }

    /**
     * Finds and displays a subcategory entity.
     *
     */
    public function showAction(Subcategory $subcategory)
    {

        return $this->render('subcategory/show.html.twig', array(
            'subcategory' => $subcategory,
        	'title'=>'Subcategory'
        ));
    }

    /**
     * Displays a form to edit an existing subcategory entity.
     *
     */
    public function editAction(Request $request, Subcategory $subcategory)
    {
        $editForm = $this->createForm(SubcategoryType::class, $subcategory);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
        	$user = $this->container->get('security.token_storage')->getToken('user')->getUser()->getId();
        	$subcategory->setUpdatedBy($user);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('subcategory_edit');
        }

        return $this->render('subcategory/edit.html.twig', array(
            'subcategory' => $subcategory,
            'form' => $editForm->createView(),
        	'title'=>'Subcategory',
        	'id'=>$subcategory->getId()
        ));
    }
}
