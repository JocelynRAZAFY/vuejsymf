<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommandRepository")
 */
class Command
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCommand;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $total;

    /**
     * @ORM\ManyToOne(targetEntity="ProviderCustomer", inversedBy="command")
     */
    private $providerCustomer;

    /**
     * @ORM\OneToMany(targetEntity="DetailCommand", mappedBy="command")
     */
    private $detailCommand;

    public function __construct()
    {
        $this->detailCommand = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCommand(): ?\DateTimeInterface
    {
        return $this->dateCommand;
    }

    public function setDateCommand(\DateTimeInterface $dateCommand): self
    {
        $this->dateCommand = $dateCommand;

        return $this;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function setTotal($total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getProviderCustomer(): ?ProviderCustomer
    {
        return $this->providerCustomer;
    }

    public function setProviderCustomer(?ProviderCustomer $providerCustomer): self
    {
        $this->providerCustomer = $providerCustomer;

        return $this;
    }

    /**
     * @return Collection|DetailCommand[]
     */
    public function getDetailCommand(): Collection
    {
        return $this->detailCommand;
    }

    public function addDetailCommand(DetailCommand $detailCommand): self
    {
        if (!$this->detailCommand->contains($detailCommand)) {
            $this->detailCommand[] = $detailCommand;
            $detailCommand->setCommand($this);
        }

        return $this;
    }

    public function removeDetailCommand(DetailCommand $detailCommand): self
    {
        if ($this->detailCommand->contains($detailCommand)) {
            $this->detailCommand->removeElement($detailCommand);
            // set the owning side to null (unless already changed)
            if ($detailCommand->getCommand() === $this) {
                $detailCommand->setCommand(null);
            }
        }

        return $this;
    }
}
