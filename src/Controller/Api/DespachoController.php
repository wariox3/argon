<?php


namespace App\Controller\Api;

use App\Entity\Caso;
use App\Entity\Despacho;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DespachoController extends AbstractFOSRestController
{

    #[Route("/api/despacho/nuevo")]
    public function nuevo(Request $request, EntityManagerInterface $em)
    {
        $raw = json_decode($request->getContent(), true);
        $codigoUsuario = $raw['codigoUsuario']?? null;
        $operador = $raw['operador']?? null;
        $codigoDespacho = $raw['codigoDespacho']?? null;
        $token = $raw['token']?? null;
        if($codigoUsuario && $operador && $codigoDespacho && $token) {
            return $em->getRepository(Despacho::class)->apiNuevo($codigoUsuario, $operador, $codigoDespacho, $token);
        } else {
            return [
                'error' => true,
                'errorMensaje' => 'Faltan parametros para el consumo de la api'
            ];
        }
    }

    #[Route("/api/despacho/nuevo/desconetado")]
    public function nuevoDesconectado(Request $request, EntityManagerInterface $em)
    {
        $raw = json_decode($request->getContent(), true);
        $codigoUsuario = $raw['codigoUsuario']?? null;
        $operador = $raw['operador']?? null;
        $codigoDespacho = $raw['codigoDespacho']?? null;
        $token = $raw['token']?? null;
        if($codigoUsuario && $operador && $codigoDespacho && $token) {
            return $em->getRepository(Despacho::class)->apiNuevoDesconectado($codigoUsuario, $operador, $codigoDespacho, $token);
        } else {
            return [
                'error' => true,
                'errorMensaje' => 'Faltan parametros para el consumo de la api'
            ];
        }
    }

    #[Route("/api/despacho/lista")]
    public function lista(Request $request, EntityManagerInterface $em)
    {
        $raw = json_decode($request->getContent(), true);
        $codigoUsuario = $raw['codigoUsuario']?? null;
        if($codigoUsuario) {
            return $em->getRepository(Despacho::class)->apiLista($codigoUsuario);
        } else {
            return [
                'error' => true,
                'errorMensaje' => 'Faltan parametros para el consumo de la api'];
        }
    }

    #[Route("/api/despacho/detalle")]
    public function detalle(Request $request, EntityManagerInterface $em)
    {
        $raw = json_decode($request->getContent(), true);
        $codigoDespacho = $raw['codigoDespacho']?? null;
        if($codigoDespacho) {
            return $em->getRepository(Despacho::class)->apiDetalle($codigoDespacho);
        } else {
            return [
                'error' => true,
                'errorMensaje' => 'Faltan parametros para el consumo de la api'];
        }
    }

    #[Route("/api/despacho/entrega")]
    public function entrega(Request $request, EntityManagerInterface $em)
    {
        $raw = json_decode($request->getContent(), true);
        $codigoDespacho = $raw['codigoDespacho']?? null;
        $fecha = $raw['fecha']??null;
        $hora = $raw['hora']??null;
        if($codigoDespacho && $fecha && $hora) {
            return $em->getRepository(Despacho::class)->apiEntrega($codigoDespacho, $fecha, $hora);
        } else {
            return [
                'error' => true,
                'errorMensaje' => 'Faltan parametros para el consumo de la api'];
        }
    }

    #[Route("/api/despacho/guias")]
    public function guias(Request $request, EntityManagerInterface $em)
    {
        $raw = json_decode($request->getContent(), true);
        $codigoDespacho = $raw['codigoDespacho']?? null;
        if($codigoDespacho) {
            return $em->getRepository(Despacho::class)->apiGuias($codigoDespacho);
        } else {
            return [
                'error' => true,
                'errorMensaje' => 'Faltan parametros para el consumo de la api'];
        }
    }

    #[Route("/api/despacho/guia/entrega/pendiente")]
    public function guiaEntregaPendiente(Request $request, EntityManagerInterface $em)
    {
        $raw = json_decode($request->getContent(), true);
        $codigoDespacho = $raw['codigoDespacho']?? null;
        if($codigoDespacho) {
            return $em->getRepository(Despacho::class)->apiGuiaEntregaPendiente($codigoDespacho);
        } else {
            return [
                'error' => true,
                'errorMensaje' => 'Faltan parametros para el consumo de la api'];
        }
    }

    #[Route("/api/despacho/guia/recogido/detalle")]
    public function guiaRecogidoDetalle(Request $request, EntityManagerInterface $em)
    {
        $raw = json_decode($request->getContent(), true);
        $codigoDespacho = $raw['codigoDespacho']?? null;
        $guia = $raw['codigoGuia']?? null;
        if($codigoDespacho && $guia) {
            return $em->getRepository(Despacho::class)->apiGuiaRecogidoDetalle($codigoDespacho, $guia);
        } else {
            return [
                'error' => true,
                'errorMensaje' => 'Faltan parametros para el consumo de la api'];
        }
    }

    #[Route("/api/despacho/guia/recogido")]
    public function guiaRecogido(Request $request, EntityManagerInterface $em)
    {
        $raw = json_decode($request->getContent(), true);
        $codigoDespacho = $raw['codigoDespacho']?? null;
        $guia = $raw['codigoGuia']?? null;
        $usuario = $raw['usuario']?? null;
        $unidades = $raw['unidades']?? 0;
        if($codigoDespacho && $guia && $usuario) {
            return $em->getRepository(Despacho::class)->apiGuiaRecogido($codigoDespacho, $guia, $usuario, $unidades);
        } else {
            return [
                'error' => true,
                'errorMensaje' => 'Faltan parametros para el consumo de la api'];
        }
    }

    #[Route("/api/despacho/guia/entrega")]
    public function guiaEntrega(Request $request, EntityManagerInterface $em)
    {
        $raw = json_decode($request->getContent(), true);
        $codigoDespacho = $raw['codigoDespacho']?? null;
        $guia = $raw['codigoGuia']?? null;
        $usuario = $raw['usuario']?? null;
        $imagenes = $raw['imagenes']?? null;
        $ubicacion  = $raw['ubicacion']?? null;
        $firma = $raw['firmarBase64']?? null;
        $recibe = $raw['recibe'] ?? null;
        $recibeParentesco = $raw['parentesco'] ?? null;
        $recibeNumeroIdentificacion = $raw['numeroIdentificacion'] ?? null;
        $recibeCelular = $raw['celular'] ?? null;
        $fechaEntrega = $raw['fechaEntrega'] ?? null;
        if($codigoDespacho && $guia && $usuario) {
            return $em->getRepository(Despacho::class)->apiGuiaEntrega($codigoDespacho, $guia, $usuario, $imagenes, $ubicacion, $firma, $recibe, $recibeParentesco, $recibeNumeroIdentificacion, $recibeCelular, $fechaEntrega);
        } else {
            return [
                'error' => true,
                'errorMensaje' => 'Faltan parametros para el consumo de la api'];
        }
    }

    #[Route("/api/despacho/guia/novedadtipo/lista")]
    public function guiaNovedadTipoLista(Request $request, EntityManagerInterface $em)
    {
        $raw = json_decode($request->getContent(), true);
        $codigoDespacho = $raw['codigoDespacho']?? null;
        if($codigoDespacho) {
            return $em->getRepository(Despacho::class)->apiGuiaNovedadTipoLista($codigoDespacho);
        } else {
            return [
                'error' => true,
                'errorMensaje' => 'Faltan parametros para el consumo de la api'];
        }
    }

    #[Route("/api/despacho/guia/novedad/nuevo")]
    public function guiaNovedadNuevo(Request $request, EntityManagerInterface $em)
    {
        $raw = json_decode($request->getContent(), true);
        $codigoDespacho = $raw['codigoDespacho']?? null;
        $codigoGuia = $raw['codigoGuia'] ?? null;
        $codigoNovedadTipo = $raw['codigoNovedadTipo'] ?? null;
        $descripcion = $raw['descripcion'] ?? null;
        $usuario = $raw['usuario'] ?? null;
        if($codigoDespacho && $codigoGuia && $codigoNovedadTipo) {
            return $em->getRepository(Despacho::class)->apiGuiaNovedadNuevo($codigoDespacho, $codigoGuia, $codigoNovedadTipo, $descripcion, $usuario);
        } else {
            return [
                'error' => true,
                'errorMensaje' => 'Faltan parametros para el consumo de la api'];
        }
    }

    #[Route("/api/despacho/monitoreo/detalle/nuevo")]
    public function monitoreoDetalleNuevo(Request $request, EntityManagerInterface $em)
    {
        $raw = json_decode($request->getContent(), true);
        $codigoDespacho = $raw['codigoDespacho']?? null;
        $comentario = $raw['comentario']?? null;
        $usuario = $raw['usuario']?? null;
        $ubicacion  = $raw['ubicacion']?? null;
        if($codigoDespacho && $usuario) {
            return $em->getRepository(Despacho::class)->apiMonitoreoDetalleNuevo($codigoDespacho, $usuario, $ubicacion, $comentario);
        } else {
            return [
                'error' => true,
                'errorMensaje' => 'Faltan parametros para el consumo de la api'];
        }
    }

}