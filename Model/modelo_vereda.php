<?php
class Modelo_Vereda
{
    private $pdo;

    function __construct()
    {
        require_once 'conexion.php';
        $this->pdo = new Conexion();
    }

    function listarVeredas()
    {
        $listar = $this->pdo->conectar()->prepare("SELECT * from vereda");
        $listar->execute();
        return $listar->fetchAll(PDO::FETCH_ASSOC);
        $this->pdo->cerrar();
    }
}
