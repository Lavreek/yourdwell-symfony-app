<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DatabaseDoctrineController extends AbstractController
{
    #[Route('/Database&Doctrine', name: 'database_doctrine')]
    public function index(): Response
    {
        return $this->render('database&doctrine/index.html.twig', [
            'controller_name' => 'DatabaseDoctrineController',
        ]);
    }
}
