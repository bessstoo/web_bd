<?php

namespace App\Controller;


use App\Entity\Invoice;
use App\Entity\ItemsInInvoice;
use App\Entity\Products;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{

    #[Route("/", name: "Products")]
    function ProductsPage(ManagerRegistry $doctrine)
    {
        $items = $doctrine->getRepository(Products::class)->findAll();
        return $this->render('Main/Products.html.twig', ['items' => $items]);
    }

    #[Route("/invoice", name: "Invoice")]
    function InvoicePage(ManagerRegistry $doctrine)
    {
        $items = $doctrine->getRepository(Invoice::class)->findAll();
        return $this->render('Main/Invoice.html.twig', ['items' => $items]);
    }

    #[Route("/items_in_invoice", name: "Items_in_invoice")]
    function ItemsInInvoicePage(ManagerRegistry $doctrine)
    {
        $items = $doctrine->getRepository(ItemsInInvoice::class)->findAll();

        return $this->render('Main/ProductsInInvoice.html.twig', ['items' => $items]);
    }
}