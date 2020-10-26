<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class successController extends AbstractController
{
    /**
     * @Route("/success", name="success")
     */
    public function success() : Response
    {
         return $this->render('success.html.twig', [
             'message' => "Книга успешно добавлена/обновлена/удалена"
            ]);
    }  
}

?>