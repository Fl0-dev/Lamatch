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
     * @ORM\ManyToMany(targetEntity=QualiteC::class, inversedBy="qualitesDISCs")
     */
    private $ListeDeQualitesC;

    /**
     * @ORM\ManyToMany(targetEntity=QualiteI::class, inversedBy="qualitesDISCs")
     */
    private $ListeDeQualitesI;

    /**
     * @ORM\ManyToMany(targetEntity=QualiteD::class, inversedBy="qualitesDISCs")
     */
    private $ListeDeQualitesD;

    /**
     * @ORM\ManyToMany(targetEntity=QualiteS::class, inversedBy="qualitesDISCs")
     */
    private $ListeDeQualitesS;

    public function __construct()
    {
        $this->ListeDeQualitesC = new ArrayCollection();
        $this->ListeDeQualitesI = new ArrayCollection();
        $this->ListeDeQualitesD = new ArrayCollection();
        $this->ListeDeQualitesS = new ArrayCollection();
    }

    /**
     * @return Collection|QualiteC[]
     */
    public function getListeDeQualitesC(): Collection
    {
        return $this->ListeDeQualitesC;
    }

    public function addListeDeQualitesC(QualiteC $listeDeQualitesC): self
    {
        if (!$this->ListeDeQualitesC->contains($listeDeQualitesC)) {
            $this->ListeDeQualitesC[] = $listeDeQualitesC;
        }

        return $this;
    }

    public function removeListeDeQualitesC(QualiteC $listeDeQualitesC): self
    {
        $this->ListeDeQualitesC->removeElement($listeDeQualitesC);

        return $this;
    }

    /**
     * @return Collection|QualiteI[]
     */
    public function getListeDeQualitesI(): Collection
    {
        return $this->ListeDeQualitesI;
    }

    public function addListeDeQualitesI(QualiteI $listeDeQualitesI): self
    {
        if (!$this->ListeDeQualitesI->contains($listeDeQualitesI)) {
            $this->ListeDeQualitesI[] = $listeDeQualitesI;
        }

        return $this;
    }

    public function removeListeDeQualitesI(QualiteI $listeDeQualitesI): self
    {
        $this->ListeDeQualitesI->removeElement($listeDeQualitesI);

        return $this;
    }

    /**
     * @return Collection|QualiteD[]
     */
    public function getListeDeQualitesD(): Collection
    {
        return $this->ListeDeQualitesD;
    }

    public function addListeDeQualitesD(QualiteD $listeDeQualitesD): self
    {
        if (!$this->ListeDeQualitesD->contains($listeDeQualitesD)) {
            $this->ListeDeQualitesD[] = $listeDeQualitesD;
        }

        return $this;
    }

    public function removeListeDeQualitesD(QualiteD $listeDeQualitesD): self
    {
        $this->ListeDeQualitesD->removeElement($listeDeQualitesD);

        return $this;
    }

    /**
     * @return Collection|QualiteS[]
     */
    public function getListeDeQualitesS(): Collection
    {
        return $this->ListeDeQualitesS;
    }

    public function addListeDeQualites(QualiteS $listeDeQualites): self
    {
        if (!$this->ListeDeQualitesS->contains($listeDeQualites)) {
            $this->ListeDeQualitesS[] = $listeDeQualites;
        }

        return $this;
    }

    public function removeListeDeQualites(QualiteS $listeDeQualites): self
    {
        $this->ListeDeQualitesS->removeElement($listeDeQualites);

        return $this;
    }

}
