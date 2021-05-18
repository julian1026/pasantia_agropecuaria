<?php
class Modelo_LineasPdoductivas
{
    private $pdo;

    function __construct()
    {
        require_once 'conexion.php';
        $this->pdo = new Conexion();
    }



    function listarLineasProductivas()
    {
        $listar = $this->pdo->conectar()->prepare("SELECT * from linea_productiva lp join clase_productiva cp on (lp.id_clase_pro=cp.id_clase_pro)");
        $listar->execute();
        $arreglo = array();

        $valores = $listar->fetchAll(PDO::FETCH_ASSOC);
        $aux = count($valores);

        if ($valores) {
            foreach ($valores as $elementos) {
                $elementos["numero"] = $aux;
                $arreglo["data"][] = $elementos;
                $aux--;
            }
            return $arreglo;
            $this->pdo->cerrar();
        };
        return $valores;
        $this->pdo->cerrar();
    }


    function registrarLineaProductivas($clase, $linea)
    {
        $insertar = $this->pdo->conectar()->prepare(
            'INSERT INTO linea_productiva (linea_nombre,id_clase_pro) 
                 VALUES (:lineaNombre,:idClase)'
        );

        $insertar->bindparam(':lineaNombre', $linea);
        $insertar->bindparam(':idClase', $clase);

        if ($insertar->execute()) {

            $this->pdo->cerrar();
            return 1;
        }
        $this->pdo->cerrar();
        return 0;
    }

    function actualizarLineaProductivas($clase, $linea, $idLinea)
    {
        $actualizar = $this->pdo->conectar()->prepare(
            'UPDATE linea_productiva set 
            linea_nombre=:lineaNombre, id_clase_pro=:idClase
            WHERE id_linea_pro=:id'
        );

        $actualizar->bindparam(':lineaNombre', $linea);
        $actualizar->bindparam(':idClase', $clase);
        $actualizar->bindparam(':id', $idLinea);

        if ($actualizar->execute()) {

            $this->pdo->cerrar();
            return 1;
        }
        $this->pdo->cerrar();
        return 0;
    }


    function listarClaseProductivas()
    {
        $listar = $this->pdo->conectar()->prepare("SELECT * from clase_productiva");
        $listar->execute();
        return $listar->fetchAll(PDO::FETCH_ASSOC);
        $this->pdo->cerrar();
    }
}
