<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vehicule
 *
 * @ORM\Table(name="vehicule")
 * @ORM\Entity
 */
class Vehicule
{
    /**
     * @var int
     *
     * @ORM\Column(name="idvehicule", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idvehicule;

    /**
     * @var string
     *
     * @ORM\Column(name="marqueveh", type="string", length=100, nullable=false)
     */
    private $marqueveh;

    /**
     * @var string
     *
     * @ORM\Column(name="modeleveh", type="string", length=100, nullable=false)
     */
    private $modeleveh;

    /**
     * @var string
     *
     * @ORM\Column(name="couleurveh", type="string", length=100, nullable=false)
     */
    private $couleurveh;

    /**
     * @var int
     *
     * @ORM\Column(name="agevehicule", type="integer", nullable=false)
     */
    private $agevehicule;

    /**
     * @var float
     *
     * @ORM\Column(name="puissanceveh", type="float", precision=10, scale=0, nullable=false)
     */
    private $puissanceveh;

    /**
     * @var int
     *
     * @ORM\Column(name="cylindre", type="integer", nullable=false)
     */
    private $cylindre;

    public function getIdvehicule(): ?int
    {
        return $this->idvehicule;
    }

    public function getMarqueveh(): ?string
    {
        return $this->marqueveh;
    }

    public function setMarqueveh(string $marqueveh): self
    {
        $this->marqueveh = $marqueveh;

        return $this;
    }

    public function getModeleveh(): ?string
    {
        return $this->modeleveh;
    }

    public function setModeleveh(string $modeleveh): self
    {
        $this->modeleveh = $modeleveh;

        return $this;
    }

    public function getCouleurveh(): ?string
    {
        return $this->couleurveh;
    }

    public function setCouleurveh(string $couleurveh): self
    {
        $this->couleurveh = $couleurveh;

        return $this;
    }

    public function getAgevehicule(): ?int
    {
        return $this->agevehicule;
    }

    public function setAgevehicule(int $agevehicule): self
    {
        $this->agevehicule = $agevehicule;

        return $this;
    }

    public function getPuissanceveh(): ?float
    {
        return $this->puissanceveh;
    }

    public function setPuissanceveh(float $puissanceveh): self
    {
        $this->puissanceveh = $puissanceveh;

        return $this;
    }

    public function getCylindre(): ?int
    {
        return $this->cylindre;
    }

    public function setCylindre(int $cylindre): self
    {
        $this->cylindre = $cylindre;

        return $this;
    }


}
