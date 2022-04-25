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
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $elements_forfaitises_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $elements_hors_forfait_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $user_id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $statut;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getElementsForfaitisesId(): ?int
    {
        return $this->elements_forfaitises_id;
    }

    public function setElementsForfaitisesId(int $elements_forfaitises_id): self
    {
        $this->elements_forfaitises_id = $elements_forfaitises_id;

        return $this;
    }

    public function getElementsHorsForfaitId(): ?int
    {
        return $this->elements_hors_forfait_id;
    }

    public function setElementsHorsForfaitId(int $elements_hors_forfait_id): self
    {
        $this->elements_hors_forfait_id = $elements_hors_forfait_id;

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): self
    {
        $this->user_id = $user_id;

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
}
