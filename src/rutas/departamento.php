<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->group('/api', function () use ($app) {
    // Versionado de la API
    $app->group('/v1', function () use ($app) {
        $app->get('/departamentos', 'obtenerDepartamentos');
        // $app->get('/corregimiento/{id}', 'obtenerCorregimiento');
    });
});

function obtenerDepartamentos(Request $request, Response $response)
{
    $sql = "SELECT * FROM departamento";
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

// function obtenerCorregimiento(Request $request, Response $response)
// {
//     $id = $request->getAttribute('id');
//     $sql = "SELECT * FROM corregimiento WHERE idcorregimiento= $id";
//     try {
//         $db = new Conexion();
//         $db = $db->conectar();
//         $resultado = $db->query($sql);
//         if ($resultado->rowCount() > 0) {
//             $usuarios = $resultado->fetchAll(PDO::FETCH_OBJ);
//             echo json_encode($usuarios);
//         } else {
//             echo json_encode('no existe este registro en la BBDD');
//         }
//         $resultado = null;
//         $db = null;
//     } catch (PDOException $e) {
//         echo '{"error" :{"text":}' . $e->getMessage() . '}';
//     }
// }
