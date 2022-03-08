<?php
	namespace App\Controller;

	use Symfony\Component\HttpFoundation\Response;
	use Symfony\Component\Routing\Annotation\Route;
	use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
	use App\Entity\SymfonyTabs;
	use Doctrine\Persistence\ManagerRegistry;
	

	class CatalogController extends AbstractController
	{
		const header_title = "YourDwell";
		const title_name = "HH Catalog";

		/**
		* @Route("/Catalog")
		*/
	    public function index(ManagerRegistry $doctrine): Response
	    {
	    	$cards = $this->getDatabaseConnection($doctrine);

	        return $this->render('catalog/index.html.twig', [
	        	'title_name' => CatalogController::title_name,
            	'header_title' => CatalogController::header_title,
	        	'cards' => $cards,
        	]);
	    }

	    private function getDatabaseConnection(ManagerRegistry $doctrine)
	    {
	    	$array = [];

	    	$repository = $doctrine->getRepository(SymfonyTabs::class);
        	$symfony_tabs = $repository->findAll();

        	foreach ($symfony_tabs as $key => $value) {
        		array_push($array, ['href' => $value->getStHref(), 'value' => $value->getStValue()]);
        	}

        	return $array;
	    }
	}
?>