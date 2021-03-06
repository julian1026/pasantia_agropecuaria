<?php
class Modelo_VisitarFinca
{
    private $pdo;

    function __construct()
    {
        require_once 'conexion.php';
        $this->pdo = new Conexion();
    }

    function registrarVisitaFinca(
        $objectivoVisita,
        $sistemaProduccion,
        $situacionEncontrada,
        $actividadRealizada,
        $actividadPendientes,
        $fecha,
        $idFinca,
        $R_idPersona
    ) {
        $insertar = $this->pdo->conectar()->prepare(
            'INSERT INTO visitas_fincas (
                                        objetivoVisita,
                                        sistemasProduccion,
                                        situacionEncontrada,
                                        actividadRealizada,
                                        actividadPendientes,
                                        fecha,
                                        R_idPersona,
                                        idFinca
                                        ) 
                 VALUES (
                        :objectivoVisita,
                        :sistemaProduccion,
                        :situacionEncontrada,
                        :actividadRealizada,
                        :actividadPendientes,
                        :fecha,
                        :R_idPersona,
                        :idFinca
                        )'
        );

        $insertar->bindparam(':objectivoVisita', $objectivoVisita);
        $insertar->bindparam(':sistemaProduccion', $sistemaProduccion);
        $insertar->bindparam(':situacionEncontrada', $situacionEncontrada);
        $insertar->bindparam(':actividadRealizada', $actividadRealizada);
        $insertar->bindparam(':actividadPendientes', $actividadPendientes);
        $insertar->bindparam(':fecha', $fecha);
        $insertar->bindparam(':R_idPersona', $R_idPersona);
        $insertar->bindparam(':idFinca', $idFinca, PDO::PARAM_INT);
        if ($insertar->execute()) {

            $this->pdo->cerrar();
            return 1;
        }
        $this->pdo->cerrar();
        return 0;
    }

    function listar($idFinca)
    {
        $listar = $this->pdo->conectar()->prepare("SELECT concat(p.primer_nombre,' ',p.segundo_nombre,' ',p.primer_apellido,' ',p.segundo_apellido) nombreCompleto, p.num_identificacion,f.nombre_finca,c.nombre_corregimiento,v.nombreVereda FROM persona p JOIN agricultor a on (p.idPersona=a.idPersona) join finca f on (a.idAgricultor=f.idAgricultor) JOIN vereda v on (f.id_Vereda=v.id_vereda) JOIN corregimiento c on (v.corregimiento_id=c.idCorregimiento) WHERE f.idFinca=:idFinca ");
        $listar->bindparam(':idFinca', $idFinca);
        $listar->execute();
        $valores = $listar->fetchAll(PDO::FETCH_ASSOC);
        $this->pdo->cerrar();
        return $valores;
    }

    function listarAll($idFinca)
    {
        $listar = $this->pdo->conectar()->prepare("SELECT concat(p.primer_nombre,' ',p.segundo_nombre,' ',p.primer_apellido,' ',p.segundo_apellido) nombreRegistrador,p.num_identificacion registrador_cedula, vf.idvisitas,vf.fecha,vf.objetivoVisita,vf.sistemasProduccion,vf.situacionEncontrada,vf.actividadRealizada,vf.actividadPendientes FROM finca f JOIN visitas_fincas vf on (f.idFinca=vf.idFinca) join persona p on (p.idPersona=vf.R_idPersona) where f.idFinca=:idFinca ORDER by vf.idvisitas DESC");
        $listar->bindparam(':idFinca', $idFinca);
        $listar->execute();
        $valores = $listar->fetchAll(PDO::FETCH_OBJ);
        $this->pdo->cerrar();
        return $valores;
    }




    function listarAll2($idFinca)
    {
        $listar = $this->pdo->conectar()->prepare("SELECT concat(p.primer_nombre,' ',p.segundo_nombre,' ',p.primer_apellido,' ',p.segundo_apellido) nombreRegistrador,p.num_identificacion registrador_cedula, vf.idvisitas,vf.fecha,vf.objetivoVisita,vf.sistemasProduccion,vf.situacionEncontrada,vf.actividadRealizada,vf.actividadPendientes FROM finca f JOIN visitas_fincas vf on (f.idFinca=vf.idFinca) join persona p on (p.idPersona=vf.R_idPersona) where f.idFinca=:idFinca ORDER by vf.idvisitas DESC");
        $listar->bindparam(':idFinca', $idFinca);
        $listar->execute();

        $arreglo = array();
        $valores = $listar->fetchAll(PDO::FETCH_ASSOC);
        $aux = count($valores);
        foreach ($valores as $elementos1) {
            $elementos1['numero'] = '' . $aux . '';
            $arreglo["data"][] = $elementos1;
            $aux--;
        }
        return $arreglo;
        $this->pdo->cerrar();
    }




    function actualizarVisitaFinca(
        $fecha,
        $objetivoVisita,
        $sistemasProduccion,
        $situacionEncontrada,
        $actividadRealizada,
        $actividadPendientes,
        $idvisitas
    ) {
        $actualizar = $this->pdo->conectar()->prepare('UPDATE visitas_fincas
         SET 
         fecha=:fecha,
         objetivoVisita=:objetivoVisita,
         sistemasProduccion=:sistemasProduccion,
         situacionEncontrada=:situacionEncontrada,
         actividadRealizada=:actividadRealizada,
         actividadPendientes=:actividadPendientes
        WHERE idvisitas =:idvisitas');

        $actualizar->bindparam(':fecha', $fecha);
        $actualizar->bindparam(':objetivoVisita', $objetivoVisita);
        $actualizar->bindparam(':sistemasProduccion',  $sistemasProduccion);
        $actualizar->bindparam(':situacionEncontrada', $situacionEncontrada);
        $actualizar->bindparam(':actividadRealizada', $actividadRealizada);

        $actualizar->bindparam(':actividadPendientes', $actividadPendientes);
        $actualizar->bindparam(':idvisitas', $idvisitas, PDO::PARAM_INT);
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
}
