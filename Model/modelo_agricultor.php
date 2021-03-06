<?php
class Modelo_Agricultor
{
    private $pdo;

    function __construct()
    {
        require_once 'conexion.php';
        $this->pdo = new Conexion();
    }

    function registrarAgricultor($numPersonas)
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
                'INSERT INTO agricultor (PersonasAcargo,idPersona) 
                 VALUES (:numPer, :userIdPers)'
            );

            $insertar->bindparam(':numPer', $numPersonas, PDO::PARAM_INT);
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

    function actualizarAgricultor(
        $idAgricultor,
        $acargo
    ) {
        $actualizar = $this->pdo->conectar()->prepare('UPDATE agricultor SET
         PersonasAcargo=:acargo
         WHERE idAgricultor =:idAgricultor');
        $actualizar->bindparam(':idAgricultor', $idAgricultor);
        $actualizar->bindparam(':acargo', $acargo);
        if ($actualizar->execute()) {
            $this->pdo->cerrar();
            return 1;
        }
        $this->pdo->cerrar();
        return 0;
    }
}
