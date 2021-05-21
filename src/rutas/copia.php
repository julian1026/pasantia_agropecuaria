<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app = new \Slim\App;





//get obtener todos los usuarios
$app->get('/api/usuarios', function (Request $request, Response $response) {
    $sql = "SELECT * FROM usuario";
    try {
        $db = new Conexion();
        $db = $db->conectar();
        $resultado = $db->query($sql);
        if ($resultado->rowCount() > 0) {
            $usuarios = $resultado->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($usuarios);
        } else {
            echo json_encode('no existen usuarios en la BBDD');
        }
        $resultado = null;
        $db = null;
    } catch (PDOException $e) {
        echo '{"error" :{"text":}' . $e->getMessage() . '}';
    }
});


//get obtener usuario por id
$app->get('/api/usuarios/{id}', function (Request $request, Response $response) {
    $id_usuario = $request->getAttribute('id');
    $sql = "SELECT * FROM usuario WHERE idUsuario= $id_usuario";
    try {
        $db = new Conexion();
        $db = $db->conectar();
        $resultado = $db->query($sql);
        if ($resultado->rowCount() > 0) {
            $usuarios = $resultado->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($usuarios);
        } else {
            echo json_encode('no existe usuario en la BBDD');
        }
        $resultado = null;
        $db = null;
    } catch (PDOException $e) {
        echo '{"error" :{"text":}' . $e->getMessage() . '}';
    }
});


//post crear nuevo usuario
$app->post('/api/usuarios/nuevo', function (Request $request, Response $response) {

    $param  = $request->getParsedBody();
    // var_dump($param);
    if (count($param) > 0) {
        foreach ($param as $value) {
            $usuario = $value['usuario'];
            $contrasena = md5($value['contrasena']);
            $idRol = $value['idRol'];
            $estado = 'ACTIVO';
            var_dump($contrasena);
            $sql = "INSERT INTO usuario (user_name,contrasena,estado,idRol)
            values (:usuario,:contrasena,:estado,:idRol)";
            try {
                $db = new Conexion();
                $db = $db->conectar();
                $resultado = $db->prepare($sql);
                $resultado->bindParam(':usuario', $usuario);
                $resultado->bindParam(':contrasena', $contrasena);
                $resultado->bindParam(':estado', $estado);
                $resultado->bindParam(':idRol', $idRol, PDO::PARAM_INT);
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
});


//put modificar usuario
$app->put('/api/usuarios/modificar/{id}', function (Request $request, Response $response) {
    $idUsuario = $request->getAttribute('id');
    $param  = $request->getParsedBody();
    $usuario = $param['usuario'];
    $contrasena = $param['contrasena'];
    $estado = $param['estado'];
    $idRol = $param['idRol'];

    // var_dump($idRol);
    $sql = "UPDATE usuario SET 
    user_name=:usuario,
    contrasena=:contrasena,
    estado=:estado,
    idRol=:idRol
    WHERE idUsuario=:idUsuario
    ";
    try {
        $db = new Conexion();
        $db = $db->conectar();
        $resultado = $db->prepare($sql);
        $resultado->bindParam(':usuario', $usuario);
        $resultado->bindParam(':contrasena', $contrasena);
        $resultado->bindParam(':estado', $estado);
        $resultado->bindParam(':idRol', $idRol, PDO::PARAM_INT);
        $resultado->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
        $resultado->execute();
        echo json_encode('usuario modificado');

        $resultado = null;
        $db = null;
    } catch (PDOException $e) {
        echo '{"error" :{"text":}' . $e->getMessage() . '}';
    }
});




//delete usuario
$app->delete('/api/usuarios/eliminar/{id}', function (Request $request, Response $response) {
    $idUsuario = $request->getAttribute('id');
    $sql = "DELETE FROM usuario WHERE idUsuario=:idUsuario";
    try {
        $db = new Conexion();
        $db = $db->conectar();
        $resultado = $db->prepare($sql);
        $resultado->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
        $resultado->execute();

        if ($resultado->rowCount() > 0) {
            echo json_encode('usuario eliminado');
        } else {
            echo json_encode('no existe usuario con ese id');
        }

        $resultado = null;
        $db = null;
    } catch (PDOException $e) {
        echo '{"error" :{"text":}' . $e->getMessage() . '}';
    }
});
