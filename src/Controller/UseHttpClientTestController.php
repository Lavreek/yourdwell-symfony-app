<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UseHttpClientTestController extends AbstractController
{
    #[Route('/use/http/client/test', name: 'use_http_client_test')]
    public function index(): Response
    {
        return $this->render('use_http_client_test/index.html.twig', [
            'controller_name' => 'UseHttpClientTestController',
        ]);
    }
}
