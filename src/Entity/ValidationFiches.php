<?php

namespace App\Entity;

use App\Repository\ValidationFichesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ValidationFichesRepository::class)
 */
class ValidationFiches
{
    /**
     * @ORM\Column(type="integer")
     */
    private $idFiches;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $statut;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $elements_forfaitises_id;

    public function getIdFiches(): ?int
    {
        return $this->idFiches;
    }

    public function setIdFiches(int $idFiches): self
    {
        $this->idFiches = $idFiches;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getElementsForfaitisesId(): ?string
    {
        return $this->elements_forfaitises_id;
    }

    public function setElementsForfaitisesId(string $elements_forfaitises_id): self
    {
        $this->elements_forfaitises_id = $elements_forfaitises_id;

        return $this;
    }
}
