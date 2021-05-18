<?php
$iduser = $_POST['idusuario'];
$user = $_POST['user'];
$rol = $_POST['rol'];
$registrador = $_POST['numero_registro'];
$idPersona = $_POST['R_idPersona'];

session_start();
$_SESSION['S_iduser'] = $iduser;
$_SESSION['S_user'] = $user;
$_SESSION['S_rol'] = $rol;
$_SESSION['S_registrador'] = $registrador;
$_SESSION['S_idPersona'] = $idPersona;
