<?php

namespace App\Controller;


use App\Entity\Products;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{

    #[Route("/", name: "home")]
    function Action(ManagerRegistry $doctrine)
    {
        $items = $doctrine->getRepository(Products::class)->findAll();
        return $this->render('Main/index.html.twig', ['items' => $items]);
    }
}