<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\CategorieRepository;
use App\Repository\PlatRepository;



class AccueilController extends AbstractController
{
    #[Route('/accueil', name: 'app_accueil')]
    public function index(CategorieRepository $CategorieRepository, PlatRepository $PlatRepository)
    {
        $categories = $CategorieRepository->findBy(['active' => true]);
        $plats = $PlatRepository->findBy(['active' => true]);


        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
            'categories' => $categories,
            'plats' => $plats,


        ]);
    }
}
