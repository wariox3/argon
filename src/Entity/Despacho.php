<?php


namespace App\Entity;

use App\Repository\DespachoRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DespachoRepository::class)]
class Despacho
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $codigoDespachoPk = null;

    #[ORM\Column(type: "datetime", nullable: true)]
    private ?\DateTime $fecha;

    #[ORM\Column]
    private ?int $codigoOperadorFk;

    #[ORM\Column]
    private ?int $codigoDespacho;

    #[ORM\Column(length: 10)]
    private ?string $token;

    #[ORM\Column(nullable: true)]
    private ?int $codigoUsuarioFk;

    #[ORM\Column(length: 5, nullable: true)]
    private ?string $codigoDespachoClaseFk;

    #[ORM\Column(type: "datetime", nullable: true)]
    private ?\DateTime $fechaDespacho;

    #[ORM\Column(options: ["default" => false])]
    private ?bool $estadoEntregado = false;

    #[ORM\ManyToOne(targetEntity: Operador::class, inversedBy: 'despachosOperadorRel')]
    #[ORM\JoinColumn(name: "codigo_operador_fk", referencedColumnName: "codigo_operador_pk")]
    private Operador $operadorRel;

    #[ORM\ManyToOne(targetEntity: Usuario::class, inversedBy: 'despachosUsuarioRel')]
    #[ORM\JoinColumn(name: "codigo_usuario_fk", referencedColumnName: "codigo_usuario_pk")]
    private Usuario $usuarioRel;

    #[ORM\OneToMany(targetEntity: Despacho::class, mappedBy: 'despachoRel')]
    private Collection $ubicacionesDespachoRel;

    public function getCodigoDespachoPk(): ?int
    {
        return $this->codigoDespachoPk;
    }

    public function setCodigoDespachoPk(?int $codigoDespachoPk): void
    {
        $this->codigoDespachoPk = $codigoDespachoPk;
    }

    public function getFecha(): ?\DateTime
    {
        return $this->fecha;
    }

    public function setFecha(?\DateTime $fecha): void
    {
        $this->fecha = $fecha;
    }

    public function getCodigoOperadorFk(): ?int
    {
        return $this->codigoOperadorFk;
    }

    public function setCodigoOperadorFk(?int $codigoOperadorFk): void
    {
        $this->codigoOperadorFk = $codigoOperadorFk;
    }

    public function getCodigoDespacho(): ?int
    {
        return $this->codigoDespacho;
    }

    public function setCodigoDespacho(?int $codigoDespacho): void
    {
        $this->codigoDespacho = $codigoDespacho;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(?string $token): void
    {
        $this->token = $token;
    }

    public function getCodigoUsuarioFk(): ?int
    {
        return $this->codigoUsuarioFk;
    }

    public function setCodigoUsuarioFk(?int $codigoUsuarioFk): void
    {
        $this->codigoUsuarioFk = $codigoUsuarioFk;
    }

    public function getCodigoDespachoClaseFk(): ?string
    {
        return $this->codigoDespachoClaseFk;
    }

    public function setCodigoDespachoClaseFk(?string $codigoDespachoClaseFk): void
    {
        $this->codigoDespachoClaseFk = $codigoDespachoClaseFk;
    }

    public function getFechaDespacho(): ?\DateTime
    {
        return $this->fechaDespacho;
    }

    public function setFechaDespacho(?\DateTime $fechaDespacho): void
    {
        $this->fechaDespacho = $fechaDespacho;
    }

    public function getEstadoEntregado(): ?bool
    {
        return $this->estadoEntregado;
    }

    public function setEstadoEntregado(?bool $estadoEntregado): void
    {
        $this->estadoEntregado = $estadoEntregado;
    }

    public function getOperadorRel(): Operador
    {
        return $this->operadorRel;
    }

    public function setOperadorRel(Operador $operadorRel): void
    {
        $this->operadorRel = $operadorRel;
    }

    public function getUsuarioRel(): Usuario
    {
        return $this->usuarioRel;
    }

    public function setUsuarioRel(Usuario $usuarioRel): void
    {
        $this->usuarioRel = $usuarioRel;
    }

    public function getUbicacionesDespachoRel(): Collection
    {
        return $this->ubicacionesDespachoRel;
    }

    public function setUbicacionesDespachoRel(Collection $ubicacionesDespachoRel): void
    {
        $this->ubicacionesDespachoRel = $ubicacionesDespachoRel;
    }


}