<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->group('/api', function () use ($app) {
    // Versionado de la API
    $app->group('/v1', function () use ($app) {
        $app->get('/fincas', 'obtenerFincas');
        $app->get('/fincas/{id}', 'obtenerFinca');
        $app->post('/fincas/nuevo', 'crearFinca');
        $app->post('/fincas/actualizar', 'actualizarFinca');
        $app->delete('/fincas/{id}', 'eliminarFinca');
    });
});

function obtenerFincas(Request $request, Response $response)
{
    $sql = "SELECT * FROM finca";
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

function obtenerFinca(Request $request, Response $response)
{
    $id = $request->getAttribute('id');
    $sql = "SELECT * FROM finca WHERE idFinca= $id";
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

function crearFinca(Request $request, Response $response)
{
    $param  = $request->getParsedBody();
    // var_dump($param);
    if (count($param) > 0) {
        foreach ($param as $value) {
            $nombre_finca = $value['nombre_finca'];
            $hectareas = $value['hectareas'];
            $ab_agua = $value['ab_agua'];
            $e_electrica = $value['e_electrica'];
            $e_alternativas = $value['e_alternativas'];
            $s_sanitario = $value['s_sanitario'];
            $latitud = $value['latitud'];
            $longitud = $value['longitud'];
            $registrador = $value['registrador'];
            $id_linea_pro1 = $value['id_linea_pro1'];
            $id_linea_pro2 = $value['id_linea_pro2'];
            $id_linea_pro3 = $value['id_linea_pro3'];
            $idAgricultor = $value['idAgricultor'];
            $id_Vereda = $value['id_Vereda'];

            $sql = "INSERT INTO finca (nombre_finca,hectareas,ab_agua,e_electrica,e_alternativas,s_sanitario,
            latitud,longitud,registrador,id_linea_pro1,id_linea_pro2,id_linea_pro3,idAgricultor,id_Vereda)
            values (:nombre_finca,
            :hectareas,
            :ab_agua,
            :e_electrica,
            :e_alternativas,
            :s_sanitario,
            :latitud,
            :longitud,
            :registrador,
            :id_linea_pro1,
            :id_linea_pro2,
            :id_linea_pro3,
            :idAgricultor,
            :id_Vereda
            )";
            try {
                $db = new Conexion();
                $db = $db->conectar();
                $resultado = $db->prepare($sql);
                $resultado->bindParam(':nombre_finca', $nombre_finca);
                $resultado->bindParam(':hectareas', $hectareas);
                $resultado->bindParam(':ab_agua', $ab_agua, PDO::PARAM_INT);
                $resultado->bindParam(':e_electrica', $e_electrica, PDO::PARAM_INT);
                $resultado->bindParam(':e_alternativas', $e_alternativas, PDO::PARAM_INT);
                $resultado->bindParam(':s_sanitario', $s_sanitario, PDO::PARAM_INT);
                $resultado->bindParam(':latitud', $latitud);
                $resultado->bindParam(':longitud', $longitud);
                $resultado->bindParam(':registrador', $registrador);
                $resultado->bindParam(':id_linea_pro1', $id_linea_pro1);
                $resultado->bindParam(':id_linea_pro2', $id_linea_pro2);
                $resultado->bindParam(':id_linea_pro3', $id_linea_pro3);
                $resultado->bindParam(':idAgricultor', $idAgricultor);
                $resultado->bindParam(':id_Vereda', $id_Vereda);
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

function actualizarFinca(Request $request, Response $response)
{
    $param  = $request->getParsedBody();
    // var_dump($param);
    if (count($param) > 0) {
        foreach ($param as $value) {
            $idFinca = $value['idFinca'];
            $nombre_finca = $value['nombre_finca'];
            $hectareas = $value['hectareas'];
            $ab_agua = $value['ab_agua'];
            $e_electrica = $value['e_electrica'];
            $e_alternativas = $value['e_alternativas'];
            $s_sanitario = $value['s_sanitario'];
            $latitud = $value['latitud'];
            $longitud = $value['longitud'];
            $registrador = $value['registrador'];
            $id_linea_pro1 = $value['id_linea_pro1'];
            $id_linea_pro2 = $value['id_linea_pro2'];
            $id_linea_pro3 = $value['id_linea_pro3'];
            $idAgricultor = $value['idAgricultor'];
            $id_Vereda = $value['id_Vereda'];

            $sql = "UPDATE finca SET 
            nombre_finca=:nombre_finca,
            hectareas=:hectareas,
            ab_agua=:ab_agua,
            e_electrica=:e_electrica,
            e_alternativas=:e_alternativas,
            s_sanitario=:s_sanitario,
            latitud=:latitud,
            longitud=:longitud,
            registrador=:registrador,
            id_linea_pro1=:id_linea_pro1,
            id_linea_pro2=:id_linea_pro2,
            id_linea_pro3=:id_linea_pro3,
            idAgricultor=:idAgricultor,
            id_Vereda=:id_Vereda
            WHERE idFinca=:idFinca
            ";
            try {
                $db = new Conexion();
                $db = $db->conectar();
                $resultado = $db->prepare($sql);
                $resultado->bindParam(':nombre_finca', $nombre_finca);
                $resultado->bindParam(':hectareas', $hectareas);
                $resultado->bindParam(':ab_agua', $ab_agua, PDO::PARAM_INT);
                $resultado->bindParam(':e_electrica', $e_electrica, PDO::PARAM_INT);
                $resultado->bindParam(':e_alternativas', $e_alternativas, PDO::PARAM_INT);
                $resultado->bindParam(':s_sanitario', $s_sanitario, PDO::PARAM_INT);
                $resultado->bindParam(':latitud', $latitud);
                $resultado->bindParam(':longitud', $longitud);
                $resultado->bindParam(':registrador', $registrador);
                $resultado->bindParam(':id_linea_pro1', $id_linea_pro1, PDO::PARAM_INT);
                $resultado->bindParam(':id_linea_pro2', $id_linea_pro2, PDO::PARAM_INT);
                $resultado->bindParam(':id_linea_pro3', $id_linea_pro3, PDO::PARAM_INT);
                $resultado->bindParam(':idAgricultor', $idAgricultor, PDO::PARAM_INT);
                $resultado->bindParam(':id_Vereda', $id_Vereda, PDO::PARAM_INT);
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

function eliminarFinca(Request $request, Response $response)
{
    $idPersona = $request->getAttribute('id');
    $sql = "DELETE FROM persona WHERE idPersona=:idPersona";
    try {
        $db = new Conexion();
        $db = $db->conectar();
        $resultado = $db->prepare($sql);
        $resultado->bindParam(':idPersona', $idPersona, PDO::PARAM_INT);
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
