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
     * @ORM\ManyToOne(targetEntity=ValeurPrincipale::class, inversedBy="candidats")
     * @ORM\JoinColumn(nullable=false)
     */
    private $valeurPrincipale;

    /**
     * @ORM\ManyToMany(targetEntity=Competence::class, inversedBy="candidats")
     */
    private $competences;

    /**
     * @ORM\OneToOne(targetEntity=User::class, mappedBy="candidat", cascade={"persist", "remove"})
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=Experience::class, mappedBy="candidat")
     */
    private $experiences;

    /**
     * @ORM\ManyToMany(targetEntity=QualitesDISC::class, inversedBy="candidats")
     */
    private $ListQualites;

    public function __construct()
    {
        $this->formations = new ArrayCollection();
        $this->competences = new ArrayCollection();
        $this->experiences = new ArrayCollection();
        $this->ListQualites = new ArrayCollection();
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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        // unset the owning side of the relation if necessary
        if ($user === null && $this->user !== null) {
            $this->user->setCandidat(null);
        }

        // set the owning side of the relation if necessary
        if ($user !== null && $user->getCandidat() !== $this) {
            $user->setCandidat($this);
        }

        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|Experience[]
     */
    public function getExperiences(): Collection
    {
        return $this->experiences;
    }

    public function addExperience(Experience $experience): self
    {
        if (!$this->experiences->contains($experience)) {
            $this->experiences[] = $experience;
            $experience->setCandidat($this);
        }

        return $this;
    }

    public function removeExperience(Experience $experience): self
    {
        if ($this->experiences->removeElement($experience)) {
            // set the owning side to null (unless already changed)
            if ($experience->getCandidat() === $this) {
                $experience->setCandidat(null);
            }
        }

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
}
