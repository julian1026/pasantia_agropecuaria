<?php
require '../../Model/modelo_visitaFinca.php';
$idFinca = $_POST['idFinca'];
$cod = $_POST['cod'];

$MU = new Modelo_VisitarFinca();
if ($cod == 1) {
    $consulta = $MU->listar($idFinca);
    $data = json_encode($consulta);
    if (count($consulta) > 0) {
        echo $data;
    } else {
        echo 0;
    }
}

if ($cod == 2) {
    $consulta = $MU->listarAll($idFinca);
    $data = json_encode($consulta);
    if (count($consulta) > 0) {
        echo $data;
    } else {
        echo 0;
    }
}

if ($cod == 3) {
    $consulta = $MU->listarAll2($idFinca);
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


// }
// if($consulta){
//     echo json_encode($consulta);
// }else{
//    echo '{
//        "sEcho": 1,
//        "iTotalRecords": "0",
//        "iTotalDisplayRecords": "0",
//        "aaData": []
//    }';
// }