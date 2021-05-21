<?php
require '../../Model/modelo_lineasProductivas.php';

$cod = $_POST['cod'];
$MU = new Modelo_LineasPdoductivas();


if ($cod == 1) {
    $consulta = $MU->listarLineasProductivas();
    if ($consulta) {
        echo json_encode($consulta);
    } else {
        echo '{
            "sEcho": 1,
            "iTotalRecords": "0",
            "iTotalDisplayRecords": "0",
            "aaData": []
        }';
    }
}
if ($cod == 2) {
    $consulta = $MU->listarClaseProductivas();
    if ($consulta) {
        echo json_encode($consulta);
    } else {
        echo '{
            "sEcho": 1,
            "iTotalRecords": "0",
            "iTotalDisplayRecords": "0",
            "aaData": []
        }';
    }
}

if ($cod == 3) {
    $clase = $_POST['clase'];
    $linea = $_POST['linea'];
    $consulta = $MU->registrarLineaProductivas($clase, $linea);
    echo $consulta;
}
if ($cod == 4) {
    $clase = $_POST['clase'];
    $linea = $_POST['linea'];
    $idLinea = $_POST['idLinea'];
    $consulta = $MU->actualizarLineaProductivas($clase, $linea, $idLinea);
    echo $consulta;
}
