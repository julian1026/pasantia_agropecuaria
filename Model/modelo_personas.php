<?php
class Modelo_Persona
{
    private $pdo;

    function __construct()
    {
        require_once 'conexion.php';
        $this->pdo = new Conexion();
    }

    function registrarPersonas(
        $nombre1,
        $nombre2,
        $apellido1,
        $apellido2,
        $educacion,
        $tipo_identificacion,
        $numero_ide,
        $sexo,
        $etnia,
        $discapacidad,
        $fecha_n,
        $correo,
        $telefono,
        $foto
    ) {
        $userId = $this->pdo->conectar()->prepare('SELECT idUsuario FROM usuario ORDER BY idUsuario DESC LIMIT 1');
        $userId->execute();
        $this->pdo->cerrar();
        $ultimo = $userId->fetchAll(PDO::FETCH_ASSOC);
        $show = array();
        foreach ($ultimo as $elemento) {
            $ultimoidUser = $elemento['idUsuario'];
        }
        if ($ultimoidUser) {
            $insertar = $this->pdo->conectar()->prepare(
                'INSERT INTO persona (primer_nombre,segundo_nombre,primer_apellido,segundo_apellido,
                tipo_identificacion,num_identificacion,sexo,etnia,discapacidad,fecha_ncm,nivel_escolaridad,telefono,
                foto,correo,idUsuario) 
                VALUES (:nombre1, :nombre2, :apellido1, :apellido2, :tipoid, :numeroid, :sexo,
                :etnia, :discapacidad, :fechaN, :educacion, :telefono, :foto, :correo, :userIde)'
            );

            $insertar->bindparam(':nombre1', $nombre1);
            $insertar->bindparam(':nombre2', $nombre2);
            $insertar->bindparam(':apellido1', $apellido1);
            $insertar->bindparam(':apellido2', $apellido2);
            $insertar->bindparam(':educacion', $educacion);
            $insertar->bindparam(':tipoid', $tipo_identificacion);
            $insertar->bindparam(':numeroid', $numero_ide);
            $insertar->bindparam(':sexo', $sexo);
            $insertar->bindparam(':etnia', $etnia);
            $insertar->bindparam(':discapacidad', $discapacidad);
            $insertar->bindparam(':fechaN', $fecha_n);
            $insertar->bindparam(':correo', $correo);
            $insertar->bindparam(':telefono', $telefono);
            $insertar->bindparam(':foto', $foto);
            $insertar->bindparam(':userIde', $ultimoidUser, PDO::PARAM_INT);

            $insertar->execute();
            $this->pdo->cerrar();
            $show[] = 1;
            return $show;
        }
        return $show;
    }

    function  listarPersona()
    {
        $listar = $this->pdo->conectar()->prepare("SELECT idPersona, CONCAT(primer_nombre,' ',segundo_nombre,' ',primer_apellido,' ',segundo_apellido) nombreCompleto,
        primer_nombre, segundo_nombre,primer_apellido,segundo_apellido,
        etnia,discapacidad,tipo_identificacion,num_identificacion,sexo,fecha_ncm,nivel_escolaridad,telefono,correo,u.idUsuario, r.idRol
         FROM persona p join usuario u on (p.idUsuario=u.idUsuario) join rol r on (u.idRol=r.idRol) ORDER BY idPersona DESC");
        $listar->execute();
        $arreglo = array();
        $valores = $listar->fetchAll(PDO::FETCH_ASSOC);
        foreach ($valores as $elementos) {
            $arreglo["data"][] = $elementos;
        }
        return $arreglo;
        $this->pdo->cerrar();
    }

    function actualizarPersona(
        $idPersona,
        $nombre1,
        $nombre2,
        $apellido1,
        $apellido2,
        $educacion,
        $tipo_identificacion,
        $numero_ide,
        $sexo,
        $etnia,
        $discapacidad,
        $fecha_n,
        $correo,
        $telefono,
        $foto
    ) {
        $insertar = $this->pdo->conectar()->prepare('UPDATE persona SET primer_nombre=:nombre1,
        segundo_nombre=:nombre2,primer_apellido=:apellido1,segundo_apellido=:apellido2,etnia=:etnia,discapacidad=:discapacidad,tipo_identificacion=:tipoid,
        num_identificacion=:numeroid,sexo=:sexo,fecha_ncm=:fechaN,nivel_escolaridad=:educacion,telefono=:telefono,correo=:correo,foto=:foto
         WHERE idPersona =:idPersona');
        $insertar->bindparam(':idPersona', $idPersona);
        $insertar->bindparam(':nombre1', $nombre1);
        $insertar->bindparam(':nombre2', $nombre2);
        $insertar->bindparam(':apellido1', $apellido1);
        $insertar->bindparam(':apellido2', $apellido2);
        $insertar->bindparam(':educacion', $educacion);
        $insertar->bindparam(':tipoid', $tipo_identificacion);
        $insertar->bindparam(':numeroid', $numero_ide);
        $insertar->bindparam(':sexo', $sexo);
        $insertar->bindparam(':etnia', $etnia);
        $insertar->bindparam(':discapacidad', $discapacidad);
        $insertar->bindparam(':fechaN', $fecha_n);
        $insertar->bindparam(':correo', $correo);
        $insertar->bindparam(':telefono', $telefono);
        $insertar->bindparam(':foto', $foto);
        if ($insertar->execute()) {
            $this->pdo->cerrar();
            return 1;
        }
        $this->pdo->cerrar();
        return 0;
    }
}
