<?php


namespace App\Entity;

use App\Repository\OperadorConfiguracionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OperadorConfiguracionRepository::class)]
class OperadorConfiguracion
{

    #[ORM\Id]
    #[ORM\Column]
    private ?int $codigoOperadorConfiguracionPk = null;

    #[ORM\Column(options: ["default" => 1])]
    private ?float $calidadImagenEntrega = 1.0;

    #[ORM\Column(options: ["default" => false])]
    private ?bool $exigeImagenEntrega = false;

    #[ORM\Column(options: ["default" => false])]
    private ?bool $exigeFirmaEntrega = false;

    #[ORM\Column(options: ["default" => false])]
    private ?bool $entrega_novedad = false;

    public function getCodigoOperadorConfiguracionPk(): ?int
    {
        return $this->codigoOperadorConfiguracionPk;
    }

    public function setCodigoOperadorConfiguracionPk(?int $codigoOperadorConfiguracionPk): void
    {
        $this->codigoOperadorConfiguracionPk = $codigoOperadorConfiguracionPk;
    }

    public function getCalidadImagenEntrega(): ?float
    {
        return $this->calidadImagenEntrega;
    }

    public function setCalidadImagenEntrega(?float $calidadImagenEntrega): void
    {
        $this->calidadImagenEntrega = $calidadImagenEntrega;
    }

    public function getExigeImagenEntrega(): ?bool
    {
        return $this->exigeImagenEntrega;
    }

    public function setExigeImagenEntrega(?bool $exigeImagenEntrega): void
    {
        $this->exigeImagenEntrega = $exigeImagenEntrega;
    }

    public function getExigeFirmaEntrega(): ?bool
    {
        return $this->exigeFirmaEntrega;
    }

    public function setExigeFirmaEntrega(?bool $exigeFirmaEntrega): void
    {
        $this->exigeFirmaEntrega = $exigeFirmaEntrega;
    }

    public function getEntregaNovedad(): ?bool
    {
        return $this->entrega_novedad;
    }

    public function setEntregaNovedad(?bool $entrega_novedad): void
    {
        $this->entrega_novedad = $entrega_novedad;
    }


}