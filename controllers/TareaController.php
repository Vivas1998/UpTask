<?php

namespace Controllers;

use Model\Proyecto;
use Model\Tarea;

class TareaController {
    public static function index() {
        session_start();
        $proyectoId = $_GET['id'];

        if(!$proyectoId) header('Location: /dashboard');

        $proyecto = Proyecto::where('url', $proyectoId);
        if(!$proyecto || $proyecto->propietarioId !== $_SESSION['id']) header('Location: /404');
        
        $tareas = Tarea::belongTo('proyectoId', $proyecto->id);
        
        echo json_encode(['tareas' => $tareas]);
    }

    public static function crear() {

        if($_SERVER['REQUEST_METHOD']) {
            session_start();
            $proyecto = Proyecto::where('url', $_POST['proyectoId']);

            if(!$proyecto || $proyecto->propietarioId !== $_SESSION['id']) {
                $respuesta = [
                    'tipo' => 'error',
                    'mensaje' => 'Hubo un error al agregar la tarea'
                ];
                echo json_encode($respuesta);
                return;
            }

            $tarea = new Tarea($_POST);
            $tarea->proyectoId = $proyecto->id;
            $resultado = $tarea->guardar();

            $respuesta = [
                'tipo' => 'exito',
                'id' => $resultado['id'],
                'mensaje' => 'Tarea creada correctamente',
                'proyectoId' => $proyecto->id
            ];
            echo json_encode($respuesta);
            
        }
    }

    public static function actualizar() {

        if($_SERVER['REQUEST_METHOD']) {
            session_start();
            $proyecto = Proyecto::where('url', $_POST['proyectoId']);
            if(!$proyecto || $proyecto->propietarioId !== $_SESSION['id']) {
                $respuesta = [
                    'tipo' => 'error',
                    'mensaje' => 'Hubo un error al actualizar la tarea'
                ];
                echo json_encode(['resupuesta' => $respuesta]);
                return;
            }

            $tarea = new Tarea($_POST);
            $tarea->proyectoId = $proyecto->id;

            $resultado = $tarea->guardar();

            $resultado = [
                'tipo' => 'exito',
                'id' => $tarea->id,
                'proyectoId' => $proyecto->id,
                'mensaje' => 'Actualizado Correctamente'
            ];
            echo json_encode(['respuesta' => $resultado]);
        }
    }

    public static function eliminar() {

        if($_SERVER['REQUEST_METHOD']) {
            session_start();
            $proyecto = Proyecto::where('url', $_POST['proyectoId']);
            if(!$proyecto || $proyecto->propietarioId !== $_SESSION['id']) {
                $respuesta = [
                    'tipo' => 'error',
                    'mensaje' => 'Hubo un error al actualizar la tarea'
                ];
                echo json_encode(['resupuesta' => $respuesta]);
                return;
            }

            $tarea = new Tarea($_POST);
            $resultado = $tarea->eliminar();

            $resultado = [
                'tipo' => 'exito',
                'id' => $tarea->id,
                'mensaje' => 'Eliminado Correctamente'
            ];
            echo json_encode(['respuesta' => $resultado]);
        }
    }
}