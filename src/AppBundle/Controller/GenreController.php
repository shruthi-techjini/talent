<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Genre;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\GenreType;

/**
 * Genre controller.
 *
 */
class GenreController extends Controller
{
    /**
     * Lists all genre entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $genres = $em->getRepository('AppBundle:Genre')->findAll();

        return $this->render('genre/index.html.twig', array(
            'genres' => $genres,
        	'title'=>'Genre'
        ));
    }

    /**
     * Creates a new genre entity.
     *
     */
    public function newAction(Request $request)
    {
        $genre = new Genre();
        $form = $this->createForm(GenreType::class, $genre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
        	$em = $this->getDoctrine()->getManager();
        	$user = $this->container->get('security.token_storage')->getToken('user')->getUser()->getId();
            $genre->setCreatedBy($user);
            $genre->setUpdatedBy($user);
            $em->persist($genre);
            $em->flush();

            return $this->redirectToRoute('genre_index');
        }

        return $this->render('genre/new.html.twig', array(
            'genre' => $genre,
            'form' => $form->createView(),
        	'title'=>'Genre'
        ));
    }

    /**
     * Finds and displays a genre entity.
     *
     */
    public function showAction(Genre $genre)
    {
        return $this->render('genre/show.html.twig', array(
            'genre' => $genre,
        	'title'=>'Genre'
        ));
    }

    /**
     * Displays a form to edit an existing genre entity.
     *
     */
    public function editAction(Request $request, Genre $genre)
    {
        $editForm = $this->createForm(GenreType::class, $genre);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
        	$user = $this->container->get('security.token_storage')->getToken('user')->getUser()->getId();
        	$genre->setUpdatedBy($user);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('genre_index');
        }

        return $this->render('genre/edit.html.twig', array(
            'genre' => $genre,
            'form' => $editForm->createView(),
        	'title'=>'Genre',
        	'id'=>$genre->getId()
        ));
    }
}
