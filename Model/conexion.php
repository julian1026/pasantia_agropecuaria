<?php
class Conexion
{
  private $servidor;
  private $usuario;
  private $cont;
  private $db;


  public function __construct()
  {
    $this->servidor = "localhost";
    $this->usuario = "root";
    $this->cont = "";
    $this->db = "appAgropecuaria";
  }
  function conectar()
  {
    try {
      $conn = new PDO("mysql:host=" . $this->servidor . ";dbname=" . $this->db, $this->usuario, $this->cont);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $conn;
    } catch (PDOException $ex) {
      echo "Error en la conexión : " . $ex->getMessage();
    }
  }

  function cerrar()
  {
    $this->conn = null;
  }
}
