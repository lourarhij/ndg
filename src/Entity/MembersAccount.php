<?php

namespace App\Entity;

use App\Repository\MembersAccountRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Enum;
use phpDocumentor\Reflection\Types\Boolean;

#[ORM\Entity(repositoryClass: MembersAccountRepository::class)]
class MembersAccount
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idMember = null;

    #[ORM\Column(length: 15)]
    private ?string $userName = null;

    #[ORM\Column(length: 20)]
    private ?string $password = null;

    #[ORM\Column(length: 20)]
    private ?string $firstName = null;

    #[ORM\Column(length: 50)]
    private ?string $lastName = null;

    #[ORM\Column(length: 255)]
    private ?string $civility = null;

    #[ORM\Column(length: 10)]
    private ?string $phoneNumber = null;

    #[ORM\Column(length: 40)]
    private ?string $email = null;

    #[ORM\Column]
    private ?bool $newsletter = null;

    #[ORM\Column]
    private ?int $address = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateCreation = null;

    #[ORM\Column]
    private ?int $status = null;

    public function getIdMember(): ?int
    {
        return $this->idMember;
    }

    public function getUserName(): ?string
    {
        return $this->userName;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }
    
    public function getCivility(): ?string
    {
        return $this->civility;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getNewsletter(): ?bool
    {
        return $this->newsletter;
    }

    public function setNewsletter(bool $newsletter): self
    {
        $this->newsletter = $newsletter;

        return $this;
    }

    public function getAddress(): ?int
    {
        return $this->address;
    }

    public function setAddress(int $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
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
}
