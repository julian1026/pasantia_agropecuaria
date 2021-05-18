<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->group('/api', function () use ($app) {
    // Versionado de la API
    $app->group('/v1', function () use ($app) {
        $app->get('/visitasFincas', 'obtenerVisitasFincas');
        $app->get('/visitasFinca/{id}', 'obtenerVisitaFinca');
        $app->post('/visitasFincas/nuevo', 'crearVisitasFincas');
        $app->post('/visitasFincas/actualizar', 'actualizarVisitasFinca');
        $app->delete('/visitaFinca/{id}', 'eliminarVisitaFinca');
    });
});

function obtenerVisitasFincas(Request $request, Response $response)
{
    $sql = "SELECT * FROM visitas_fincas";
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

function obtenerVisitaFinca(Request $request, Response $response)
{
    $id = $request->getAttribute('id');
    $sql = "SELECT * FROM visitas_fincas WHERE idvisitas= $id";
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

function crearVisitasFincas(Request $request, Response $response)
{
    $param  = $request->getParsedBody();
    if (count($param) > 0) {
        foreach ($param as $value) {
            $fecha = $value['fecha'];
            $objetivoVisita = $value['objetivoVisita'];
            $sistemasProduccion = $value['sistemasProduccion'];
            $situacionEncontrada = $value['situacionEncontrada'];
            $actividadRealizada = $value['actividadRealizada'];
            $actividadPendientes = $value['actividadPendientes'];
            $R_idPersona = $value['R_idPersona'];
            $idFinca = $value['idFinca'];

            $sql = "INSERT INTO visitas_fincas (
                fecha,
                objetivoVisita,
                sistemasProduccion,
                situacionEncontrada,
                actividadRealizada,
                actividadPendientes,
                R_idPersona,
                idFinca
                )
            VALUES (
                :fecha,
                :objetivoVisita,
                :sistemasProduccion,
                :situacionEncontrada,
                :actividadRealizada,
                :actividadPendientes,
                :R_idPersona,
                :idFinca
                    )";
            try {
                $db = new Conexion();
                $db = $db->conectar();
                $resultado = $db->prepare($sql);

                $resultado->bindParam(':fecha', $fecha);
                $resultado->bindParam(':objetivoVisita', $objetivoVisita);
                $resultado->bindParam(':sistemasProduccion', $sistemasProduccion);
                $resultado->bindParam(':situacionEncontrada', $situacionEncontrada);
                $resultado->bindParam(':actividadRealizada', $actividadRealizada);
                $resultado->bindParam(':actividadPendientes', $actividadPendientes);
                $resultado->bindParam(':R_idPersona', $R_idPersona);
                $resultado->bindParam(':idFinca', $idFinca);
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

function actualizarVisitasFinca(Request $request, Response $response)
{
    $param  = $request->getParsedBody();
    if (count($param) > 0) {
        foreach ($param as $value) {
            $idvistas = $value['idvisitas'];
            $fecha = $value['fecha'];
            $objetivoVisita = $value['objetivoVisita'];
            $sistemasProduccion = $value['sistemasProduccion'];
            $situacionEncontrada = $value['situacionEncontrada'];
            $actividadRealizada = $value['actividadRealizada'];
            $actividadPendientes = $value['actividadPendientes'];
            $R_idPersona = $value['R_idPersona'];
            $idFinca = $value['idFinca'];

            $sql = "UPDATE visitas_fincas SET 
                fecha=:fecha,
                objetivoVisita=:objetivoVisita,
                sistemasProduccion=:sistemasProduccion,
                situacionEncontrada=:situacionEncontrada,
                actividadRealizada=:actividadRealizada,
                actividadPendientes=:actividadPendientes,
                R_idPersona=:R_idPersona,
                idFinca=:idFinca
                WHERE idvisitas=:idvisitas
                ";
            try {
                $db = new Conexion();
                $db = $db->conectar();
                $resultado = $db->prepare($sql);

                $resultado->bindParam(':idvisitas', $idvistas);
                $resultado->bindParam(':fecha', $fecha);
                $resultado->bindParam(':objetivoVisita', $objetivoVisita);
                $resultado->bindParam(':sistemasProduccion', $sistemasProduccion);
                $resultado->bindParam(':situacionEncontrada', $situacionEncontrada);
                $resultado->bindParam(':actividadRealizada', $actividadRealizada);
                $resultado->bindParam(':actividadPendientes', $actividadPendientes);
                $resultado->bindParam(':R_idPersona', $R_idPersona);
                $resultado->bindParam(':idFinca', $idFinca);

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

function eliminarVisitaFinca(Request $request, Response $response)
{
    $idVisitas = $request->getAttribute('id');
    $sql = "DELETE FROM visitas_fincas WHERE idvisitas=:idvisitas";
    try {
        $db = new Conexion();
        $db = $db->conectar();
        $resultado = $db->prepare($sql);
        $resultado->bindParam(':idvisitas', $idVisitas, PDO::PARAM_INT);
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
