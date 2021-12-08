<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReservationRepository::class)
 */
class Reservation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NomPrenom;

    /**
     * @ORM\Column(type="datetime")
     */
    private $DateReservation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Telephone;

    /**
     * @ORM\ManyToOne(targetEntity=Circuit::class, inversedBy="reservations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $reservation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomPrenom(): ?string
    {
        return $this->NomPrenom;
    }

    public function setNomPrenom(string $NomPrenom): self
    {
        $this->NomPrenom = $NomPrenom;

        return $this;
    }

    public function getDateReservation(): ?\DateTimeInterface
    {
        return $this->DateReservation;
    }

    public function setDateReservation(\DateTimeInterface $DateReservation): self
    {
        $this->DateReservation = $DateReservation;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->Telephone;
    }

    public function setTelephone(string $Telephone): self
    {
        $this->Telephone = $Telephone;

        return $this;
    }

    public function getReservation(): ?Circuit
    {
        return $this->reservation;
    }

    public function setReservation(?Circuit $reservation): self
    {
        $this->reservation = $reservation;

        return $this;
    }
}
