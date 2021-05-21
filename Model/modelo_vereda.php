<?php
class Modelo_Vereda
{
    private $pdo;

    function __construct()
    {
        require_once 'conexion.php';
        $this->pdo = new Conexion();
    }

    function listarVeredas($id)
    {
        $listar = $this->pdo->conectar()->prepare("SELECT v.nombreVereda,v.id_vereda from vereda v join
         corregimiento c on (v.corregimiento_id=c.idCorregimiento) where c.idCorregimiento=:id");
        $listar->bindparam(':id', $id);
        $listar->execute();
        return $listar->fetchAll(PDO::FETCH_ASSOC);
        $this->pdo->cerrar();
    }

    function listarVeredasPrincipal()
    {
        $listar = $this->pdo->conectar()->prepare("SELECT * from vereda");
        $listar->bindparam(':id', $id);
        $listar->execute();
        return $listar->fetchAll(PDO::FETCH_ASSOC);
        $this->pdo->cerrar();
    }
}
