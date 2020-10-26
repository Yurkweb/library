<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\AddBookFormType;
use App\Entity\Book;
use Symfony\Component\HttpFoundation\Request;

class deleteBookController extends AbstractController
{

    /**
     * @Route("/deletebook/{id}", name="deletebook")
     */
    public function editBook(Request $request,int $id) : Response
    {
        $book = $this->getDoctrine()
        ->getRepository(Book::class)
        ->find($id);
                               
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($book);
        $entityManager->flush();

        return $this->redirectToRoute('success');
    }
}
?>