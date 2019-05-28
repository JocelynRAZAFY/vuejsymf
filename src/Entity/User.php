<?php
// src/Entity/User.php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends BaseUser
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $registration_date;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $validation_date;

    /**
     * @ORM\OneToMany(targetEntity="Custom", mappedBy="user")
     */
    private $custom;

    public function __construct()
    {
        parent::__construct();
        $this->custom = new ArrayCollection();
        // your own logic
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRegistrationDate(): ?\DateTimeInterface
    {
        return $this->registration_date;
    }

    public function setRegistrationDate(?\DateTimeInterface $registration_date): self
    {
        $this->registration_date = $registration_date;

        return $this;
    }

    public function getValidationDate(): ?\DateTimeInterface
    {
        return $this->validation_date;
    }

    public function setValidationDate(?\DateTimeInterface $validation_date): self
    {
        $this->validation_date = $validation_date;

        return $this;
    }

    /**
     * @return Collection|Custom[]
     */
    public function getCustom(): Collection
    {
        return $this->custom;
    }

    public function addCustom(Custom $custom): self
    {
        if (!$this->custom->contains($custom)) {
            $this->custom[] = $custom;
            $custom->setUser($this);
        }

        return $this;
    }

    public function removeCustom(Custom $custom): self
    {
        if ($this->custom->contains($custom)) {
            $this->custom->removeElement($custom);
            // set the owning side to null (unless already changed)
            if ($custom->getUser() === $this) {
                $custom->setUser(null);
            }
        }

        return $this;
    }
}
