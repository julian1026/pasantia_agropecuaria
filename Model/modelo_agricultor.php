<?php
class Modelo_Agricultor
{
    private $pdo;

    function __construct()
    {
        require_once 'conexion.php';
        $this->pdo = new Conexion();
    }

    function registrarAgricultor($numPersonas, $activad_agro)
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
                'INSERT INTO agricultor (PersonasAcargo,Actividad_Agro,idPersona) 
                 VALUES (:numPer, :actividad_agro, :userIdPers)'
            );

            $insertar->bindparam(':numPer', $numPersonas, PDO::PARAM_INT);
            $insertar->bindparam(':actividad_agro', $activad_agro);
            $insertar->bindparam(':userIdPers', $ultimoidPers, PDO::PARAM_INT);

            $insertar->execute();
            $this->pdo->cerrar();
            $show[] = 1;
            return $show;
        }
        return $show;
    }

    function listarAgricultores($idPersona)
    {
        $listar = $this->pdo->conectar()->prepare("SELECT * from agricultor where idPersona=$idPersona");
        $listar->execute();
        return $listar->fetchAll(PDO::FETCH_ASSOC);
        $this->pdo->cerrar();
    }
}
