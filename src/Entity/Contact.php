<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ContactRepository::class)
 */
class Contact
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank
     */
    private $LastName;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank
     */
    private $FirstName;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $Function;

    /**
     * @ORM\Column(type="string", length=150)
     * @Assert\NotBlank
     */
    private $Society;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $Agreement;

    /**
     * @ORM\Column(type="datetime", options={"default": "CURRENT_TIMESTAMP"})
     */
    private $AgreementDate;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     */
    private $Comment;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank
     */
    private $Email;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     */
    private $Phone;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastName(): ?string
    {
        return $this->LastName;
    }

    public function setLastName(string $LastName): self
    {
        $this->LastName = $LastName;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->FirstName;
    }

    public function setFirstName(string $FirstName): self
    {
        $this->FirstName = $FirstName;

        return $this;
    }

    public function getFunction(): ?string
    {
        return $this->Function;
    }

    public function setFunction(?string $Function): self
    {
        $this->Function = $Function;

        return $this;
    }

    public function getSociety(): ?string
    {
        return $this->Society;
    }

    public function setSociety(string $Society): self
    {
        $this->Society = $Society;

        return $this;
    }

    public function getAgreement(): ?string
    {
        return $this->Agreement;
    }

    public function setAgreement(string $Agreement): self
    {
        $this->Agreement = $Agreement;

        return $this;
    }

    public function getAgreementDate(): ?\DateTimeInterface
    {
        return $this->AgreementDate;
    }

    public function setAgreementDate(\DateTimeInterface $AgreementDate): self
    {
        $this->AgreementDate = $AgreementDate;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->Comment;
    }

    public function setComment(string $Comment): self
    {
        $this->Comment = $Comment;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->Phone;
    }

    public function setPhone(int $Phone): self
    {
        $this->Phone = $Phone;

        return $this;
    }
}
