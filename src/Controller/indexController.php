<?php

namespace App\Controller;

use App\Entity\Book;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class indexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function bookList(): Response
    {
        $books = $this->getDoctrine()
            ->getRepository(Book::class)
            ->findAll();
    
        if (!$books) {
           
            return $this->render('index.html.twig', [
                'title' => "Ни одной книги еще не было добавлено в базу"
                ]);
        }
         else return $this->render('booklist.html.twig', array('result' => $books));
    }
}

?>