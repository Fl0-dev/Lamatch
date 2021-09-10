<?php

namespace App\Entity;

use App\Repository\EntrepriseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=EntrepriseRepository::class)
 */
class Entreprise
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $logo;

    /**
     * @Assert\LessThan("today")
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateDeCreation;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $adresseWeb;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $adresseRH;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $infos;

    /**
     * @Assert\Positive
     * @ORM\Column(type="integer")
     */
    private $effectif;

    /**
     * @ORM\ManyToOne(targetEntity=TypeEntreprise::class, inversedBy="entreprises")
     * @ORM\JoinColumn(nullable=false)
     */
    private $typeEntreprise;

    /**
     * @ORM\ManyToOne(targetEntity=Ville::class, inversedBy="entreprises")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ville;

    /**
     * @ORM\ManyToOne(targetEntity=ValeurPrincipale::class, inversedBy="entreprises")
     * @ORM\JoinColumn(nullable=false)
     */
    private $valeurPrincipale;

    /**
     * @ORM\ManyToMany(targetEntity=Domaine::class, inversedBy="entreprises")
     */
    private $domaines;

    /**
     * @ORM\Column(type="boolean")
     */
    private $enrecherche;

    /**
     * @ORM\OneToOne(targetEntity=User::class, mappedBy="entreprise", cascade={"persist", "remove"})
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=TypeContrat::class, inversedBy="entreprises")
     */
    private $typeContratPropose;

    /**
     * @Assert\Positive
     * @ORM\Column(type="integer", nullable=true)
     */
    private $experienceDemande;

    /**
     * @ORM\ManyToOne(targetEntity=Niveau::class, inversedBy="entreprises")
     */
    private $niveauDemande;

    public function __construct()
    {
        $this->domaines = new ArrayCollection();
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

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    public function getDateDeCreation(): ?\DateTimeInterface
    {
        return $this->dateDeCreation;
    }

    public function setDateDeCreation(?\DateTimeInterface $dateDeCreation): self
    {
        $this->dateDeCreation = $dateDeCreation;

        return $this;
    }

    public function getAdresseWeb(): ?string
    {
        return $this->adresseWeb;
    }

    public function setAdresseWeb(string $adresseWeb): self
    {
        $this->adresseWeb = $adresseWeb;

        return $this;
    }

    public function getAdresseRH(): ?string
    {
        return $this->adresseRH;
    }

    public function setAdresseRH(string $adresseRH): self
    {
        $this->adresseRH = $adresseRH;

        return $this;
    }

    public function getInfos(): ?string
    {
        return $this->infos;
    }

    public function setInfos(?string $infos): self
    {
        $this->infos = $infos;

        return $this;
    }

    public function getEffectif(): ?int
    {
        return $this->effectif;
    }

    public function setEffectif(int $effectif): self
    {
        $this->effectif = $effectif;

        return $this;
    }

    public function getTypeEntreprise(): ?TypeEntreprise
    {
        return $this->typeEntreprise;
    }

    public function setTypeEntreprise(?TypeEntreprise $typeEntreprise): self
    {
        $this->typeEntreprise = $typeEntreprise;

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
     * @return Collection|Domaine[]
     */
    public function getDomaines(): Collection
    {
        return $this->domaines;
    }

    public function addDomaine(Domaine $domaine): self
    {
        if (!$this->domaines->contains($domaine)) {
            $this->domaines[] = $domaine;
        }

        return $this;
    }

    public function removeDomaine(Domaine $domaine): self
    {
        $this->domaines->removeElement($domaine);

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        // unset the owning side of the relation if necessary
        if ($user === null && $this->user !== null) {
            $this->user->setEntreprise(null);
        }

        // set the owning side of the relation if necessary
        if ($user !== null && $user->getEntreprise() !== $this) {
            $user->setEntreprise($this);
        }

        $this->user = $user;

        return $this;
    }

    public function getTypeContratPropose(): ?TypeContrat
    {
        return $this->typeContratPropose;
    }

    public function setTypeContratPropose(?TypeContrat $typeContratPropose): self
    {
        $this->typeContratPropose = $typeContratPropose;

        return $this;
    }

    public function getExperienceDemande(): ?int
    {
        return $this->experienceDemande;
    }

    public function setExperienceDemande(?int $experienceDemande): self
    {
        $this->experienceDemande = $experienceDemande;

        return $this;
    }

    public function getNiveauDemande(): ?Niveau
    {
        return $this->niveauDemande;
    }

    public function setNiveauDemande(?Niveau $niveauDemande): self
    {
        $this->niveauDemande = $niveauDemande;

        return $this;
    }
}
