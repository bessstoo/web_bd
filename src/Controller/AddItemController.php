<?php

namespace App\Controller;

use App\Entity\Products;
use App\Form\AddItemType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddItemController extends AbstractController
{
    #[Route('/item/add', name: 'app_add_item')]
    public function index(Request $request, ManagerRegistry $doctrine): Response
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
            return $this->redirectToRoute('home');

            }

            return $this->render('add_item/index.html.twig', [
            'controller_name' => 'AddItemController',
            "form" => $form
        ]);
    }
}
