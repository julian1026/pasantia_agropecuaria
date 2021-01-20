<?php
require '../../Model/modelo_usuario.php';

$MU = new Modelo_Usuario();

$consulta = $MU->listarRoles();
$data = json_encode($consulta);
if (count($consulta) > 0) {
    echo $data;
} else {
    echo 0;
}
