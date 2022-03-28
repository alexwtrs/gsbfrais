<?php

namespace App\Entity;

use App\Repository\ElementsForfaitisesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ElementsForfaitisesRepository::class)
 */
class ElementsForfaitises
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
    private $ForfaitEtape;

    /**
     * @ORM\Column(type="integer")
     */
    private $FraisKilometrique;

    /**
     * @ORM\Column(type="integer")
     */
    private $NuiteeHotel;

    /**
     * @ORM\Column(type="integer")
     */
    private $RepasRestaurant;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateAdd;

    public function __construct()
    {
        $this->dateAdd = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getForfaitEtape(): ?int
    {
        return $this->ForfaitEtape;
    }

    public function setForfaitEtape(int $ForfaitEtape): self
    {
        $this->ForfaitEtape = $ForfaitEtape;

        return $this;
    }

    public function getFraisKilometrique(): ?int
    {
        return $this->FraisKilometrique;
    }

    public function setFraisKilometrique(int $FraisKilometrique): self
    {
        $this->FraisKilometrique = $FraisKilometrique;

        return $this;
    }

    public function getNuiteeHotel(): ?int
    {
        return $this->NuiteeHotel;
    }

    public function setNuiteeHotel(int $NuiteeHotel): self
    {
        $this->NuiteeHotel = $NuiteeHotel;

        return $this;
    }

    public function getRepasRestaurant(): ?int
    {
        return $this->RepasRestaurant;
    }

    public function setRepasRestaurant(int $RepasRestaurant): self
    {
        $this->RepasRestaurant = $RepasRestaurant;

        return $this;
    }

    public function getDateAdd(): ?\DateTimeInterface
    {
        return $this->dateAdd;
    }

    public function setDateAdd(\DateTimeInterface $dateAdd): self
    {
        $this->dateAdd = $dateAdd;

        return $this;
    }
}
