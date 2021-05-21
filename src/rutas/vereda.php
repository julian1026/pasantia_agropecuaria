<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->group('/api', function () use ($app) {
    // Versionado de la API
    $app->group('/v1', function () use ($app) {
        $app->get('/vereda', 'obtenerVeredas');
        // $app->get('/vereda/{id}', 'obtenerVereda');
    });
});

function obtenerVeredas(Request $request, Response $response)
{
    $sql = "SELECT * FROM vereda";
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

// function obtenerVereda(Request $request, Response $response)
// {
//     $id = $request->getAttribute('id');
//     $sql = "SELECT * FROM vereda WHERE idvereda= $id";
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
