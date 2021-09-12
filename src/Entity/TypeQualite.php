<?php

namespace App\Entity;

use App\Repository\TypeQualiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeQualiteRepository::class)
 */
class TypeQualite
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=13)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $color;

    /**
     * @ORM\OneToMany(targetEntity=QualitesDISC::class, mappedBy="typeQualite")
     */
    private $qualitesDISCs;

    /**
     * @ORM\OneToMany(targetEntity=Entreprise::class, mappedBy="traitDeCaractèreSouhaite")
     */
    private $entreprises;

    public function __construct()
    {
        $this->qualitesDISCs = new ArrayCollection();
        $this->entreprises = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    /**
     * @return Collection|QualitesDISC[]
     */
    public function getQualitesDISCs(): Collection
    {
        return $this->qualitesDISCs;
    }

    public function addQualitesDISC(QualitesDISC $qualitesDISC): self
    {
        if (!$this->qualitesDISCs->contains($qualitesDISC)) {
            $this->qualitesDISCs[] = $qualitesDISC;
            $qualitesDISC->setTypeQualite($this);
        }

        return $this;
    }

    public function removeQualitesDISC(QualitesDISC $qualitesDISC): self
    {
        if ($this->qualitesDISCs->removeElement($qualitesDISC)) {
            // set the owning side to null (unless already changed)
            if ($qualitesDISC->getTypeQualite() === $this) {
                $qualitesDISC->setTypeQualite(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Entreprise[]
     */
    public function getEntreprises(): Collection
    {
        return $this->entreprises;
    }

    public function addEntreprise(Entreprise $entreprise): self
    {
        if (!$this->entreprises->contains($entreprise)) {
            $this->entreprises[] = $entreprise;
            $entreprise->setTraitDeCaractereSouhaite($this);
        }

        return $this;
    }

    public function removeEntreprise(Entreprise $entreprise): self
    {
        if ($this->entreprises->removeElement($entreprise)) {
            // set the owning side to null (unless already changed)
            if ($entreprise->getTraitDeCaractereSouhaite() === $this) {
                $entreprise->setTraitDeCaractereSouhaite(null);
            }
        }

        return $this;
    }

}
