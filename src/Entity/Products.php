<?php

namespace App\Entity;

use App\Repository\ProductsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ProductsRepository::class)]
class Products
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    #[Assert\Range(
        min: 1,
        minMessage: 'Цена должна быть больше 0'
    )]
    private ?float $price = null;

    #[ORM\Column]
    private ?bool $IsDeleted = null;

    #[ORM\OneToMany(mappedBy: 'Product_Id', targetEntity: ItemsInInvoice::class, orphanRemoval: true)]
    private Collection $itemsInInvoices;

    public function __construct()
    {
        $this->itemsInInvoices = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function isIsDeleted(): ?bool
    {
        return $this->IsDeleted;
    }

    public function setIsDeleted(bool $IsDeleted): static
    {
        $this->IsDeleted = $IsDeleted;

        return $this;
    }

    /**
     * @return Collection<int, ItemsInInvoice>
     */
    public function getItemsInInvoices(): Collection
    {
        return $this->itemsInInvoices;
    }

    public function addItemsInInvoice(ItemsInInvoice $itemsInInvoice): static
    {
        if (!$this->itemsInInvoices->contains($itemsInInvoice)) {
            $this->itemsInInvoices->add($itemsInInvoice);
            $itemsInInvoice->setProductId($this);
        }

        return $this;
    }

    public function removeItemsInInvoice(ItemsInInvoice $itemsInInvoice): static
    {
        if ($this->itemsInInvoices->removeElement($itemsInInvoice)) {
            // set the owning side to null (unless already changed)
            if ($itemsInInvoice->getProductId() === $this) {
                $itemsInInvoice->setProductId(null);
            }
        }

        return $this;
    }
}
