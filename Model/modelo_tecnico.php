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
        $listar = $this->pdo->conectar()->prepare("SELECT * from persona p JOIN tecnicos t on (p.idPersona=t.idPersona)");
        $listar->execute();
        return $listar->fetchAll(PDO::FETCH_ASSOC);
        $this->pdo->cerrar();
    }
}
