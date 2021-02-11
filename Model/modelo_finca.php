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
        $idAgricultor,
        $registrador
    ) {
        $insertar = $this->pdo->conectar()->prepare(
            'INSERT INTO finca (nombre_finca,hectareas,actividadAgropecuaria,lineaProductiva,latitud,longitud,registrador,idAgricultor,id_Vereda) 
                 VALUES (:nombre,:hectareas,:actividadAgro,:lineaPro,:latitud,:longitud,:registrador,:idAgricultor,:idVereda)'
        );

        $insertar->bindparam(':nombre', $nombre_finca);
        $insertar->bindparam(':hectareas', $hectareas);
        $insertar->bindparam(':actividadAgro', $actividad_Agropecuaria);
        $insertar->bindparam(':lineaPro', $linea_productiva);
        $insertar->bindparam(':latitud', $latitud);
        $insertar->bindparam(':longitud', $longitud);
        $insertar->bindparam(':registrador', $registrador);
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
        $listar = $this->pdo->conectar()->prepare("SELECT p.num_identificacion,f.idFinca,f.nombre_finca,f.hectareas,f.actividadAgropecuaria,
        f.lineaProductiva,f.latitud,f.longitud,f.fecha_registro,f.registrador,v.nombreVereda from persona p join agricultor a on (p.idPersona=a.idPersona) join finca f on (a.idAgricultor=f.idAgricultor) join vereda v 
        on (f.id_Vereda=v.id_vereda) ORDER BY idFinca DESC");
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

    function mostrarGeneral($idFinca)
    {
        $listar = $this->pdo->conectar()->prepare("SELECT concat(p.primer_nombre,' ',p.segundo_nombre,' ',p.primer_apellido,' ',p.segundo_apellido) nombreCompleto, p.tipo_identificacion,p.num_identificacion, p.fecha_ncm,p.sexo,p.etnia,p.nivel_escolaridad,a.PersonasAcargo,f.nombre_finca, f.hectareas,f.actividadAgropecuaria,f.lineaProductiva,f.latitud, f.longitud, v.nombreVereda, c.nombre_corregimiento, m.nombre_mncp, d.nombre_department
         from persona p join agricultor a on (p.idPersona=a.idPersona) join finca f on (a.idAgricultor=f.idAgricultor) join vereda v on (f.id_Vereda=v.id_vereda) join corregimiento c on (v.corregimiento_id=c.idCorregimiento)
          join municipio m on (c.idMunicipio=m.idMunicipio) join departamento d on (m.id_departamento=d.id_departamento) where f.idFinca=:idFinca");
        $listar->bindparam(':idFinca', $idFinca);
        if ($listar->execute()) {
            $valores = $listar->fetchAll(PDO::FETCH_ASSOC);
            $this->pdo->cerrar();
            return $valores;
        }
        $arreglo = array();
        return $arreglo;
        $this->pdo->cerrar();
    }
}
