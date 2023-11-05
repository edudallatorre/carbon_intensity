<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        $regionOptions = ['england', 'scotland', 'wales'];
        $generationOptions = ['all', 'gas', 'coal', 'biomass', 'nuclear', 'hydro', 'imports', 'other', 'wind', 'solar'];

        return $this->render('home/index.html.twig', [
            'regionOptions' => $regionOptions,
            'generationOptions' => $generationOptions,
        ]);
    }
}