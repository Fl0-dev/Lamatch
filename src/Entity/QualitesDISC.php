<?php

namespace App\Entity;

use App\Repository\QualitesDISCRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QualitesDISCRepository::class)
 */
class QualitesDISC
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $nom;

    /**
     * @ORM\ManyToOne(targetEntity=TypeQualite::class, inversedBy="qualitesDISCs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $typeQualite;

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getTypeQualite(): ?TypeQualite
    {
        return $this->typeQualite;
    }

    public function setTypeQualite(?TypeQualite $typeQualite): self
    {
        $this->typeQualite = $typeQualite;

        return $this;
    }

}
