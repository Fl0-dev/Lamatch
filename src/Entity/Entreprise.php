<?php

namespace App\Entity;

use App\Repository\EntrepriseRepository;
use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(type="integer")
     */
    private $effectif;

    /**
     * @ORM\Column(type="boolean")
     */
    private $etat;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="entreprise", cascade={"persist", "remove"})
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=TypeEntreprise::class, inversedBy="entreprises")
     * @ORM\JoinColumn(nullable=false)
     */
    private $typeEntreprise;

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

    public function getEtat(): ?bool
    {
        return $this->etat;
    }

    public function setEtat(bool $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

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
}
