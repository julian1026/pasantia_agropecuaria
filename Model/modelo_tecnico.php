<?php
class Modelo_Tecnico
{
    private $pdo;

    function __construct()
    {
        require_once 'conexion.php';
        $this->pdo = new Conexion();
    }

    function registrarTecnico($desEstudio)
    {
        $userId = $this->pdo->conectar()->prepare('SELECT idPersona FROM persona ORDER BY idPersona DESC LIMIT 1');
        $userId->execute();
        $this->pdo->cerrar();
        $ultimo = $userId->fetchAll(PDO::FETCH_ASSOC);
        $show = array();
        foreach ($ultimo as $elemento) {
            $ultimoidPers = $elemento['idPersona'];
        }
        if ($ultimoidPers) {
            $insertar = $this->pdo->conectar()->prepare(
                'INSERT INTO tecnicos (descripcion_estudio,idPersona) 
                 VALUES (:desEstudio, :userIdPers)'
            );
            $insertar->bindparam(':desEstudio', $desEstudio);
            $insertar->bindparam(':userIdPers', $ultimoidPers, PDO::PARAM_INT);

            $insertar->execute();
            $this->pdo->cerrar();
            $show[] = 1;
            return $show;
        }
        return $show;
    }


    function listarTecnicos()
    {
        $listar = $this->pdo->conectar()->prepare("SELECT r.idRol,p.primer_nombre,p.segundo_nombre,p.primer_apellido,p.segundo_apellido,p.num_identificacion from rol r join usuario u  on (r.idRol=u.idRol) join persona p on (u.idUsuario=p.idUsuario) where r.idRol!=3");
        $listar->execute();
        return $listar->fetchAll(PDO::FETCH_ASSOC);
        $this->pdo->cerrar();
    }


    function actualizarTecnico(
        $idTecnico,
        $descripcion_estudio
    ) {
        $actualizar = $this->pdo->conectar()->prepare('UPDATE tecnicos SET
         descripcion_estudio=:descripcion_estudio
         WHERE idTecnico =:idTecnico');
        $actualizar->bindparam(':idTecnico', $idTecnico);
        $actualizar->bindparam(':descripcion_estudio', $descripcion_estudio);
        if ($actualizar->execute()) {
            $this->pdo->cerrar();
            return 1;
        }
        $this->pdo->cerrar();
        return 0;
    }
}
