<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\SymfonyDescription;
use Doctrine\Persistence\ManagerRegistry;

class SymfonyDescriptionController extends AbstractController
{
	/**
	* @Route("/symfonydesc", name="symfonydesc_get")
	*/
    public function getSymfonyDesc(ManagerRegistry $doctrine): Response
    {
    	if ($_SERVER['REMOTE_ADDR'] == "127.0.0.1");
    		if (isset($_GET['CREATE']))
    		{
    			if (isset($_GET['header']) && isset($_GET['description']))
    			{
    				$symfony = $this->createSymfonyDesc($doctrine, $_GET['header'], $_GET['description']);
        			return new Response('Saved new product with id '.$symfony->getId());
    			}
    		}

        $repository = $doctrine->getRepository(SymfonyDescription::class);
        $symfony_desc = $repository->findAll();

        var_dump($symfony_desc[0]->getHeader());

    	return new Response('Check out this great product: ');
    }

    private function createSymfonyDesc(ManagerRegistry $doctrine, string $header, string $description)
    {
        $entityManager = $doctrine->getManager();

        $symfony_desc = new SymfonyDescription();
        $symfony_desc->setHeader($header);
        $symfony_desc->setDescription($description);

        $entityManager->persist($symfony_desc);

        $entityManager->flush();

        return $symfony_desc;
    }
}