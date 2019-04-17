<?php
// src/Entity/user.php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class user extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="workshop", mappedBy="user_id")
     */
    private $workshops;

    public function __construct()
    {
        parent::__construct();
        $this->workshops = new ArrayCollection();
        // your own logic
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
            $workshop->setUserId($this);
        }

        return $this;
    }

    public function removeWorkshop(workshop $workshop): self
    {
        if ($this->workshops->contains($workshop)) {
            $this->workshops->removeElement($workshop);
            // set the owning side to null (unless already changed)
            if ($workshop->getUserId() === $this) {
                $workshop->setUserId(null);
            }
        }

        return $this;
    }
}