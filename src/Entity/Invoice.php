<?php

namespace App\Entity;

use App\Repository\InvoiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InvoiceRepository::class)]
class Invoice
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $number = null;

    #[ORM\Column(length: 20)]
    private ?string $type = null;

    #[ORM\OneToMany(mappedBy: 'Invoice_id', targetEntity: ItemsInInvoice::class, orphanRemoval: true)]
    private Collection $itemsInInvoices;

    public function __construct()
    {
        $this->itemsInInvoices = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(string $number): static
    {
        $this->number = $number;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

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
            $itemsInInvoice->setInvoiceId($this);
        }

        return $this;
    }

    public function removeItemsInInvoice(ItemsInInvoice $itemsInInvoice): static
    {
        if ($this->itemsInInvoices->removeElement($itemsInInvoice)) {
            // set the owning side to null (unless already changed)
            if ($itemsInInvoice->getInvoiceId() === $this) {
                $itemsInInvoice->setInvoiceId(null);
            }
        }

        return $this;
    }
}
