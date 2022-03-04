<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpClient\HttpClient;

class UseHttpClientController extends AbstractController
{
	private $cards_array_string;

    #[Route('/HTTPClient', name: 'use_http_client')]
    public function index(): Response
    {
    	$cards = $this->getHttpClientTabs();
    	// $cards_array_string = implode("", ($this->getHttpClientResponse())->toArray());

        return $this->render('use_http_client/index.html.twig', [
            'title_name' => 'HttpClient',
            'http_client_cards' => $cards,
            'http_array_string' => $this->cards_array_string,
        ]);
    }

    private function getHttpClientTabs() {
    	$request = ($this->getHttpClientResponse())->toArray();
    	
    	$this->cards_array_string = json_encode($request);

    	$request_cards = [];
    	
    	foreach ($request as $key => $value) {
    		array_push($request_cards, $value['tab_caption']);
    	}

    	return $request_cards;
    }

	private function getHttpClientResponse() {
		$client = HttpClient::create();
		$response = $client->request('GET', 'http://yourdwell.ru/methods/calls.php?', [
			'query' => [
				'getTags' => 'all',
			],
		]);

		return $response;
	}
}