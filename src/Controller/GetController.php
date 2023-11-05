<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpClient\HttpClient;

class GetController extends AbstractController
{
    #[Route('/get', name: 'app_get')]
    public function getIntensity(): Response
    {
        $httpClient = HttpClient::create();
        $response = $httpClient->request('GET', 'https://api.carbonintensity.org.uk/intensity');
    
        $statusCode = $response->getStatusCode();
        $data = $response->toArray();
    
        if ($statusCode === 200) {
            return $this->render('get/intensity.html.twig', [
                'data' => $data,
            ]);
        } else {
            return new Response('Error while consuming the API', $statusCode);
        }
    }
}
