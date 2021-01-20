<?php
$iduser=$_POST['idusuario'];
$user=$_POST['user'];
$rol=$_POST['rol'];

session_start();
$_SESSION['S_iduser']=$iduser;
$_SESSION['S_user']=$user;
$_SESSION['S_rol']=$rol;


?>