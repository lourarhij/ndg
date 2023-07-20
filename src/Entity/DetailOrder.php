<?php

namespace App\Entity;

use App\Repository\DetailOrderRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DetailOrderRepository::class)]
class DetailOrder
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idDetailOrder = null;

    #[ORM\Column]
    private ?int $idOrder = null;

    #[ORM\Column]
    private ?int $idProduct = null;

    #[ORM\Column]
    private ?int $quantity = null;

    public function getIdDetailOrder(): ?int
    {
        return $this->idDetailOrder;
    }

    public function getIdOrder(): ?int
    {
        return $this->idOrder;
    }

    public function setIdOrder(int $idOrder): self
    {
        $this->idOrder = $idOrder;

        return $this;
    }

    public function getIdProduct(): ?int
    {
        return $this->idProduct;
    }

    public function setIdProduct(int $idProduct): self
    {
        $this->idProduct = $idProduct;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }
}
