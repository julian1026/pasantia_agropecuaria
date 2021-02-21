<?php
require '../../Model/modelo_finca.php';

$MU = new Modelo_Finca();

if ($_POST['id_productiva']) {
    $linea = $_POST['id_productiva'];
    $consulta = $MU->listarLineasProductivas($linea);
    $data = json_encode($consulta);
    if (count($consulta) > 0) {
        echo $data;
    } else {
        echo 0;
    }
} else {
    $consulta = $MU->listarLineasProductivas1();
    $data = json_encode($consulta);
    if (count($consulta) > 0) {
        echo $data;
    } else {
        echo 0;
    }
}
