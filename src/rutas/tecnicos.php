<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->group('/api', function () use ($app) {
    // Versionado de la API
    $app->group('/v1', function () use ($app) {
        $app->get('/tecnicos', 'obtenerTecnicos');
        $app->get('/tecnicos/{id}', 'obtenerTecnico');
        $app->post('/tecnicos/nuevo', 'crearTecnicos');
        $app->post('/tecnicos/actualizar', 'actualizarTecnicos');
        $app->delete('/tecnicos/{id}', 'eliminarTecnicos');
    });
});

function obtenerTecnicos(Request $request, Response $response)
{
    $sql = "SELECT * FROM tecnicos";
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

function obtenerTecnico(Request $request, Response $response)
{
    $id = $request->getAttribute('id');
    $sql = "SELECT * FROM tecnicos WHERE idTecnico= $id";
    try {
        $db = new Conexion();
        $db = $db->conectar();
        $resultado = $db->query($sql);
        if ($resultado->rowCount() > 0) {
            $usuarios = $resultado->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($usuarios);
        } else {
            echo json_encode('no existe ese registro en la BBDD');
        }
        $resultado = null;
        $db = null;
    } catch (PDOException $e) {
        echo '{"error" :{"text":}' . $e->getMessage() . '}';
    }
}

function crearTecnicos(Request $request, Response $response)
{
    $param  = $request->getParsedBody();
    // var_dump($param);
    if (count($param) > 0) {
        foreach ($param as $value) {
            $descripcion_estudio = $value['descripcion_estudio'];
            $idPersona = $value['idPersona'];

            $sql = "INSERT INTO tecnicos (descripcion_estudio,idPersona)
            VALUES (:descripcion_estudio,:idPersona)";
            try {
                $db = new Conexion();
                $db = $db->conectar();
                $resultado = $db->prepare($sql);
                $resultado->bindParam(':descripcion_estudio', $descripcion_estudio);
                $resultado->bindParam(':idPersona', $idPersona);
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

function actualizarTecnicos(Request $request, Response $response)
{
    $param  = $request->getParsedBody();
    if (count($param) > 0) {
        foreach ($param as $value) {
            $idTecnico = $value['idTecnico'];
            $descripcion_estudio = $value['descripcion_estudio'];
            $idPersona = $value['idPersona'];

            $sql = "UPDATE tecnicos SET 
                descripcion_estudio=:descripcion_estudio,
                idPersona=:idPersona
                WHERE idTecnico=:idTecnico
                ";
            try {
                $db = new Conexion();
                $db = $db->conectar();
                $resultado = $db->prepare($sql);
                $resultado->bindParam(':descripcion_estudio', $descripcion_estudio);
                $resultado->bindParam(':idPersona', $idPersona, PDO::PARAM_INT);
                $resultado->bindParam(':idTecnico', $idTecnico, PDO::PARAM_INT);

                $resultado->execute();
                $resultado->execute();
                echo json_encode('actualizacion exitosa.');
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

function eliminarTecnicos(Request $request, Response $response)
{
    $idTecnicos = $request->getAttribute('id');
    $sql = "DELETE FROM tecnicos WHERE idTecnicos=:idTecnicos";
    try {
        $db = new Conexion();
        $db = $db->conectar();
        $resultado = $db->prepare($sql);
        $resultado->bindParam(':idTecnicos', $idTecnicos, PDO::PARAM_INT);
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
