<?php


namespace App\Entity;

use App\Repository\OperadorRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OperadorRepository::class)]
class Operador
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $codigoOperadorPk = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $nombre;

    #[ORM\Column(options: ["default" => false], nullable: true)]
    private ?bool $sincronizar = false;

    #[ORM\Column(length: 200, nullable: true)]
    private ?string $puntoServicioCromo;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $token;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $usuarioServicio;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $claveServicio;

    #[ORM\Column(options: ["default" => false], nullable: true)]
    private ?bool $transporte = false;

    #[ORM\OneToMany(targetEntity: Usuario::class, mappedBy: 'operadorRel')]
    private Collection $usuariosOperadorRel;

    #[ORM\OneToMany(targetEntity: Despacho::class, mappedBy: 'operadorRel')]
    private Collection $despachosOperadorRel;

    #[ORM\OneToMany(targetEntity: Guia::class, mappedBy: 'operadorRel')]
    private Collection $guiasOperadorRel;

    public function getCodigoOperadorPk(): ?int
    {
        return $this->codigoOperadorPk;
    }

    public function setCodigoOperadorPk(?int $codigoOperadorPk): void
    {
        $this->codigoOperadorPk = $codigoOperadorPk;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getSincronizar(): ?bool
    {
        return $this->sincronizar;
    }

    public function setSincronizar(?bool $sincronizar): void
    {
        $this->sincronizar = $sincronizar;
    }

    public function getPuntoServicioCromo(): ?string
    {
        return $this->puntoServicioCromo;
    }

    public function setPuntoServicioCromo(?string $puntoServicioCromo): void
    {
        $this->puntoServicioCromo = $puntoServicioCromo;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(?string $token): void
    {
        $this->token = $token;
    }

    public function getUsuarioServicio(): ?string
    {
        return $this->usuarioServicio;
    }

    public function setUsuarioServicio(?string $usuarioServicio): void
    {
        $this->usuarioServicio = $usuarioServicio;
    }

    public function getClaveServicio(): ?string
    {
        return $this->claveServicio;
    }

    public function setClaveServicio(?string $claveServicio): void
    {
        $this->claveServicio = $claveServicio;
    }

    public function getTransporte(): ?bool
    {
        return $this->transporte;
    }

    public function setTransporte(?bool $transporte): void
    {
        $this->transporte = $transporte;
    }

    public function getUsuariosOperadorRel(): Collection
    {
        return $this->usuariosOperadorRel;
    }

    public function setUsuariosOperadorRel(Collection $usuariosOperadorRel): void
    {
        $this->usuariosOperadorRel = $usuariosOperadorRel;
    }

    public function getDespachosOperadorRel(): Collection
    {
        return $this->despachosOperadorRel;
    }

    public function setDespachosOperadorRel(Collection $despachosOperadorRel): void
    {
        $this->despachosOperadorRel = $despachosOperadorRel;
    }

    public function getGuiasOperadorRel(): Collection
    {
        return $this->guiasOperadorRel;
    }

    public function setGuiasOperadorRel(Collection $guiasOperadorRel): void
    {
        $this->guiasOperadorRel = $guiasOperadorRel;
    }


}