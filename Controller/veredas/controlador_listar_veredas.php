<?php
require '../../Model/modelo_vereda.php';


$MU = new Modelo_Vereda();

if ($_POST['id_corregimiento']) {
    $idCorregimiento = $_POST['id_corregimiento'];
    $consulta = $MU->listarVeredas($idCorregimiento);
    $data = json_encode($consulta);
    if (count($consulta) > 0) {
        echo $data;
    } else {
        echo 0;
    }
} else {
    $consulta = $MU->listarVeredasPrincipal();
    $data = json_encode($consulta);
    if (count($consulta) > 0) {
        echo $data;
    } else {
        echo 0;
    }
}
