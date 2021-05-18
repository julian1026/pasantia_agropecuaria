<?php
require '../../Model/modelo_usuario.php';
$idUsuario = htmlspecialchars($_POST['idUsuario'], ENT_QUOTES, 'utf-8');
$idRol = htmlspecialchars($_POST['idRol'], ENT_QUOTES, 'utf-8');
$contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);
$MU = new Modelo_Usuario();

$actualizarUsu = $MU->editarUsuario($idUsuario, $idRol, $contrasena);
echo $actualizarUsu;
