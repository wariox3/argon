<?php


namespace App\Repository;

use App\Entity\OperadorConfiguracion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class OperadorConfiguracionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OperadorConfiguracion::class);
    }

    public function apiCalidadImagenEntrega($codigoOperador)
    {
        $em = $this->getEntityManager();
        $arOperadorConfiguracion = $em->getRepository(OperadorConfiguracion::class)->find($codigoOperador);
        if ($arOperadorConfiguracion) {
            return [
                'error' => false,
                'calidadImagenEntrega' => $arOperadorConfiguracion->getCalidadImagenEntrega(),
                'exigeImagenEntrega' => $arOperadorConfiguracion->getExigeImagenEntrega(),
                'exigeFirmaEntrega' => $arOperadorConfiguracion->getExigeFirmaEntrega(),
                'entregaNovedad' => $arOperadorConfiguracion->getEntregaNovedad()
            ];
        } else {
            return [
                'error' => false,
                'calidadImagenEntrega' => 1,
                'exigeImagenEntrega' => false,
                'exigeFirmaEntrega' => false
            ];
        }
    }


    public function apiCambiarConfiguracion($codigoOperador, $calidadImagenEntrega, $exigeImagenEntrega, $exigeFirmaEntrega, $entregaNovedad)
    {
        $em = $this->getEntityManager();
        $arOperadorConfiguracion = $em->getRepository(OperadorConfiguracion::class)->find($codigoOperador);
        if ($arOperadorConfiguracion) {
            $arOperadorConfiguracion->setCalidadImagenEntrega($calidadImagenEntrega);
            $arOperadorConfiguracion->setExigeImagenEntrega($exigeImagenEntrega);
            $arOperadorConfiguracion->setExigeFirmaEntrega($exigeFirmaEntrega);
            $arOperadorConfiguracion->setEntregaNovedad($entregaNovedad);
            $em->persist($arOperadorConfiguracion);
            $em->flush();
            return [
                'error' => false,
            ];
        } else {
            return [
                'error' => true,
                'errorMensaje' => "No existe una configuracion para el operador"
            ];
        }
    }

}