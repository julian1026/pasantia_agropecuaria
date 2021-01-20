<?php
class Modelo_Finca
{
    private $pdo;

    function __construct()
    {
        require_once 'conexion.php';
        $this->pdo = new Conexion();
    }

    function registrarFinca(
        $longitud,
        $latitud,
        $nombre_finca,
        $hectareas,
        $actividad_Agropecuaria,
        $linea_productiva,
        $vereda,
        $idAgricultor
    ) {
        $insertar = $this->pdo->conectar()->prepare(
            'INSERT INTO finca (nombre_finca,	hectareas,actividadAgropecuaria,lineaProductiva,latitud,longitud,idAgricultor,id_Vereda) 
                 VALUES (:nombre,:hectareas,:actividadAgro,:lineaPro,:latitud,:longitud,:idAgricultor,:idVereda)'
        );

        $insertar->bindparam(':nombre', $nombre_finca);
        $insertar->bindparam(':hectareas', $hectareas);
        $insertar->bindparam(':actividadAgro', $actividad_Agropecuaria);
        $insertar->bindparam(':lineaPro', $linea_productiva);
        $insertar->bindparam(':latitud', $latitud);
        $insertar->bindparam(':longitud', $longitud);
        $insertar->bindparam(':idAgricultor', $idAgricultor, PDO::PARAM_INT);
        $insertar->bindparam(':idVereda', $vereda, PDO::PARAM_INT);
        if ($insertar->execute()) {

            $this->pdo->cerrar();
            return 1;
        }
        $this->pdo->cerrar();
        return 0;
    }

    function listarFincas()
    {
        $listar = $this->pdo->conectar()->prepare("SELECT * from finca ORDER BY idFinca DESC");
        $listar->execute();
        $arreglo = array();
        $valores = $listar->fetchAll(PDO::FETCH_ASSOC);
        foreach ($valores as $elementos) {
            $arreglo["data"][] = $elementos;
        }
        return $arreglo;
        $this->pdo->cerrar();
    }


    function actualizarFinca(
        $longitud,
        $latitud,
        $nombre_finca,
        $hectareas,
        $actividad_Agropecuaria,
        $linea_productiva,
        $vereda,
        $idFinca
    ) {
        $actualizar = $this->pdo->conectar()->prepare('UPDATE finca SET nombre_finca=:nombre,
        hectareas=:hectareas,actividadAgropecuaria=:actividadAgro,lineaProductiva=:lineaPro,latitud=:latitud,longitud=:longitud,
        id_Vereda=:idVereda
         WHERE idFinca =:idFinca');

        $actualizar->bindparam(':nombre', $nombre_finca);
        $actualizar->bindparam(':hectareas', $hectareas);
        $actualizar->bindparam(':actividadAgro', $actividad_Agropecuaria);
        $actualizar->bindparam(':lineaPro', $linea_productiva);
        $actualizar->bindparam(':latitud', $latitud);
        $actualizar->bindparam(':longitud', $longitud);
        $actualizar->bindparam(':idFinca', $idFinca, PDO::PARAM_INT);
        $actualizar->bindparam(':idVereda', $vereda, PDO::PARAM_INT);
        if ($actualizar->execute()) {
            $this->pdo->cerrar();
            return 1;
        }
        $this->pdo->cerrar();
        return 0;
    }
}
