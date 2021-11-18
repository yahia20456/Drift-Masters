<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Circuit
 *
 * @ORM\Table(name="circuit")
 * @ORM\Entity
 */
class Circuit
{
    /**
     * @var int
     *
     * @ORM\Column(name="idcircuit", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcircuit;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom_du_circuit", type="string", length=20, nullable=false)
     */
    private $nomDuCircuit;

    /**
     * @var int
     *
     * @ORM\Column(name="limitationsonore", type="integer", nullable=false)
     */
    private $limitationsonore;

    /**
     * @var int
     *
     * @ORM\Column(name="nbrevirage", type="integer", nullable=false)
     */
    private $nbrevirage;

    /**
     * @var float
     *
     * @ORM\Column(name="longeurcircuit", type="float", precision=10, scale=0, nullable=false)
     */
    private $longeurcircuit;

    /**
     * @var float
     *
     * @ORM\Column(name="largeurmin", type="float", precision=10, scale=0, nullable=false)
     */
    private $largeurmin;

    /**
     * @var float
     *
     * @ORM\Column(name="largeurmax", type="float", precision=10, scale=0, nullable=false)
     */
    private $largeurmax;

    /**
     * @var float
     *
     * @ORM\Column(name="pentecircuit", type="float", precision=10, scale=0, nullable=false)
     */
    private $pentecircuit;

    /**
     * @var float
     *
     * @ORM\Column(name="meilleurtour", type="float", precision=10, scale=0, nullable=false)
     */
    private $meilleurtour;

    /**
     * @var string
     *
     * @ORM\Column(name="proprietairecircuit", type="string", length=100, nullable=false)
     */
    private $proprietairecircuit;

    /**
     * @var string
     *
     * @ORM\Column(name="revetement", type="string", length=100, nullable=false)
     */
    private $revetement;

    /**
     * @var string
     *
     * @ORM\Column(name="Dateconstructionc", type="string", length=100, nullable=false)
     */
    private $dateconstructionc;

    public function getIdcircuit(): ?int
    {
        return $this->idcircuit;
    }

    public function getNomDuCircuit(): ?string
    {
        return $this->nomDuCircuit;
    }

    public function setNomDuCircuit(string $nomDuCircuit): self
    {
        $this->nomDuCircuit = $nomDuCircuit;

        return $this;
    }

    public function getLimitationsonore(): ?int
    {
        return $this->limitationsonore;
    }

    public function setLimitationsonore(int $limitationsonore): self
    {
        $this->limitationsonore = $limitationsonore;

        return $this;
    }

    public function getNbrevirage(): ?int
    {
        return $this->nbrevirage;
    }

    public function setNbrevirage(int $nbrevirage): self
    {
        $this->nbrevirage = $nbrevirage;

        return $this;
    }

    public function getLongeurcircuit(): ?float
    {
        return $this->longeurcircuit;
    }

    public function setLongeurcircuit(float $longeurcircuit): self
    {
        $this->longeurcircuit = $longeurcircuit;

        return $this;
    }

    public function getLargeurmin(): ?float
    {
        return $this->largeurmin;
    }

    public function setLargeurmin(float $largeurmin): self
    {
        $this->largeurmin = $largeurmin;

        return $this;
    }

    public function getLargeurmax(): ?float
    {
        return $this->largeurmax;
    }

    public function setLargeurmax(float $largeurmax): self
    {
        $this->largeurmax = $largeurmax;

        return $this;
    }

    public function getPentecircuit(): ?float
    {
        return $this->pentecircuit;
    }

    public function setPentecircuit(float $pentecircuit): self
    {
        $this->pentecircuit = $pentecircuit;

        return $this;
    }

    public function getMeilleurtour(): ?float
    {
        return $this->meilleurtour;
    }

    public function setMeilleurtour(float $meilleurtour): self
    {
        $this->meilleurtour = $meilleurtour;

        return $this;
    }

    public function getProprietairecircuit(): ?string
    {
        return $this->proprietairecircuit;
    }

    public function setProprietairecircuit(string $proprietairecircuit): self
    {
        $this->proprietairecircuit = $proprietairecircuit;

        return $this;
    }

    public function getRevetement(): ?string
    {
        return $this->revetement;
    }

    public function setRevetement(string $revetement): self
    {
        $this->revetement = $revetement;

        return $this;
    }

    public function getDateconstructionc(): ?string
    {
        return $this->dateconstructionc;
    }

    public function setDateconstructionc(string $dateconstructionc): self
    {
        $this->dateconstructionc = $dateconstructionc;

        return $this;
    }


}
