<?php
	namespace App\Controller;

	use Symfony\Component\HttpFoundation\Response;
	use Symfony\Component\Routing\Annotation\Route;
	use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
	use App\Entity\SymfonyTabs;
	use Doctrine\Persistence\ManagerRegistry;
	use Symfony\Component\HttpClient\HttpClient;

	class CategoryController extends AbstractController
	{
		const header_title = "YourDwell";
		const page_title = "HH Category";
		private $connection_type = "";

		/**
		* @Route("/Category/")
		*/
	    public function category_preview(ManagerRegistry $doctrine): Response
	    {	
	    	$this->getHTTPClientConnection();
	    	$cards = $this->getDatabaseConnection($doctrine);

	        return $this->render('category/index.html.twig', [
	        	'cards' => $cards,
            	'page_title' => CategoryController::page_title,
            	'header_title' => CategoryController::header_title,
            	'type' => null,
        	]);
	    }

	    private function getDatabaseConnection(ManagerRegistry $doctrine)
	    {
	    	$array = [];

	    	$repository = $doctrine->getRepository(SymfonyTabs::class);
        	$symfony_tabs = $repository->findAll();

        	foreach ($symfony_tabs as $key => $value) {
        		array_push($array, $value->getStCaption());
        	}

        	return $array;
	    }

	    private function getHTTPClientConnection()
	    {
	    	$client = HttpClient::create();
	    	$response = $client->request('GET', 'http://yourdwell.ru/methods/calls.php?', [
			    'query' => [
			        'getTags' => 'all',
			    ],
			]);
	    }
	}
?>