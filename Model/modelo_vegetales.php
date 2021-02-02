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


    function listarVegetales($idFinca)
    {
        $listar = $this->pdo->conectar()->prepare("SELECT p.idPlantaciones,p.nombre,p.tipo,p.vegetales_cantidad,p.informacion, f.nombre_finca FROM plantaciones p 
        join finca f on (p.idFinca=f.idFinca) WHERE p.idFinca=:idFinca");
        $listar->bindParam(':idFinca', $idFinca);
        $listar->execute();
        $arreglo = array();
        $valores = $listar->fetchAll(PDO::FETCH_ASSOC);
        foreach ($valores as $elementos) {
            $arreglo["data"][] = $elementos;
        }
        return $arreglo;
        $this->pdo->cerrar();
    }

    function actualizarVegetales(
        $nombreVegetal,
        $tipoVegetal,
        $cantidadVegetal,
        $informacionVegetal,
        $idVegetal
    ) {
        $actualizar = $this->pdo->conectar()->prepare('UPDATE plantaciones SET nombre=:nombre,
        tipo=:tipo,vegetales_cantidad=:cantidad,informacion=:informacion WHERE idPlantaciones =:idVegetales');

        $actualizar->bindparam(':nombre', $nombreVegetal);
        $actualizar->bindparam(':tipo', $tipoVegetal);
        $actualizar->bindparam(':cantidad', $cantidadVegetal);
        $actualizar->bindparam(':informacion', $informacionVegetal);
        $actualizar->bindparam(':idVegetales', $idVegetal, PDO::PARAM_INT);
        if ($actualizar->execute()) {
            $this->pdo->cerrar();
            return 1;
        }
        $this->pdo->cerrar();
        return 0;
    }
}
