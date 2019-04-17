<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BonRepository")
 */
class bon
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="workshop", cascade={"persist", "remove"})
     */
    private $workshop_id;

    /**
     * @ORM\OneToOne(targetEntity="user", cascade={"persist", "remove"})
     */
    private $user_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWorkshopId(): ?workshop
    {
        return $this->workshop_id;
    }

    public function setWorkshopId(?workshop $workshop_id): self
    {
        $this->workshop_id = $workshop_id;

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
}
