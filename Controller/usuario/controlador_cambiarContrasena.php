<?php
require '../../Model/modelo_usuario.php';
$passwordNew = $_POST["password"];
$passwordOld = $_POST["passwordOld"];
session_start();
$userId = $_SESSION['S_iduser'];

$MU = new Modelo_Usuario();

$consulta = $MU->actualizarContrasena($userId, $passwordNew, $passwordOld);
echo json_encode($consulta);
