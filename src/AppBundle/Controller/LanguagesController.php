<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Languages;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\LanguagesType;

/**
 * Language controller.
 *
 */
class LanguagesController extends Controller
{
    /**
     * Lists all language entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $languages = $em->getRepository('AppBundle:Languages')->findAll();

        return $this->render('languages/index.html.twig', array(
            'languages' => $languages,
        	'title'=>'Languages'
        ));
    }

    /**
     * Creates a new language entity.
     *
     */
    public function newAction(Request $request)
    {
        $language = new Languages();
        $form = $this->createForm(LanguagesType::class, $language);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $user = $this->container->get('security.token_storage')->getToken('user')->getUser()->getId();
            $language->setCreatedBy($user);
            $language->setUpdatedBy($user);
            $em->persist($language);
            $em->flush();

            return $this->redirectToRoute('languages_show', array('id' => $language->getId()));
        }

        return $this->render('languages/new.html.twig', array(
            'language' => $language,
            'form' => $form->createView(),
        	'title'=>'Languages'
        ));
    }

    /**
     * Finds and displays a language entity.
     *
     */
    public function showAction(Languages $language)
    {
        return $this->render('languages/show.html.twig', array(
            'language' => $language,
        	'title'=>'Languages'
        ));
    }

    /**
     * Displays a form to edit an existing language entity.
     *
     */
    public function editAction(Request $request, Languages $language)
    {
        $editForm = $this->createForm(LanguagesType::class, $language);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
        	$user = $this->container->get('security.token_storage')->getToken('user')->getUser()->getId();
        	$language->setUpdatedBy($user);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('languages_show', array('id' => $language->getId()));
        }

        return $this->render('languages/edit.html.twig', array(
            'language' => $language,
            'edit_form' => $editForm->createView(),
        	'title'=>'Languages'
        ));
    }
}
