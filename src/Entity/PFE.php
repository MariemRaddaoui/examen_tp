<?php

namespace App\Entity;

use App\Repository\PFERepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PFERepository::class)]
class PFE
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50)]
    private $nomEtudiant;

    #[ORM\Column(type: 'string', length: 70)]
    private $titrePFE;

    #[ORM\ManyToOne(targetEntity: Entreprise::class, inversedBy: 'PFEs')]
    #[ORM\JoinColumn(nullable: false)]
    private $entreprise;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEtudiant(): ?string
    {
        return $this->nomEtudiant;
    }

    public function setNomEtudiant(string $nomEtudiant): self
    {
        $this->nomEtudiant = $nomEtudiant;

        return $this;
    }

    public function getTitrePFE(): ?string
    {
        return $this->titrePFE;
    }

    public function setTitrePFE(string $titrePFE): self
    {
        $this->titrePFE = $titrePFE;

        return $this;
    }

    public function getEntreprise(): ?Entreprise
    {
        return $this->entreprise;
    }

    public function setEntreprise(?Entreprise $entreprise): self
    {
        $this->entreprise = $entreprise;

        return $this;
    }

    public function __toString():string{
        return $this->getTitrePFE();
    }
}
