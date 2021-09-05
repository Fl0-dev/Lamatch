<?php

namespace App\Entity;

use App\Repository\MatchingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MatchingRepository::class)
 */
class Matching
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=ValeurPrincipale::class)
     */
    private $valeurPrincipale;

    /**
     * @ORM\ManyToOne(targetEntity=Ville::class)
     */
    private $ville;

    /**
     * @ORM\ManyToOne(targetEntity=TypeContrat::class)
     */
    private $typeContrat;

    /**
     * @ORM\ManyToOne(targetEntity=Niveau::class)
     */
    private $niveauDemande;

    /**
     * @ORM\ManyToOne(targetEntity=Domaine::class)
     */
    private $domaine;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $experience;

    /**
     * @ORM\ManyToMany(targetEntity=QualitesDISC::class)
     */
    private $ListQualites;

    /**
     * @ORM\Column(type="boolean")
     */
    private $enrecherche;

    /**
     * @ORM\ManyToMany(targetEntity=Competence::class)
     */
    private $competences;

    /**
     * @ORM\ManyToOne(targetEntity=Region::class)
     */
    private $region;

    public function __construct()
    {
        $this->ListQualites = new ArrayCollection();
        $this->competences = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValeurPrincipale(): ?ValeurPrincipale
    {
        return $this->valeurPrincipale;
    }

    public function setValeurPrincipale(?ValeurPrincipale $valeurPrincipale): self
    {
        $this->valeurPrincipale = $valeurPrincipale;

        return $this;
    }

    public function getVille(): ?Ville
    {
        return $this->ville;
    }

    public function setVille(?Ville $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getTypeContrat(): ?TypeContrat
    {
        return $this->typeContrat;
    }

    public function setTypeContrat(?TypeContrat $typeContrat): self
    {
        $this->typeContrat = $typeContrat;

        return $this;
    }

    public function getNiveauDemande(): ?Niveau
    {
        return $this->niveau;
    }

    public function setNiveauDemande(?Niveau $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getDomaine(): ?Domaine
    {
        return $this->domaine;
    }

    public function setDomaine(?Domaine $domaine): self
    {
        $this->domaine = $domaine;

        return $this;
    }

    public function getExperience(): ?int
    {
        return $this->experience;
    }

    public function setExperience(?int $experience): self
    {
        $this->experience = $experience;

        return $this;
    }

    /**
     * @return Collection|QualitesDISC[]
     */
    public function getListQualites(): Collection
    {
        return $this->ListQualites;
    }

    public function addListQualite(QualitesDISC $listQualite): self
    {
        if (!$this->ListQualites->contains($listQualite)) {
            $this->ListQualites[] = $listQualite;
        }

        return $this;
    }

    public function removeListQualite(QualitesDISC $listQualite): self
    {
        $this->ListQualites->removeElement($listQualite);

        return $this;
    }

    public function getEnrecherche(): ?bool
    {
        return $this->enrecherche;
    }

    public function setEnrecherche(bool $enrecherche): self
    {
        $this->enrecherche = $enrecherche;

        return $this;
    }

    /**
     * @return Collection|Competence[]
     */
    public function getCompetences(): Collection
    {
        return $this->competences;
    }

    public function addCompetence(Competence $competence): self
    {
        if (!$this->competences->contains($competence)) {
            $this->competences[] = $competence;
        }

        return $this;
    }

    public function removeCompetence(Competence $competence): self
    {
        $this->competences->removeElement($competence);

        return $this;
    }

    public function getRegion(): ?Region
    {
        return $this->region;
    }

    public function setRegion(?Region $region): self
    {
        $this->region = $region;

        return $this;
    }
}
