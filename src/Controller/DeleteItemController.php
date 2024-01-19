<?php

namespace App\Controller;

use App\Entity\Products;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeleteItemController extends AbstractController
{
    #[Route('/delete/{item_id}', name: 'app_delete_item')]
    public function index($item_id, ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $item = $doctrine->getRepository(Products::class)->find($item_id);

        $item->setIsDeleted(true);
        $em->flush();

        return $this->redirectToRoute('home');
    }
}
