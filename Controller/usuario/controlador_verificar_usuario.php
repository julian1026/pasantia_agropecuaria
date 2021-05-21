<?php
require '../../Model/modelo_usuario.php';

$MU = new Modelo_Usuario();

//no permitimos que ingresen caracteres especiales 
$usuario = htmlspecialchars($_POST['user'], ENT_QUOTES, 'utf-8');
$contra = htmlspecialchars($_POST['pass'], ENT_QUOTES, 'utf-8');


$consulta = $MU->VerificarUsuario($usuario, $contra);
$data = json_encode($consulta);
if (count($consulta) > 0) {
    echo $data;
} else {
    echo 0;
}
