<?php


namespace App\Entity;

use App\Repository\UbicacionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UbicacionRepository::class)]
class Ubicacion
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $codigoUbicacionPk = null;

    #[ORM\Column]
    private ?int $codigoDespachoFk;

    #[ORM\Column(nullable: true)]
    private ?int $codigoGuiaFk;

    #[ORM\Column(type: "datetime", nullable: true)]
    private ?\DateTime $fecha;

    #[ORM\Column(options: ["default" => 0], nullable: true)]
    private ?float $latitud = 0.0;

    #[ORM\Column(options: ["default" => 0], nullable: true)]
    private ?float $longitud = 0.0;

    #[ORM\Column(options: ["default" => 0], nullable: true)]
    private ?float $velocidad = 0.0;

    #[ORM\Column(options: ["default" => 0], nullable: true)]
    private ?float $altitud = 0.0;

    #[ORM\Column(options: ["default" => 0], nullable: true)]
    private ?float $exactitud = 0.0;

    #[ORM\Column(options: ["default" => 0], nullable: true)]
    private ?float $exactitudAltitud = 0.0;

    #[ORM\ManyToOne(targetEntity: Despacho::class, inversedBy: 'ubicacionesDespachoRel')]
    #[ORM\JoinColumn(name: "codigo_despacho_fk", referencedColumnName: "codigo_despacho_pk")]
    private Despacho $despachoRel;

    public function getCodigoUbicacionPk(): ?int
    {
        return $this->codigoUbicacionPk;
    }

    public function setCodigoUbicacionPk(?int $codigoUbicacionPk): void
    {
        $this->codigoUbicacionPk = $codigoUbicacionPk;
    }

    public function getCodigoDespachoFk(): ?int
    {
        return $this->codigoDespachoFk;
    }

    public function setCodigoDespachoFk(?int $codigoDespachoFk): void
    {
        $this->codigoDespachoFk = $codigoDespachoFk;
    }

    public function getCodigoGuiaFk(): ?int
    {
        return $this->codigoGuiaFk;
    }

    public function setCodigoGuiaFk(?int $codigoGuiaFk): void
    {
        $this->codigoGuiaFk = $codigoGuiaFk;
    }

    public function getFecha(): ?\DateTime
    {
        return $this->fecha;
    }

    public function setFecha(?\DateTime $fecha): void
    {
        $this->fecha = $fecha;
    }

    public function getLatitud(): ?float
    {
        return $this->latitud;
    }

    public function setLatitud(?float $latitud): void
    {
        $this->latitud = $latitud;
    }

    public function getLongitud(): ?float
    {
        return $this->longitud;
    }

    public function setLongitud(?float $longitud): void
    {
        $this->longitud = $longitud;
    }

    public function getVelocidad(): ?float
    {
        return $this->velocidad;
    }

    public function setVelocidad(?float $velocidad): void
    {
        $this->velocidad = $velocidad;
    }

    public function getAltitud(): ?float
    {
        return $this->altitud;
    }

    public function setAltitud(?float $altitud): void
    {
        $this->altitud = $altitud;
    }

    public function getExactitud(): ?float
    {
        return $this->exactitud;
    }

    public function setExactitud(?float $exactitud): void
    {
        $this->exactitud = $exactitud;
    }

    public function getExactitudAltitud(): ?float
    {
        return $this->exactitudAltitud;
    }

    public function setExactitudAltitud(?float $exactitudAltitud): void
    {
        $this->exactitudAltitud = $exactitudAltitud;
    }

    public function getDespachoRel(): Despacho
    {
        return $this->despachoRel;
    }

    public function setDespachoRel(Despacho $despachoRel): void
    {
        $this->despachoRel = $despachoRel;
    }


}