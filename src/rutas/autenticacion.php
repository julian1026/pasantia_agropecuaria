<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->group('/api', function () use ($app) {
    // Versionado de la API
    $app->group('/v1', function () use ($app) {
        $app->get('/autenticar/out', 'outLog');
        $app->post('/autenticar/login', 'autenticarse');
    });
});


function autenticarse(Request $request, Response $response)
{
    $param  = $request->getParsedBody();
    $user_name = $param["user_name"];
    $contrasena = $param["contrasena"];

    $sql = "SELECT * FROM (SELECT u.idUsuario, u.user_name,u.contrasena,u.estado,u.idRol,r.nombre_rol,p.num_identificacion
    from persona p JOIN usuario u on (p.idUsuario=u.idUsuario) JOIN rol r on (u.idRol=r.idRol) where user_name= BINARY :user_name)R  where contrasena= BINARY :contrasena";
    try {
        $db = new Conexion();
        $db = $db->conectar();
        $resultado = $db->prepare($sql);
        $resultado->bindParam(':user_name', $user_name);
        $resultado->bindParam(':contrasena', $contrasena);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        if (count($data) > 0) {

            foreach ($data as $value) {
                // var_dump($value["estado"]);
                if ($value['estado'] == "ACTIVO") {
                    session_start();
                    $_SESSION['S_idUsuario'] = $value['idUsuario'];
                    $_SESSION['S_rol'] = $value['idRol'];
                } else {
                    return json_encode('El usuario se encuentra inactivo..');
                }
                return json_encode($data);
            }
        }
        return json_encode('Usuario no Exite');

        $resultado = null;
        $db = null;
    } catch (PDOException $e) {
        echo '{"error" :{"text":}' . $e->getMessage() . '}';
    }
}

function outLog()
{
    session_reset();

    return json_encode('sesion terminada');
}
