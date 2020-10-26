<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\AddBookFormType;
use App\Entity\Book;
use Symfony\Component\HttpFoundation\Request;

class addBookController extends AbstractController
{

    /**
     * @Route("/addbook", name="addbook")
     */
    public function addBook(Request $request) : Response
    {
        $book = new Book();
     
        $form = $this->createForm(AddBookFormType::class, $book);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
            $book = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($book);
            $entityManager->flush();


            return $this->redirectToRoute('success');
        }
        else return $this->render('addbook.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
?>