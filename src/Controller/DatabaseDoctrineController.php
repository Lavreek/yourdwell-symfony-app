<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DatabaseDoctrineController extends AbstractController
{
	const header_title = "YourDwell";

    #[Route('/Database&Doctrine', name: 'database_doctrine')]
    public function index(): Response
    {
        return $this->render('database&doctrine/index.html.twig', [
            'title_name' => 'Database & Doctrine',
            'header_title' => DatabaseDoctrineController::header_title,

        ]);
    }
}
