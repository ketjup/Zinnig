<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\WorkshopRepository")
 */
class workshop
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
    private $naam;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $min_personen;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $max_personen;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datum;

    /**
     * @ORM\Column(type="time")
     */
    private $tijd;

    /**
     * @ORM\ManyToMany(targetEntity="location", inversedBy="workshops")
     */
    private $locatie_id;

    /**
     * @ORM\ManyToOne(targetEntity="user", inversedBy="workshops")
     */
    private $user_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $prijs;

    public function __construct()
    {
        $this->locatie_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNaam(): ?string
    {
        return $this->naam;
    }

    public function setNaam(string $naam): self
    {
        $this->naam = $naam;

        return $this;
    }

    public function getMinPersonen(): ?int
    {
        return $this->min_personen;
    }

    public function setMinPersonen(?int $min_personen): self
    {
        $this->min_personen = $min_personen;

        return $this;
    }

    public function getMaxPersonen(): ?int
    {
        return $this->max_personen;
    }

    public function setMaxPersonen(?int $max_personen): self
    {
        $this->max_personen = $max_personen;

        return $this;
    }

    public function getDatum(): ?\DateTimeInterface
    {
        return $this->datum;
    }

    public function setDatum(\DateTimeInterface $datum): self
    {
        $this->datum = $datum;

        return $this;
    }

    public function getTijd(): ?\DateTimeInterface
    {
        return $this->tijd;
    }

    public function setTijd(\DateTimeInterface $tijd): self
    {
        $this->tijd = $tijd;

        return $this;
    }

    /**
     * @return Collection|location[]
     */
    public function getLocatieId(): Collection
    {
        return $this->locatie_id;
    }

    public function addLocatieId(location $locatieId): self
    {
        if (!$this->locatie_id->contains($locatieId)) {
            $this->locatie_id[] = $locatieId;
        }

        return $this;
    }

    public function removeLocatieId(location $locatieId): self
    {
        if ($this->locatie_id->contains($locatieId)) {
            $this->locatie_id->removeElement($locatieId);
        }

        return $this;
    }

    public function getUserId(): ?user
    {
        return $this->user_id;
    }

    public function setUserId(?user $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getPrijs(): ?int
    {
        return $this->prijs;
    }

    public function setPrijs(int $prijs): self
    {
        $this->prijs = $prijs;

        return $this;
    }
}
