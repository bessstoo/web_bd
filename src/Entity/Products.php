<?php

namespace App\Entity;

use App\Repository\ProductsRepository;
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
        minMessage: 'Количество должно быть больше 0'
    )]
    private ?int $count = null;

    #[ORM\Column(length: 30)]
    private ?string $units = null;

    #[ORM\Column]
    #[Assert\Range(
        min: 1,
        minMessage: 'Цена должна быть больше 0'
    )]
    private ?float $price = null;

    #[ORM\Column]
    private ?bool $IsDeleted = null;

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

    public function getCount(): ?int
    {
        return $this->count;
    }

    public function setCount(int $count): static
    {
        $this->count = $count;

        return $this;
    }

    public function getUnits(): ?string
    {
        return $this->units;
    }

    public function setUnits(string $units): static
    {
        $this->units = $units;

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
}
