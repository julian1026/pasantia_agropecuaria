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
        $linea_productiva1,
        $linea_productiva2,
        $linea_productiva3,
        $agua,
        $energiaElectrica,
        $energiaAlternativas,
        $servicioSanitario,
        $vereda,
        $idAgricultor,
        $registrador
    ) {
        $insertar = $this->pdo->conectar()->prepare(
            'INSERT INTO finca (nombre_finca,hectareas,ab_agua,e_electrica,e_alternativas,s_sanitario,latitud,longitud,registrador,
            id_linea_pro1,id_linea_pro2,id_linea_pro3,idAgricultor,id_Vereda) 
                 VALUES (:nombre,:hectareas,:agua,:energiaElectrica,:energiaAlternativas,:servicioSanitario,
                 :latitud,:longitud,:registrador,:lineaPro1,:lineaPro2,:lineaPro3,:idAgricultor,:idVereda)'
        );

        $insertar->bindparam(':nombre', $nombre_finca);
        $insertar->bindparam(':hectareas', $hectareas);
        $insertar->bindparam(':agua', $agua, PDO::PARAM_INT);
        $insertar->bindparam(':energiaElectrica', $energiaElectrica, PDO::PARAM_INT);
        $insertar->bindparam(':energiaAlternativas', $energiaAlternativas, PDO::PARAM_INT);
        $insertar->bindparam(':servicioSanitario', $servicioSanitario, PDO::PARAM_INT);
        $insertar->bindparam(':latitud', $latitud);
        $insertar->bindparam(':longitud', $longitud);
        $insertar->bindparam(':lineaPro1', $linea_productiva1);
        $insertar->bindparam(':lineaPro2', $linea_productiva2);
        $insertar->bindparam(':lineaPro3', $linea_productiva3);
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
        $listar = $this->pdo->conectar()->prepare("SELECT p.num_identificacion,f.idFinca,f.nombre_finca,f.hectareas,f.ab_agua,f.e_electrica,f.e_alternativas,        f.s_sanitario,f.id_linea_pro1,f.id_linea_pro2,f.id_linea_pro3,f.latitud,f.longitud,f.fecha_registro,f.registrador,v.nombreVereda,v.id_vereda,l1.linea_nombre,c.idCorregimiento,agro1.id_actividad_agro idAgro1,agro2.id_actividad_agro idAgro2,agro3.id_actividad_agro idAgro3 from persona p join agricultor a on (p.idPersona=a.idPersona)
         join finca f on (a.idAgricultor=f.idAgricultor) join vereda v on (f.id_Vereda=v.id_vereda) join linea_productiva l1 on 
        (f.id_linea_pro1=l1.id_linea_pro) JOIN corregimiento c on (c.idCorregimiento=v.corregimiento_id) JOIN clase_productiva cp1 on (l1.id_clase_pro=cp1.id_clase_pro) join Actividad_agro agro1 on (cp1.id_actividad_agro=agro1.id_actividad_agro) join linea_productiva l2 on (f.id_linea_pro2=l2.id_linea_pro) JOIN clase_productiva cp2 on (l2.id_clase_pro=cp2.id_clase_pro) join Actividad_agro agro2 on (cp2.id_actividad_agro=agro2.id_actividad_agro) JOIN linea_productiva l3 on (f.id_linea_pro3=l3.id_linea_pro)
         JOIN clase_productiva cp3 on (l3.id_clase_pro=cp3.id_clase_pro) JOIN Actividad_agro agro3
         on (cp3.id_actividad_agro=agro3.id_actividad_agro)  ORDER BY idFinca DESC");
        $listar->execute();
        $arreglo = array();

        $valores = $listar->fetchAll(PDO::FETCH_ASSOC);
        $aux = count($valores);
        foreach ($valores as $elementos) {
            $elementos["numero"] = $aux;
            $arreglo["data"][] = $elementos;
            $aux--;
        }
        return $arreglo;
        $this->pdo->cerrar();
    }


    function actualizarFinca(
        $longitud,
        $latitud,
        $nombre_finca,
        $hectareas,
        $linea_productiva1,
        $linea_productiva2,
        $linea_productiva3,
        $agua,
        $energiaElectrica,
        $energiaAlternativas,
        $servicioSanitario,
        $vereda,
        $idFinca
    ) {
        $actualizar = $this->pdo->conectar()->prepare('UPDATE finca
         SET nombre_finca=:nombre,
            hectareas=:hectareas,
            latitud=:latitud,
            longitud=:longitud,
            ab_agua=:agua,
            e_electrica=:electrica,
            e_alternativas=:alternativa,
            s_sanitario=:sanitario,
            id_linea_pro1=:pro1,
            id_linea_pro2=:pro2,
            id_linea_pro3=:pro3,
            id_Vereda=:idVereda
        WHERE idFinca =:idFinca');

        $actualizar->bindparam(':nombre', $nombre_finca);
        $actualizar->bindparam(':hectareas', $hectareas);
        $actualizar->bindparam(':latitud', $latitud);
        $actualizar->bindparam(':longitud', $longitud);

        $actualizar->bindparam(':pro1', $linea_productiva1, PDO::PARAM_INT);
        $actualizar->bindparam(':pro2', $linea_productiva2, PDO::PARAM_INT);
        $actualizar->bindparam(':pro3', $linea_productiva3, PDO::PARAM_INT);
        $actualizar->bindparam(':agua', $agua, PDO::PARAM_INT);
        $actualizar->bindparam(':electrica', $energiaElectrica, PDO::PARAM_INT);
        $actualizar->bindparam(':alternativa', $energiaAlternativas, PDO::PARAM_INT);
        $actualizar->bindparam(':sanitario', $servicioSanitario, PDO::PARAM_INT);

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
        $listar = $this->pdo->conectar()->prepare("SELECT  concat(p.primer_nombre,' ',p.segundo_nombre,' ',p.primer_apellido,' ',p.segundo_apellido) nombreCompleto,p.num_identificacion,p.tipo_identificacion,a.PersonasAcargo,p.fecha_ncm,p.sexo,p.etnia,p.nivel_escolaridad,f.idFinca,f.nombre_finca,f.hectareas,f.ab_agua,f.e_electrica,f.e_alternativas,        f.s_sanitario,f.id_linea_pro1,f.id_linea_pro3,f.latitud,f.longitud,f.fecha_registro,f.registrador,v.nombreVereda,v.id_vereda,l1.linea_nombre l1nombre,c.idCorregimiento,agro1.id_actividad_agro idAgro1,agro2.id_actividad_agro idAgro2,agro3.id_actividad_agro idAgro3,l2.linea_nombre l2nombre,l3.linea_nombre l3nombre,agro1.actividadAgro_nombre agroNombre1, agro2.actividadAgro_nombre agroNombre2, agro3.actividadAgro_nombre agroNombre3,c.nombre_corregimiento,m.nombre_mncp,de.nombre_department from persona p join agricultor a on (p.idPersona=a.idPersona)
        join finca f on (a.idAgricultor=f.idAgricultor) join vereda v on (f.id_Vereda=v.id_vereda) join linea_productiva l1 on 
       (f.id_linea_pro1=l1.id_linea_pro) JOIN corregimiento c on (c.idCorregimiento=v.corregimiento_id) join municipio m on(c.idMunicipio=m.idMunicipio) join departamento de on (m.id_departamento=de.id_departamento)
       JOIN clase_productiva cp1 on (l1.id_clase_pro=cp1.id_clase_pro) join Actividad_agro agro1 on (cp1.id_actividad_agro=agro1.id_actividad_agro) join linea_productiva l2 on (f.id_linea_pro2=l2.id_linea_pro) JOIN clase_productiva cp2 on (l2.id_clase_pro=cp2.id_clase_pro) join Actividad_agro agro2 on (cp2.id_actividad_agro=agro2.id_actividad_agro) JOIN linea_productiva l3 on (f.id_linea_pro3=l3.id_linea_pro)
        JOIN clase_productiva cp3 on (l3.id_clase_pro=cp3.id_clase_pro) JOIN Actividad_agro agro3
        on (cp3.id_actividad_agro=agro3.id_actividad_agro) where f.idFinca=:idFinca");
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

    function listarActividadesAgro()
    {
        $listar = $this->pdo->conectar()->prepare("SELECT * FROM Actividad_agro");
        $listar->execute();
        return $listar->fetchAll(PDO::FETCH_ASSOC);
        $this->pdo->cerrar();
    }

    function listarLineasProductivas($linea)
    {
        $listar = $this->pdo->conectar()->prepare("SELECT l.linea_nombre,l.id_linea_pro from linea_productiva l join clase_productiva c on (l.id_clase_pro=c.id_clase_pro)
         join Actividad_agro a on (c.id_actividad_agro=a.id_actividad_agro) where a.id_actividad_agro=:linea");
        $listar->bindparam(':linea', $linea);
        $listar->execute();
        return $listar->fetchAll(PDO::FETCH_ASSOC);
        $this->pdo->cerrar();
    }

    function listarLineasProductivas1()
    {
        $listar = $this->pdo->conectar()->prepare("SELECT * from linea_productiva");
        $listar->bindparam(':linea', $linea);
        $listar->execute();
        return $listar->fetchAll(PDO::FETCH_ASSOC);
        $this->pdo->cerrar();
    }

    function listarCorregimientos()
    {
        $listar = $this->pdo->conectar()->prepare("SELECT * FROM corregimiento");
        $listar->execute();
        return $listar->fetchAll(PDO::FETCH_ASSOC);
        $this->pdo->cerrar();
    }

    function reporte2($cedula, $fechaI, $fechaF)
    {
        $listar = $this->pdo->conectar()->prepare("SELECT p.num_identificacion,f.idFinca,f.nombre_finca,f.hectareas,f.ab_agua,f.e_electrica,f.e_alternativas,        f.s_sanitario,f.id_linea_pro1,f.id_linea_pro2,f.id_linea_pro3,f.latitud,f.longitud,f.fecha_registro,f.registrador,v.nombreVereda,v.id_vereda,l1.linea_nombre,c.idCorregimiento,agro1.id_actividad_agro idAgro1,agro2.id_actividad_agro idAgro2,agro3.id_actividad_agro idAgro3 from persona p join agricultor a on (p.idPersona=a.idPersona)
        join finca f on (a.idAgricultor=f.idAgricultor) join vereda v on (f.id_Vereda=v.id_vereda) join linea_productiva l1 on 
       (f.id_linea_pro1=l1.id_linea_pro) JOIN corregimiento c on (c.idCorregimiento=v.corregimiento_id) JOIN clase_productiva cp1 on (l1.id_clase_pro=cp1.id_clase_pro) join Actividad_agro agro1 on (cp1.id_actividad_agro=agro1.id_actividad_agro) join linea_productiva l2 on (f.id_linea_pro2=l2.id_linea_pro) JOIN clase_productiva cp2 on (l2.id_clase_pro=cp2.id_clase_pro) join Actividad_agro agro2 on (cp2.id_actividad_agro=agro2.id_actividad_agro) JOIN linea_productiva l3 on (f.id_linea_pro3=l3.id_linea_pro)
        JOIN clase_productiva cp3 on (l3.id_clase_pro=cp3.id_clase_pro) JOIN Actividad_agro agro3
        on (cp3.id_actividad_agro=agro3.id_actividad_agro) where f.fecha_registro BETWEEN :fechaI and :fechaF  and f.registrador=:cedula ORDER BY idFinca DESC");

        $listar->bindParam(':cedula', $cedula);
        $listar->bindParam(':fechaI', $fechaI);
        $listar->bindParam(':fechaF', $fechaF);

        $listar->execute();
        $arreglo = array();

        $valores = $listar->fetchAll(PDO::FETCH_ASSOC);
        $aux = count($valores);

        if ($valores) {
            foreach ($valores as $elementos) {
                $elementos["numero"] = $aux;
                $arreglo[] = $elementos;
                $aux--;
            }
            return $arreglo;
            $this->pdo->cerrar();
        };
        return $valores;
        $this->pdo->cerrar();
    }
}
