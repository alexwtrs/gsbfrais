<?php

namespace App\Entity;

use App\Repository\SuiviFraisRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SuiviFraisRepository::class)
 */
class SuiviFrais
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $statut;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getForfaitEtape(): ?int
    {
        return $this->forfait_etape;
    }

    public function getFraisKilometrique(): ?int
    {
        return $this->frais_kilometrique;
    }

    public function getNuiteeHotel(): ?int
    {
        return $this->nuitee_hotel;
    }

    public function getRepasRestaurant(): ?int
    {
        return $this->repas_restaurant;
    }

    public function getDateAdd(): ?int
    {
        return $this->dateAdd;
    }

    public function getDate(): ?int
    {
        return $this->Date;
    }

    public function getLibelle(): ?int
    {
        return $this->Libelle;
    }

    public function getMontant(): ?int
    {
        return $this->Montant;
    }

    public function getStatut(): ?string
    {
        return $this->Statut;
    }

    public function setStatut(string $Statut): self
    {
        $this->Statut = $Statut;

        return $this;
    }
}
