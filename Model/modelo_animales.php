<?php
class Modelo_Animal
{
    private $pdo;

    function __construct()
    {
        require_once 'conexion.php';
        $this->pdo = new Conexion();
    }

    function registrarAnimales($raza, $tipoAnimal, $cantidad, $informacion, $vacuna, $idFinca)
    {
        $insertar = $this->pdo->conectar()->prepare(
            'INSERT INTO animales (tipo,raza,nombre_vacunas,cantidad_animales,informacion,idFinca)
                 VALUES (:tipoAnimal,:raza,:vacuna,:cantidad,:informacion,:idFinca)'
        );

        $insertar->bindparam(':raza', $raza);
        $insertar->bindparam(':tipoAnimal', $tipoAnimal);
        $insertar->bindparam(':informacion', $informacion);
        $insertar->bindparam(':vacuna', $vacuna);
        $insertar->bindparam(':cantidad', $cantidad, PDO::PARAM_INT);
        $insertar->bindparam(':idFinca', $idFinca, PDO::PARAM_INT);
        if ($insertar->execute()) {

            $this->pdo->cerrar();
            return 1;
        }
        $this->pdo->cerrar();
        return 0;
    }

    function listarAnimales($idFinca)
    {
        $listar = $this->pdo->conectar()->prepare("SELECT a.tipo,a.raza,a.nombre_vacunas,a.cantidad_animales,a.informacion,a.idAnimales,f.nombre_finca FROM 
        animales a join finca f on (a.idFinca=f.idFinca) where a.idFinca=:idFinca");
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

    function actualizarAnimales(
        $tipo,
        $raza,
        $vacuna,
        $cantidad,
        $informacion,
        $idAnimal
    ) {
        $actualizar = $this->pdo->conectar()->prepare('UPDATE animales SET tipo=:tipo,
        raza=:raza,nombre_vacunas=:vacunas,cantidad_animales=:cantidad, informacion=:informacion
         WHERE idAnimales =:idAnimal');

        $actualizar->bindparam(':tipo', $tipo);
        $actualizar->bindparam(':raza', $raza);
        $actualizar->bindparam(':vacunas', $vacuna);
        $actualizar->bindparam(':cantidad', $cantidad, PDO::PARAM_INT);
        $actualizar->bindparam(':informacion', $informacion);
        $actualizar->bindparam(':idAnimal', $idAnimal, PDO::PARAM_INT);
        if ($actualizar->execute()) {
            $this->pdo->cerrar();
            return 1;
        }
        $this->pdo->cerrar();
        return 0;
    }
}
