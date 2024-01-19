<?php

namespace App\Controller;

use App\Entity\Products;
use App\Form\AddItemType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EditItemController extends AbstractController
{
    #[Route('/edit/{item_id}', name: 'app_edit_item')]
    public function index($item_id, ManagerRegistry $doctrine, Request $request): Response
    {
        $em = $doctrine->getManager();
        $item = $doctrine->getRepository(Products::class)->find($item_id);
        $form = $this->createForm(AddItemType::class, $item);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $product = $form->getData();
            $product->setIsDeleted(false);

            $em->persist($product);
            $em->flush();
            return $this->redirectToRoute('home');

        }

        return $this->render('add_item/index.html.twig', [
            'controller_name' => 'AddItemController',
            "form" => $form
        ]);
    }
}
