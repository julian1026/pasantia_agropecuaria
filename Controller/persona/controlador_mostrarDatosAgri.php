<?php
require '../../Model/modelo_personas.php';

$MU = new Modelo_Persona();
$id = $_POST['idPersona'];
$consulta = $MU->mostrarDatosAgri($id);
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
