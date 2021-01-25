<?php
class Modelo_Vegetal
{
    private $pdo;

    function __construct()
    {
        require_once 'conexion.php';
        $this->pdo = new Conexion();
    }

    function registrarVegetales($nombreVegetal, $tipoPlanta, $cantidad, $informacion, $idFinca)
    {
        $insertar = $this->pdo->conectar()->prepare(
            'INSERT INTO plantaciones (nombre,tipo,vegetales_cantidad,informacion,idFinca)
                 VALUES (:nombre,:tipoPlanta,:cantidad,:informacion,:idFinca)'
        );

        $insertar->bindparam(':nombre', $nombreVegetal);
        $insertar->bindparam(':tipoPlanta', $tipoPlanta);
        $insertar->bindparam(':informacion', $informacion);
        $insertar->bindparam(':cantidad', $cantidad, PDO::PARAM_INT);
        $insertar->bindparam(':idFinca', $idFinca, PDO::PARAM_INT);
        if ($insertar->execute()) {

            $this->pdo->cerrar();
            return 1;
        }
        $this->pdo->cerrar();
        return 0;
    }
}
