<?php
require '../../Model/modelo_usuario.php';
session_start();

$valor_rol = $_SESSION['S_rol'];

$MU = new Modelo_Usuario();

$consulta = $MU->listarRoles($valor_rol);
$data = json_encode($consulta);
if (count($consulta) > 0) {
    echo $data;
} else {
    echo 0;
}
