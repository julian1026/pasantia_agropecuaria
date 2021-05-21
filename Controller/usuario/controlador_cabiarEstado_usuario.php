<?php
require '../../Model/modelo_usuario.php';

$MU = new Modelo_Usuario();
$idUsuario = $_POST['idUsuario'];
$estado = $_POST['estado'];
$consulta = $MU->cambiarEstado($idUsuario, $estado);
//  $data=json_encode($consulta);
echo $consulta;
