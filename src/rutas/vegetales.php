<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->group('/api', function () use ($app) {
    // Versionado de la API
    $app->group('/v1', function () use ($app) {
        $app->get('/vegetales', 'obtenerVegetales');
        $app->get('/vegetal/{id}', 'obtenerVegetal');
        $app->post('/vegetales/nuevo', 'crearVegetales');
        $app->post('/vegetales/actualizar', 'actualizarVegetales');
        $app->delete('/vegetales/{id}', 'eliminarVegetales');
    });
});

function obtenerVegetales(Request $request, Response $response)
{
    $sql = "SELECT * FROM plantaciones";
    try {
        $db = new Conexion();
        $db = $db->conectar();
        $resultado = $db->query($sql);
        if ($resultado->rowCount() > 0) {
            $usuarios = $resultado->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($usuarios);
            // return $response . json_encode($usuarios);
        } else {
            echo json_encode('no existen datos en la BBDD');
        }
        $resultado = null;
        $db = null;
    } catch (PDOException $e) {
        echo '{"error" :{"text":}' . $e->getMessage() . '}';
    }
}

function obtenerVegetal(Request $request, Response $response)
{
    $id = $request->getAttribute('id');
    $sql = "SELECT * FROM plantaciones WHERE idPlantaciones= $id";
    try {
        $db = new Conexion();
        $db = $db->conectar();
        $resultado = $db->query($sql);
        if ($resultado->rowCount() > 0) {
            $usuarios = $resultado->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($usuarios);
        } else {
            echo json_encode('no existe este registro en la BBDD');
        }
        $resultado = null;
        $db = null;
    } catch (PDOException $e) {
        echo '{"error" :{"text":}' . $e->getMessage() . '}';
    }
}

function crearVegetales(Request $request, Response $response)
{
    $param  = $request->getParsedBody();
    // var_dump($param);
    if (count($param) > 0) {
        foreach ($param as $value) {
            $nombre = $value['nombre'];
            $tipo = $value['tipo'];
            $vegetales_cantidad = $value['vegetales_cantidad'];
            $informacion = $value['informacion'];
            $idFinca = $value['idFinca'];

            $sql = "INSERT INTO
             plantaciones (
                            nombre,
                            tipo,
                            vegetales_cantidad,
                            informacion,
                            idFinca
                            )
                            values (
                            :nombre,
                            :tipo,
                            :vegetales_cantidad,
                            :informacion,
                            :idFinca
                            )";
            try {
                $db = new Conexion();
                $db = $db->conectar();
                $resultado = $db->prepare($sql);
                $resultado->bindParam(':nombre', $nombre);
                $resultado->bindParam(':tipo', $tipo);
                $resultado->bindParam(':vegetales_cantidad', $vegetales_cantidad);
                $resultado->bindParam(':informacion', $informacion);
                $resultado->bindParam(':idFinca', $idFinca, PDO::PARAM_INT);
                $resultado->execute();
                echo json_encode('success');
                $resultado = null;
                $db = null;
            } catch (PDOException $e) {
                echo '{"error" :{"text":}' . $e->getMessage() . '}';
            }
        }
    } else {
        echo '{"error" :{"text":"Envio un Array vacio.","longitud":"0"}}';
    }
}

function actualizarVegetales(Request $request, Response $response)
{
    $param  = $request->getParsedBody();
    // var_dump($param);
    if (count($param) > 0) {
        foreach ($param as $value) {
            $idPlantaciones = $value['idPlantaciones'];
            $nombre = $value['nombre'];
            $tipo = $value['tipo'];
            $vegetales_cantidad = $value['vegetales_cantidad'];
            $informacion = $value['informacion'];
            $idFinca = $value['idFinca'];

            $sql = "UPDATE plantaciones SET 
            nombre=:nombre,
            tipo=:tipo,
            vegetales_cantidad=:vegetales_cantidad,
            informacion=:informacion,
            idFinca=:idFinca
            WHERE idPlantaciones=:idPlantaciones
            ";
            try {
                $db = new Conexion();
                $db = $db->conectar();
                $resultado = $db->prepare($sql);
                $resultado->bindParam(':idPlantaciones', $idPlantaciones);
                $resultado->bindParam(':nombre', $nombre);
                $resultado->bindParam(':tipo', $tipo);
                $resultado->bindParam(':vegetales_cantidad', $vegetales_cantidad);
                $resultado->bindParam(':informacion', $informacion);
                $resultado->bindParam(':idFinca', $idFinca, PDO::PARAM_INT);
                $resultado->execute();
                echo json_encode('success');
                $resultado = null;
                $db = null;
            } catch (PDOException $e) {
                echo '{"error" :{"text":}' . $e->getMessage() . '}';
            }
        }
    } else {
        echo '{"error" :{"text":"Envio un Array vacio.","longitud":"0"}}';
    }
}

function eliminarVegetales(Request $request, Response $response)
{
    $idPlantaciones = $request->getAttribute('id');
    $sql = "DELETE FROM plantaciones WHERE 	idPlantaciones=:idPlantaciones";
    try {
        $db = new Conexion();
        $db = $db->conectar();
        $resultado = $db->prepare($sql);
        $resultado->bindParam(':idPlantaciones', $idPlantaciones, PDO::PARAM_INT);
        $resultado->execute();

        if ($resultado->rowCount() > 0) {
            echo json_encode('Registro eliminado');
        } else {
            echo json_encode('no existe registro con ese id');
        }

        $resultado = null;
        $db = null;
    } catch (PDOException $e) {
        echo '{"error" :{"text":}' . $e->getMessage() . '}';
    }
}
