<?php

namespace App\Entity;

use App\Repository\ItemsInInvoiceRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ItemsInInvoiceRepository::class)]
class ItemsInInvoice
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'itemsInInvoices')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Products $Product_Id = null;

    #[ORM\ManyToOne(inversedBy: 'itemsInInvoices')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Invoice $Invoice_id = null;

    #[ORM\Column]
    #[Assert\Range(
        min: 1,
        minMessage: 'Количество должно быть больше 0'
    )]
    private ?int $count = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductId(): ?Products
    {
        return $this->Product_Id;
    }

    public function setProductId(?Products $Product_Id): static
    {
        $this->Product_Id = $Product_Id;

        return $this;
    }

    public function getInvoiceId(): ?Invoice
    {
        return $this->Invoice_id;
    }

    public function setInvoiceId(?Invoice $Invoice_id): static
    {
        $this->Invoice_id = $Invoice_id;

        return $this;
    }

    public function getCount(): ?int
    {
        return $this->count;
    }

    public function setCount(int $count): static
    {
        $this->count = $count;

        return $this;
    }
}
