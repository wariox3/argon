<?php


namespace App\Entity;

use App\Repository\UsuarioRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsuarioRepository::class)]
class Usuario
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $codigoUsuarioPk = null;

    #[ORM\Column(length: 50, unique: true)]
    private ?string $usuario;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nombre;

    #[ORM\Column(length: 50)]
    private ?string $clave;

    #[ORM\Column(nullable: true)]
    private ?int $codigoOperadorFk;

    #[ORM\Column(length: 50)]
    private ?string $celular;

    #[ORM\Column(length: 250)]
    private ?string $urlImagen;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $tokenFirebase;

    #[ORM\Column(nullable: true)]
    private ?int $codigoTerceroFk;

    #[ORM\Column(length: 10, options: ["default" => "BAJO"])]
    private ?string $calidadImagen = 'BAJO';

    #[ORM\Column(options: ["default" => 0])]
    private ?float $vrSaldo = 0.0;

    #[ORM\Column(options: ["default" => false], nullable: true)]
    private ?bool $habilitadoConfiguracion = false;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $codigoOperacionFk;

    #[ORM\ManyToOne(targetEntity: Operador::class, inversedBy: 'usuariosOperadorRel')]
    #[ORM\JoinColumn(name: "codigo_operador_fk", referencedColumnName: "codigo_operador_pk")]
    private Operador $operadorRel;

    #[ORM\OneToMany(targetEntity: Despacho::class, mappedBy: 'usuarioRel')]
    private Collection $despachosUsuarioRel;

    #[ORM\OneToMany(targetEntity: Guia::class, mappedBy: 'usuarioRel')]
    private Collection $guiasUsuarioRel;

    public function getCodigoUsuarioPk(): ?int
    {
        return $this->codigoUsuarioPk;
    }

    public function setCodigoUsuarioPk(?int $codigoUsuarioPk): void
    {
        $this->codigoUsuarioPk = $codigoUsuarioPk;
    }

    public function getUsuario(): ?string
    {
        return $this->usuario;
    }

    public function setUsuario(?string $usuario): void
    {
        $this->usuario = $usuario;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getClave(): ?string
    {
        return $this->clave;
    }

    public function setClave(?string $clave): void
    {
        $this->clave = $clave;
    }

    public function getCodigoOperadorFk(): ?int
    {
        return $this->codigoOperadorFk;
    }

    public function setCodigoOperadorFk(?int $codigoOperadorFk): void
    {
        $this->codigoOperadorFk = $codigoOperadorFk;
    }

    public function getCelular(): ?string
    {
        return $this->celular;
    }

    public function setCelular(?string $celular): void
    {
        $this->celular = $celular;
    }

    public function getUrlImagen(): ?string
    {
        return $this->urlImagen;
    }

    public function setUrlImagen(?string $urlImagen): void
    {
        $this->urlImagen = $urlImagen;
    }

    public function getTokenFirebase(): ?string
    {
        return $this->tokenFirebase;
    }

    public function setTokenFirebase(?string $tokenFirebase): void
    {
        $this->tokenFirebase = $tokenFirebase;
    }

    public function getCodigoTerceroFk(): ?int
    {
        return $this->codigoTerceroFk;
    }

    public function setCodigoTerceroFk(?int $codigoTerceroFk): void
    {
        $this->codigoTerceroFk = $codigoTerceroFk;
    }

    public function getCalidadImagen(): ?string
    {
        return $this->calidadImagen;
    }

    public function setCalidadImagen(?string $calidadImagen): void
    {
        $this->calidadImagen = $calidadImagen;
    }

    public function getVrSaldo(): ?float
    {
        return $this->vrSaldo;
    }

    public function setVrSaldo(?float $vrSaldo): void
    {
        $this->vrSaldo = $vrSaldo;
    }

    public function getHabilitadoConfiguracion(): ?bool
    {
        return $this->habilitadoConfiguracion;
    }

    public function setHabilitadoConfiguracion(?bool $habilitadoConfiguracion): void
    {
        $this->habilitadoConfiguracion = $habilitadoConfiguracion;
    }

    public function getCodigoOperacionFk(): ?string
    {
        return $this->codigoOperacionFk;
    }

    public function setCodigoOperacionFk(?string $codigoOperacionFk): void
    {
        $this->codigoOperacionFk = $codigoOperacionFk;
    }

    public function getOperadorRel(): Operador
    {
        return $this->operadorRel;
    }

    public function setOperadorRel(Operador $operadorRel): void
    {
        $this->operadorRel = $operadorRel;
    }

    public function getDespachosUsuarioRel(): Collection
    {
        return $this->despachosUsuarioRel;
    }

    public function setDespachosUsuarioRel(Collection $despachosUsuarioRel): void
    {
        $this->despachosUsuarioRel = $despachosUsuarioRel;
    }

    public function getGuiasUsuarioRel(): Collection
    {
        return $this->guiasUsuarioRel;
    }

    public function setGuiasUsuarioRel(Collection $guiasUsuarioRel): void
    {
        $this->guiasUsuarioRel = $guiasUsuarioRel;
    }


}