<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation", indexes={@ORM\Index(name="idcircuit", columns={"idcircuit"})})
 * @ORM\Entity
 */
class Reservation
{
    /**
     * @var int
     *
     * @ORM\Column(name="NumReservation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $numreservation;

    /**
     * @var string
     *
     * @ORM\Column(name="DateReservation", type="string", length=50, nullable=false)
     */
    private $datereservation;

    /**
     * @var string
     *
     * @ORM\Column(name="NomAthlete", type="string", length=50, nullable=false)
     */
    private $nomathlete;

    /**
     * @var string
     *
     * @ORM\Column(name="Tel", type="string", length=50, nullable=false)
     */
    private $tel;

    /**
     * @var \Circuit
     *
     * @ORM\ManyToOne(targetEntity="Circuit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcircuit", referencedColumnName="idcircuit")
     * })
     */
    private $idcircuit;

    public function getNumreservation(): ?int
    {
        return $this->numreservation;
    }

    public function getDatereservation(): ?string
    {
        return $this->datereservation;
    }

    public function setDatereservation(string $datereservation): self
    {
        $this->datereservation = $datereservation;

        return $this;
    }

    public function getNomathlete(): ?string
    {
        return $this->nomathlete;
    }

    public function setNomathlete(string $nomathlete): self
    {
        $this->nomathlete = $nomathlete;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getIdcircuit(): ?Circuit
    {
        return $this->idcircuit;
    }

    public function setIdcircuit(?Circuit $idcircuit): self
    {
        $this->idcircuit = $idcircuit;

        return $this;
    }


}
