<?php

namespace App\Entity;

use App\Repository\CandidatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CandidatRepository::class)
 */
class Candidat
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $emailContact;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $photo;

    /**
     * @ORM\Column(type="date")
     */
    private $dateNaissance;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $linkedin;

    /**
     * @ORM\Column(type="boolean")
     */
    private $enRecherche;

    /**
     * @ORM\ManyToOne(targetEntity=Ville::class, inversedBy="candidats")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ville;

    /**
     * @ORM\ManyToMany(targetEntity=Formation::class, inversedBy="candidats")
     */
    private $formations;

    /**
     * @ORM\OneToOne(targetEntity=QualitesDISC::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $ListeDeQualitesDISC;

    /**
     * @ORM\ManyToOne(targetEntity=ValeurPrincipale::class, inversedBy="candidats")
     * @ORM\JoinColumn(nullable=false)
     */
    private $valeurPrincipale;

    /**
     * @ORM\ManyToMany(targetEntity=Competence::class, inversedBy="candidats")
     */
    private $competences;

    public function __construct()
    {
        $this->formations = new ArrayCollection();
        $this->competences = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmailContact(): ?string
    {
        return $this->emailContact;
    }

    public function setEmailContact(string $emailContact): self
    {
        $this->emailContact = $emailContact;

        return $this;
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

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

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(\DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getLinkedin(): ?string
    {
        return $this->linkedin;
    }

    public function setLinkedin(?string $linkedin): self
    {
        $this->linkedin = $linkedin;

        return $this;
    }

    public function getEnRecherche(): ?bool
    {
        return $this->enRecherche;
    }

    public function setEnRecherche(bool $enRecherche): self
    {
        $this->enRecherche = $enRecherche;

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

    /**
     * @return Collection|Formation[]
     */
    public function getFormations(): Collection
    {
        return $this->formations;
    }

    public function addFormation(Formation $formation): self
    {
        if (!$this->formations->contains($formation)) {
            $this->formations[] = $formation;
        }

        return $this;
    }

    public function removeFormation(Formation $formation): self
    {
        $this->formations->removeElement($formation);

        return $this;
    }

    public function getListeDeQualitesDISC(): ?QualitesDISC
    {
        return $this->ListeDeQualitesDISC;
    }

    public function setListeDeQualitesDISC(QualitesDISC $ListeDeQualitesDISC): self
    {
        $this->ListeDeQualitesDISC = $ListeDeQualitesDISC;

        return $this;
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
}
