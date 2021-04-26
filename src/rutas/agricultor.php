<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->group('/api', function () use ($app) {
    // Versionado de la API
    $app->group('/v1', function () use ($app) {
        $app->get('/agricultores', 'obtenerAgricultores');
        $app->get('/agricultores/{id}', 'obtenerAgricultor');
        $app->post('/agricultores/nuevo', 'crearAgricultores');
        $app->post('/agricultores/actualizar', 'actualizarAgricultores');
        $app->delete('/agricultor/{id}', 'eliminarAgricultor');
    });
});

function obtenerAgricultores(Request $request, Response $response)
{
    $sql = "SELECT * FROM agricultor";
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

function obtenerAgricultor(Request $request, Response $response)
{
    $id = $request->getAttribute('id');
    $sql = "SELECT * FROM agricultor WHERE idAgricultor= $id";
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

function crearAgricultores(Request $request, Response $response)
{
    $param  = $request->getParsedBody();
    if (count($param) > 0) {
        foreach ($param as $value) {
            $personasAcargo = $value['personasAcargo'];
            $idPersona = $value['idPersona'];

            $sql = "INSERT INTO agricultor (personasAcargo,idPersona)
            VALUES (:personasAcargo,:idPersona)";
            try {
                $db = new Conexion();
                $db = $db->conectar();
                $resultado = $db->prepare($sql);
                $resultado->bindParam(':personasAcargo', $personasAcargo);
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

function actualizarAgricultores(Request $request, Response $response)
{
    $param  = $request->getParsedBody();
    if (count($param) > 0) {
        foreach ($param as $value) {
            $idAgricultor = $value['idAgricultor'];
            $personasAcargo = $value['personasAcargo'];
            $idPersona = $value['idPersona'];

            $sql = "UPDATE agricultor SET 
                personasAcargo=:personasAcargo,
                idPersona=:idPersona
                WHERE idAgricultor=:idAgricultor
                ";
            try {
                $db = new Conexion();
                $db = $db->conectar();
                $resultado = $db->prepare($sql);
                $resultado->bindParam(':personasAcargo', $personasAcargo);
                $resultado->bindParam(':idPersona', $idPersona, PDO::PARAM_INT);
                $resultado->bindParam(':idAgricultor', $idAgricultor, PDO::PARAM_INT);

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

function eliminarAgricultor(Request $request, Response $response)
{
    $idAgricultor = $request->getAttribute('id');
    $sql = "DELETE FROM agricultor WHERE idAgricultor=:idAgricultor";
    try {
        $db = new Conexion();
        $db = $db->conectar();
        $resultado = $db->prepare($sql);
        $resultado->bindParam(':idAgricultor', $idAgricultor, PDO::PARAM_INT);
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
