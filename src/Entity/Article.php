<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 */
class Article
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $label;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $qteIni;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $qte;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=250, nullable=true)
     */
    private $photo;

    /**
     * @ORM\ManyToOne(targetEntity="Famille", inversedBy="article")
     */
    private $famille;

    /**
     * @ORM\OneToMany(targetEntity="DetailCommand", mappedBy="article")
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

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getQteIni(): ?int
    {
        return $this->qteIni;
    }

    public function setQteIni(?int $qteIni): self
    {
        $this->qteIni = $qteIni;

        return $this;
    }

    public function getQte(): ?int
    {
        return $this->qte;
    }

    public function setQte(?int $qte): self
    {
        $this->qte = $qte;

        return $this;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getFamille(): ?Famille
    {
        return $this->famille;
    }

    public function setFamille(?Famille $famille): self
    {
        $this->famille = $famille;

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
            $detailCommand->setArticle($this);
        }

        return $this;
    }

    public function removeDetailCommand(DetailCommand $detailCommand): self
    {
        if ($this->detailCommand->contains($detailCommand)) {
            $this->detailCommand->removeElement($detailCommand);
            // set the owning side to null (unless already changed)
            if ($detailCommand->getArticle() === $this) {
                $detailCommand->setArticle(null);
            }
        }

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }
}
