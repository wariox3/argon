<?php


namespace App\Controller\Api;

use App\Entity\Celda;
use App\Entity\Ciudad;
use App\Entity\Operador;
use App\Entity\OperadorConfiguracion;
use App\Entity\Panal;
use App\Entity\Publicacion;
use App\Entity\Usuario;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class OperadorController extends AbstractFOSRestController
{

    #[Route("/api/operador/lista")]
    public function lista(Request $request, EntityManagerInterface $em)
    {
        $raw = json_decode($request->getContent(), true);
        return $em->getRepository(Operador::class)->apiLista();
    }

    #[Route("/api/operador/conectar")]
    public function conectar(Request $request, EntityManagerInterface $em)
    {
        $raw = json_decode($request->getContent(), true);
        $codigoOperador = $raw['codigoOperador'] ?? null;
        if ($codigoOperador) {
            return $em->getRepository(Operador::class)->apiConectar($codigoOperador);
        } else {
            return [
                'error' => true,
                'errorMensaje' => 'Faltan parametros para el consumo de la api'
            ];
        }
    }

    #[Route("/api/operador/calidadimagenentrega")]
    public function calidadImagenEntrega(Request $request, EntityManagerInterface $em)
    {
        $raw = json_decode($request->getContent(), true);
        $codigoOperador = $raw['codigoOperador'] ?? null;
        if ($codigoOperador) {
            return $em->getRepository(OperadorConfiguracion::class)->apiCalidadImagenEntrega($codigoOperador);
        } else {
            return [
                'error' => true,
                'errorMensaje' => 'Faltan parametros para el consumo de la api'
            ];
        }

    }

    #[Route("/api/operador/datosoperador")]
    public function datosOperador(Request $request, EntityManagerInterface $em)
    {
        $raw = json_decode($request->getContent(), true);
        $codigoOperador = $raw['codigoOperador'] ?? null;
        if ($codigoOperador) {
            return $em->getRepository(Operador::class)->apiDatosOperador($codigoOperador);
        } else {
            return [
                'error' => true,
                'errorMensaje' => 'Faltan parametros para el consumo de la api'
            ];
        }
    }

    #[Route("/api/operador/cambiarConfiguracion")]
    public function cambiarConfiguracion(Request $request, EntityManagerInterface $em)
    {
        $raw = json_decode($request->getContent(), true);
        $codigoOperador = $raw['codigoOperador'] ?? null;
        $calidadImagenEntrega = $raw['calidadImagenEntrega'] ?? null;
        $exigeImagenEntrega = $raw['exigeImagenEntrega'] ?? null;
        $exigeFirmaEntrega = $raw['exigeFirmaEntrega'] ?? null;
        $entregaNovedad = $raw['entregaNovedad'] ?? null;
        if ($codigoOperador) {
            return $em->getRepository(OperadorConfiguracion::class)->apiCambiarConfiguracion($codigoOperador, $calidadImagenEntrega, $exigeImagenEntrega, $exigeFirmaEntrega, $entregaNovedad);
        } else {
            return [
                'error' => true,
                'errorMensaje' => 'Faltan parametros para el consumo de la api'
            ];
        }

    }
}