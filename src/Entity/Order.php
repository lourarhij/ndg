<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: '`order`')]
class Order
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idOrder = null;

    #[ORM\Column]
    private ?int $idMember = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 12, scale: 2)]
    private ?string $totalAmount = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateRegistration = null;

    #[ORM\Column]
    private ?int $status = null;

    #[ORM\Column(length: 255)]
    private ?string $invoiceLink = null;

    public function getIdOrder(): ?int
    {
        return $this->idOrder;
    }

    public function getIdMember(): ?int
    {
        return $this->idMember;
    }

    public function setIdMember(int $idMember): self
    {
        $this->idMember = $idMember;

        return $this;
    }

    public function getTotalAmount(): ?string
    {
        return $this->totalAmount;
    }

    public function setTotalAmount(string $totalAmount): self
    {
        $this->totalAmount = $totalAmount;

        return $this;
    }

    public function getDateRegistration(): ?\DateTimeInterface
    {
        return $this->dateRegistration;
    }

    public function setDateRegistration(\DateTimeInterface $dateRegistration): self
    {
        $this->dateRegistration = $dateRegistration;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getInvoiceLink(): ?string
    {
        return $this->invoiceLink;
    }

    public function setInvoiceLink(string $invoiceLink): self
    {
        $this->invoiceLink = $invoiceLink;

        return $this;
    }
}
