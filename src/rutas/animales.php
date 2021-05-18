<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->group('/api', function () use ($app) {
    // Versionado de la API
    $app->group('/v1', function () use ($app) {
        $app->get('/animales', 'obtenerAnimales');
        $app->get('/animales/{id}', 'obtenerAnimal');
        $app->post('/animales/nuevo', 'crearAnimales');
        $app->post('/animales/actualizar', 'actualizarAnimales');
        $app->delete('/animales/{id}', 'eliminarAnimales');
    });
});

function obtenerAnimales(Request $request, Response $response)
{
    $sql = "SELECT * FROM animales";
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

function obtenerAnimal(Request $request, Response $response)
{
    $id = $request->getAttribute('id');
    $sql = "SELECT * FROM animales WHERE idAnimales= $id";
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

function crearAnimales(Request $request, Response $response)
{
    $param  = $request->getParsedBody();
    // var_dump($param);
    if (count($param) > 0) {
        foreach ($param as $value) {
            $tipo = $value['tipo'];
            $raza = $value['raza'];
            $nombre_vacunas = $value['nombre_vacunas'];
            $cantidad_animales = $value['cantidad_animales'];
            $informacion = $value['informacion'];
            $idFinca = $value['idFinca'];

            $sql = "INSERT INTO animales (tipo,raza,nombre_vacunas,cantidad_animales,informacion,idFinca)
            values (:tipo,
            :raza,
            :nombre_vacunas,
            :cantidad_animales,
            :informacion,
            :idFinca
            )";
            try {
                $db = new Conexion();
                $db = $db->conectar();
                $resultado = $db->prepare($sql);
                $resultado->bindParam(':tipo', $tipo);
                $resultado->bindParam(':raza', $raza);
                $resultado->bindParam(':nombre_vacunas', $nombre_vacunas);
                $resultado->bindParam(':cantidad_animales', $cantidad_animales, PDO::PARAM_INT);
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

function actualizarAnimales(Request $request, Response $response)
{
    $param  = $request->getParsedBody();
    // var_dump($param);
    if (count($param) > 0) {
        foreach ($param as $value) {
            $idAnimales = $value['idAnimales'];
            $tipo = $value['tipo'];
            $raza = $value['raza'];
            $nombre_vacunas = $value['nombre_vacunas'];
            $cantidad_animales = $value['cantidad_animales'];
            $informacion = $value['informacion'];
            $idFinca = $value['idFinca'];

            $sql = "UPDATE animales SET 
            tipo=:tipo,
            raza=:raza,
            nombre_vacunas=:nombre_vacunas,
            cantidad_animales=:cantidad_animales,
            informacion=:informacion,
            idFinca=:idFinca
            WHERE idAnimales=:idAnimales
            ";
            try {
                $db = new Conexion();
                $db = $db->conectar();
                $resultado = $db->prepare($sql);
                $resultado->bindParam(':tipo', $tipo);
                $resultado->bindParam(':raza', $raza);
                $resultado->bindParam(':nombre_vacunas', $nombre_vacunas, PDO::PARAM_INT);
                $resultado->bindParam(':cantidad_animales', $cantidad_animales, PDO::PARAM_INT);
                $resultado->bindParam(':informacion', $informacion, PDO::PARAM_INT);
                $resultado->bindParam(':idFinca', $idFinca, PDO::PARAM_INT);
                $resultado->bindParam(':idAnimales', $idAnimales, PDO::PARAM_INT);
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

function eliminarAnimales(Request $request, Response $response)
{
    $idPersona = $request->getAttribute('id');
    $sql = "DELETE FROM animales WHERE 	idAnimales=:idAnimales";
    try {
        $db = new Conexion();
        $db = $db->conectar();
        $resultado = $db->prepare($sql);
        $resultado->bindParam(':idAnimales', $idAnimales, PDO::PARAM_INT);
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
