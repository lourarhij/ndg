<?php

namespace App\Entity;

use App\Repository\AdressesMembersRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdressesMembersRepository::class)]
class AdressesMembers
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 40)]
    private ?string $country = null;

    #[ORM\Column(length: 40)]
    private ?string $city = null;

    #[ORM\Column]
    private ?int $zipCode = null;

    #[ORM\Column(length: 255)]
    private ?string $adressBilling = null;

    #[ORM\Column(length: 255)]
    private ?string $adressDelivery = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getZipCode(): ?int
    {
        return $this->zipCode;
    }

    public function setZipCode(int $zipCode): self
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    public function getAdressBilling(): ?string
    {
        return $this->adressBilling;
    }

    public function setAdressBilling(string $adressBilling): self
    {
        $this->adressBilling = $adressBilling;

        return $this;
    }

    public function getAdressDelivery(): ?string
    {
        return $this->adressDelivery;
    }

    public function setAdressDelivery(string $adressDelivery): self
    {
        $this->adressDelivery = $adressDelivery;

        return $this;
    }
}
