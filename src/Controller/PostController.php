<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Request;

class PostController extends AbstractController
{
    #[Route('/post', name: 'app_post', methods: ['POST'])]
    public function filterRegional(Request $request): Response
    {
        $region = $request->request->get('region');
        $generation_type = $request->request->get('generation_type');
    
        $httpClient = HttpClient::create();
        $api_url = "https://api.carbonintensity.org.uk/regional/$region";
        $response = $httpClient->request('GET', $api_url);
        $statusCode = $response->getStatusCode();
        $data = $response->toArray();
    
        if ($statusCode === 200) {
            $intensity_data = $data['data'];

            return $this->render('post/show.html.twig', [
                'region' => $region,
                'generation_type' => $generation_type,
                'intensity_data' => $intensity_data,
            ]);
        } else {
            return new Response('Error while consuming the API', $statusCode);
        }
    }
}
