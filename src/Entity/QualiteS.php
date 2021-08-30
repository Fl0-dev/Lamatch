<?php

namespace App\Entity;

use App\Repository\QualiteSRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QualiteSRepository::class)
 */
class QualiteS
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $nom;

    /**
     * @ORM\ManyToMany(targetEntity=QualitesDISC::class, mappedBy="ListeDeQualitesS")
     */
    private $qualitesDISCs;

    public function __construct()
    {
        $this->qualitesDISCs = new ArrayCollection();
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
            $qualitesDISC->addListeDeQualites($this);
        }

        return $this;
    }

    public function removeQualitesDISC(QualitesDISC $qualitesDISC): self
    {
        if ($this->qualitesDISCs->removeElement($qualitesDISC)) {
            $qualitesDISC->removeListeDeQualites($this);
        }

        return $this;
    }
}
