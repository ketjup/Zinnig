<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LocationRepository")
 */
class location
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
    private $adres;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $plaats;

    /**
     * @ORM\Column(type="boolean")
     */
    private $beschikbaarheid;

    /**
     * @ORM\ManyToMany(targetEntity="workshop", mappedBy="locatie_id")
     */
    private $workshops;

    public function __construct()
    {
        $this->workshops = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdres(): ?string
    {
        return $this->adres;
    }

    public function setAdres(string $adres): self
    {
        $this->adres = $adres;

        return $this;
    }

    public function getPlaats(): ?string
    {
        return $this->plaats;
    }

    public function setPlaats(?string $plaats): self
    {
        $this->plaats = $plaats;

        return $this;
    }

    public function getBeschikbaarheid(): ?bool
    {
        return $this->beschikbaarheid;
    }

    public function setBeschikbaarheid(bool $beschikbaarheid): self
    {
        $this->beschikbaarheid = $beschikbaarheid;

        return $this;
    }

    /**
     * @return Collection|workshop[]
     */
    public function getWorkshops(): Collection
    {
        return $this->workshops;
    }

    public function addWorkshop(workshop $workshop): self
    {
        if (!$this->workshops->contains($workshop)) {
            $this->workshops[] = $workshop;
            $workshop->addLocatieId($this);
        }

        return $this;
    }

    public function removeWorkshop(workshop $workshop): self
    {
        if ($this->workshops->contains($workshop)) {
            $this->workshops->removeElement($workshop);
            $workshop->removeLocatieId($this);
        }

        return $this;
    }
}
