<?php

namespace App\Controller;

use App\Entity\Invoice;
use App\Entity\ItemsInInvoice;
use App\Entity\Products;
use App\Form\AddInvoiceType;
use App\Form\AddItemInInvoiceType;
use App\Form\AddItemType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddItemController extends AbstractController
{
    #[Route('/item/add', name: 'app_add_item')]
    public function AddProduct(Request $request, ManagerRegistry $doctrine): Response
    {
        $product = new Products();
        $form = $this->createForm(AddItemType::class, $product);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $product = $form->getData();
            $product->setIsDeleted(false);

            $em = $doctrine->getManager();
            $em->persist($product);
            $em->flush();
            return $this->redirectToRoute('Products');

            }

            return $this->render('add_item/index.html.twig', [
            'controller_name' => 'AddItemController',
            "form" => $form
        ]);
    }

    #[Route('/invoice/add', name: 'app_add_invoice')]
    public function AddInvoice(Request $request, ManagerRegistry $doctrine): Response
    {
        $invoice = new Invoice();
        $form = $this->createForm(AddInvoiceType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $invoice = $form->getData();
            $em = $doctrine->getManager();
            $em->persist($invoice);
            $em->flush();
            return $this->redirectToRoute('Invoice');

        }

        return $this->render('add_item/index.html.twig', [
            'controller_name' => 'AddItemController',
            "form" => $form
        ]);
    }
    #[Route('/items_in_invoice/add', name: 'app_add_ItemsInInvoice')]
    public function AddProductInInvoice(Request $request, ManagerRegistry $doctrine): Response
    {
        $item = new ItemsInInvoice();
        $form = $this->createForm(AddItemInInvoiceType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $item = $form->getData();

            $em = $doctrine->getManager();
            $em->persist($item);
            $em->flush();
            return $this->redirectToRoute('Items_in_invoice');

        }

        return $this->render('add_item/index.html.twig', [
            'controller_name' => 'AddItemController',
            "form" => $form
        ]);
    }
}
