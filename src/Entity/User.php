<?php

namespace App\Entity;



use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $meet;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Gender", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $Gender;
    /**
     * @Assert\NotBlank(message="test")
     * @ORM\Column(type="string", length=255)
     */
    private $city;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="date")
     */
    private $birthday;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isSerious;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isMarried;

    /**
     * @ORM\Column(type="boolean")
     */
    private $hasChildren;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $country;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isSmoker;

    public function getProperties(){
       return get_object_vars($this);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

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

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getIsSerious(): ?bool
    {
        return $this->isSerious;
    }

    public function setIsSerious(bool $isSerious): self
    {
        $this->isSerious = $isSerious;

        return $this;
    }

    public function getIsMarried(): ?bool
    {
        return $this->isMarried;
    }

    public function setIsMarried(bool $isMarried): self
    {
        $this->isMarried = $isMarried;

        return $this;
    }

    public function getHasChildren(): ?bool
    {
        return $this->hasChildren;
    }

    public function setHasChildren(bool $hasChildren): self
    {
        $this->hasChildren = $hasChildren;

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

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getIsSmoker(): ?bool
    {
        return $this->isSmoker;
    }

    public function setIsSmoker(bool $isSmoker): self
    {
        $this->isSmoker = $isSmoker;

        return $this;
    }

    public function getGender(): ?Gender
    {
        return $this->Gender;
    }

    public function setGender(Gender $Gender): self
    {
        $this->Gender = $Gender;

        return $this;
    }

    public function getMeet(): ?string
    {
        return $this->meet;
    }

    public function setMeet(string $meet): self
    {
        $this->meet = $meet;

        return $this;
    }
}
