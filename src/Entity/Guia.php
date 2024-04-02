<?php


namespace App\Entity;

use App\Repository\GuiaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GuiaRepository::class)]
class Guia
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $codigoGuiaPk = null;

    #[ORM\Column(type: "datetime", nullable: true)]
    private ?\DateTime $fecha;

    #[ORM\Column]
    private ?int $codigoOperadorFk;

    #[ORM\Column]
    private ?int $codigoGuia;

    #[ORM\Column(length: 20)]
    private ?string $codigoSeguimientoTipoFk;

    #[ORM\Column(nullable: true)]
    private ?int $codigoUsuarioFk;

    #[ORM\Column(options: ["default" => false], nullable: true)]
    private ?bool $estadoError = false;

    #[ORM\ManyToOne(targetEntity: Operador::class, inversedBy: 'guiasOperadorRel')]
    #[ORM\JoinColumn(name: "codigo_operador_fk", referencedColumnName: "codigo_operador_pk")]
    private Operador $operadorRel;

    #[ORM\ManyToOne(targetEntity: Usuario::class, inversedBy: 'guiasUsuarioRel')]
    #[ORM\JoinColumn(name: "codigo_usuario_fk", referencedColumnName: "codigo_usuario_pk")]
    private Usuario $usuarioRel;

    public function getCodigoGuiaPk(): ?int
    {
        return $this->codigoGuiaPk;
    }

    public function setCodigoGuiaPk(?int $codigoGuiaPk): void
    {
        $this->codigoGuiaPk = $codigoGuiaPk;
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

    public function getCodigoGuia(): ?int
    {
        return $this->codigoGuia;
    }

    public function setCodigoGuia(?int $codigoGuia): void
    {
        $this->codigoGuia = $codigoGuia;
    }

    public function getCodigoSeguimientoTipoFk(): ?string
    {
        return $this->codigoSeguimientoTipoFk;
    }

    public function setCodigoSeguimientoTipoFk(?string $codigoSeguimientoTipoFk): void
    {
        $this->codigoSeguimientoTipoFk = $codigoSeguimientoTipoFk;
    }

    public function getCodigoUsuarioFk(): ?int
    {
        return $this->codigoUsuarioFk;
    }

    public function setCodigoUsuarioFk(?int $codigoUsuarioFk): void
    {
        $this->codigoUsuarioFk = $codigoUsuarioFk;
    }

    public function getEstadoError(): ?bool
    {
        return $this->estadoError;
    }

    public function setEstadoError(?bool $estadoError): void
    {
        $this->estadoError = $estadoError;
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


}