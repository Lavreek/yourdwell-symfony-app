<?php
	namespace App\Controller;

	use Symfony\Component\HttpFoundation\Response;
	use Symfony\Component\Routing\Annotation\Route;
	use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

	class HomepageController extends AbstractController
	{
		const header_title = "YourDwell";
		const page_title = "HH Resume";

		/**
		* @Route("/", name="homepage")
		*/
	    public function preview(): Response
	    {
	        return $this->render('homepage/index.html.twig', [
            	'homepath' => $_SERVER['SERVER_NAME'],
            	'page_title' => HomepageController::page_title,
            	'header_title' => HomepageController::header_title,

        	]);
	    }
	}
?>