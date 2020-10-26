<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\AddBookFormType;
use App\Entity\Book;
use Symfony\Component\HttpFoundation\Request;

class editBookController extends AbstractController
{

    /**
     * @Route("/editbook/{id}", name="editbook")
     */
    public function editBook(Request $request,int $id) : Response
    {
        $book = $this->getDoctrine()
        ->getRepository(Book::class)
        ->find($id);

        $form = $this->createForm(AddBookFormType::class, $book);

        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $bookEdited = $form->getData();
            
            $book->setName($bookEdited->getName());
            $book->setYear($bookEdited->getYear());
            $book->setAuthor($bookEdited->getAuthor());
                        
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            return $this->redirectToRoute('success');
        }
        else return $this->render('addbook.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
?>