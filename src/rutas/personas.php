<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

// $f = null;

// var_dump($_SESSION['S_rol']);
// var_dump(isset($_SESSION['S_rol']));


// if (!isset($_SESSION['S_rol'])) {
$app->group('/api', function () use ($app) {
    // Versionado de la API
    $app->group('/v1', function () use ($app) {
        $app->get('/personas', 'obtenerPersonas');
        $app->get('/personas/{id}', 'obtenerPersona');
        $app->post('/personas/nuevo', 'crearPersona');
        $app->post('/personas/actualizar', 'actualizarPersona');
        $app->delete('/personas/{id}', 'eliminarPersona');
    });
});
// }


function obtenerPersonas(Request $request, Response $response)
{
    $sql = "SELECT * FROM persona";
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

function obtenerPersona(Request $request, Response $response)
{
    $id = $request->getAttribute('id');
    $sql = "SELECT * FROM persona WHERE idPersona= $id";
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

function crearPersona(Request $request, Response $response)
{
    $param  = $request->getParsedBody();
    // var_dump($param);
    if (count($param) > 0) {
        foreach ($param as $value) {
            $primer_nombre = $value['primer_nombre'];
            $segundo_nombre = $value['segundo_nombre'];
            $primer_apellido = $value['primer_apellido'];
            $segundo_apellido = $value['segundo_apellido'];
            $tipo_identificacion = $value['tipo_identificacion'];
            $num_identificacion = $value['num_identificacion'];
            $etnia = $value['etnia'];
            $discapacidad = $value['discapacidad'];
            $fecha_ncm = $value['fecha_ncm'];
            $nivel_escolaridad = $value['nivel_escolaridad'];
            $telefono = $value['telefono'];
            $correo = $value['correo'];
            $idUsuario = $value['idUsuario'];

            $sql = "INSERT INTO persona (primer_nombre,segundo_nombre,primer_apellido,segundo_apellido,tipo_identificacion,num_identificacion,etnia,discapacidad,fecha_ncm,nivel_escolaridad,telefono,correo,idUsuario)
            values (:primer_nombre,:segundo_nombre,:primer_apellido,:segundo_apellido,:tipo_identificacion,:num_identificacion,:etnia,:discapacidad,:fecha_ncm,:nivel_escolarida,:telefono,:correo,:idUsuario)";
            try {
                $db = new Conexion();
                $db = $db->conectar();
                $resultado = $db->prepare($sql);
                $resultado->bindParam(':primer_nombre', $primer_nombre);
                $resultado->bindParam(':segundo_nombre', $segundo_nombre);
                $resultado->bindParam(':primer_apellido', $primer_apellido);
                $resultado->bindParam(':segundo_apellido', $segundo_apellido);
                $resultado->bindParam(':tipo_identificacion', $tipo_identificacion);
                $resultado->bindParam(':num_identificacion', $num_identificacion);
                $resultado->bindParam(':etnia', $etnia);
                $resultado->bindParam(':discapacidad', $discapacidad);
                $resultado->bindParam(':fecha_ncm', $fecha_ncm);
                $resultado->bindParam(':nivel_escolarida', $nivel_escolaridad);
                $resultado->bindParam(':telefono', $telefono);
                $resultado->bindParam(':correo', $correo);
                $resultado->bindParam(':idUsuario', $idUsuario);
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

function actualizarPersona(Request $request, Response $response)
{
    $param  = $request->getParsedBody();
    if (count($param) > 0) {
        foreach ($param as $value) {
            $idPersona = $value['idPersona'];
            $primer_nombre = $value['primer_nombre'];
            $segundo_nombre = $value['segundo_nombre'];
            $primer_apellido = $value['primer_apellido'];
            $segundo_apellido = $value['segundo_apellido'];
            $tipo_identificacion = $value['tipo_identificacion'];
            $num_identificacion = $value['num_identificacion'];
            $etnia = $value['etnia'];
            $discapacidad = $value['discapacidad'];
            $fecha_ncm = $value['fecha_ncm'];
            $nivel_escolaridad = $value['nivel_escolaridad'];
            $telefono = $value['telefono'];
            $correo = $value['correo'];
            $idUsuario = $value['idUsuario'];

            $sql = "UPDATE persona SET 
                primer_nombre=:primer_nombre,
                segundo_nombre=:segundo_nombre,
                primer_apellido=:primer_apellido,
                segundo_apellido=:segundo_apellido,
                tipo_identificacion=:tipo_identificacion,
                num_identificacion=:num_identificacion,
                etnia=:etnia,
                discapacidad=:discapacidad,
                fecha_ncm=:fecha_ncm,
                nivel_escolaridad=:nivel_escolaridad,
                telefono=:telefono,
                correo=:correo,
                idUsuario=:idUsuario
                WHERE idPersona=:idPersona
                ";
            try {
                $db = new Conexion();
                $db = $db->conectar();
                $resultado = $db->prepare($sql);
                $resultado->bindParam(':primer_nombre', $primer_nombre);
                $resultado->bindParam(':segundo_nombre', $segundo_nombre);
                $resultado->bindParam(':primer_apellido', $primer_apellido);
                $resultado->bindParam(':segundo_apellido', $segundo_apellido);
                $resultado->bindParam(':tipo_identificacion', $tipo_identificacion);
                $resultado->bindParam(':num_identificacion', $num_identificacion);
                $resultado->bindParam(':etnia', $etnia);
                $resultado->bindParam(':discapacidad', $discapacidad);
                $resultado->bindParam(':fecha_ncm', $fecha_ncm);
                $resultado->bindParam(':nivel_escolaridad', $nivel_escolaridad);
                $resultado->bindParam(':telefono', $telefono);
                $resultado->bindParam(':correo', $correo);
                $resultado->bindParam(':idUsuario', $idUsuario);
                $resultado->bindParam(':idPersona', $idPersona);
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

function eliminarPersona(Request $request, Response $response)
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
