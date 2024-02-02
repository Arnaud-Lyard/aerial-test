<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     */
    private $priceExcludingTax;

    /**
     * @ORM\Column(type="float")
     */
    private $valueAddedTax;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPriceExcludingTax(): ?float
    {
        return $this->priceExcludingTax;
    }

    public function setPriceExcludingTax(float $priceExcludingTax): self
    {
        $this->priceExcludingTax = $priceExcludingTax;

        return $this;
    }

    public function getValueAddedTax(): ?float
    {
        return $this->valueAddedTax;
    }

    public function setValueAddedTax(float $valueAddedTax): self
    {
        $this->valueAddedTax = $valueAddedTax;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }
}
