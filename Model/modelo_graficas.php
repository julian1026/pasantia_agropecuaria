<?php
class Modelo_Grafica
{
    private $pdo;

    function __construct()
    {
        require_once 'conexion.php';
        $this->pdo = new Conexion();
    }



    function listarLineaProductivaUno()
    {
        $listar = $this->pdo->conectar()->prepare("SELECT COUNT(l1.id_linea_pro)cantidadLinea, l1.linea_nombre  from finca f join
        linea_productiva l1 on (f.id_linea_pro1=l1.id_linea_pro) GROUP BY l1.linea_nombre");
        $listar->execute();
        $arreglo = array();
        $valores = $listar->fetchAll(PDO::FETCH_ASSOC);
        foreach ($valores as $elementos) {
            $arreglo["data"][] = $elementos;
        }
        return $arreglo;
        $this->pdo->cerrar();
    }

    function listarLineaProductivaDos()
    {
        $listar = $this->pdo->conectar()->prepare("SELECT COUNT(l.id_linea_pro)cantidadLinea, l.linea_nombre  from finca f join
        linea_productiva l on (f.id_linea_pro2=l.id_linea_pro) GROUP BY l.linea_nombre");
        $listar->execute();
        $arreglo = array();
        $valores = $listar->fetchAll(PDO::FETCH_ASSOC);
        foreach ($valores as $elementos) {
            $arreglo["data"][] = $elementos;
        }
        return $arreglo;
        $this->pdo->cerrar();
    }

    function listarLineaProductivaTres()
    {
        $listar = $this->pdo->conectar()->prepare("SELECT COUNT(l.id_linea_pro)cantidadLinea, l.linea_nombre  from finca f join
        linea_productiva l on (f.id_linea_pro3=l.id_linea_pro) GROUP BY l.linea_nombre");
        $listar->execute();
        $arreglo = array();
        $valores = $listar->fetchAll(PDO::FETCH_ASSOC);
        foreach ($valores as $elementos) {
            $arreglo["data"][] = $elementos;
        }
        return $arreglo;
        $this->pdo->cerrar();
    }


    function servicios()
    {
        $listar = $this->pdo->conectar()->prepare("SELECT * from ( SELECT count(*)aguaSi from finca where ab_agua=1)q
         inner join (SELECT count(*)aguaNo from finca where ab_agua=0)w
          inner join (SELECT COUNT(*)electricaSi from finca where e_electrica=1)a
           INNER join (SELECT COUNT(*)electricaNo from finca where e_electrica=0)b
            INNER JOIN(SELECT COUNT(*)alternativasSi from finca where e_alternativas=1)d
             INNER join (SELECT COUNT(*)alternativasNo from finca where e_alternativas=0)j
              INNER JOIN (SELECT COUNT(*)sanitarioSi from finca where s_sanitario=1)k
               INNER join(SELECT COUNT(*)sanitarioNo from finca where s_sanitario=0)p
                INNER JOIN ( SELECT count(*) cantidaFincas from finca)h");
        $listar->execute();
        $arreglo = array();
        $valores = $listar->fetchAll(PDO::FETCH_ASSOC);
        foreach ($valores as $elementos) {
            $arreglo["data"][] = $elementos;
        }
        return $arreglo;
        $this->pdo->cerrar();
    }
}
