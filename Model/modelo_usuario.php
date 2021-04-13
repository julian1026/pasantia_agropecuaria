<?php
class Modelo_Usuario
{
   private $pdo;

   function __construct()
   {
      require_once 'conexion.php';
      $this->pdo = new Conexion();
   }

   function VerificarUsuario($usuario, $contra)
   {
      //$result=array();
      // $con = md5($contra);
      $listar = $this->pdo->conectar()->prepare("SELECT * FROM (SELECT u.idUsuario, u.user_name,u.contrasena,u.estado,u.idRol,r.nombre_rol,p.num_identificacion
      from persona p JOIN usuario u on (p.idUsuario=u.idUsuario) JOIN rol r on (u.idRol=r.idRol) where user_name= BINARY :user)R");
      $listar->bindparam(':user', $usuario);
      $array = array();
      $listar->execute();
      $resultado = $listar->fetchAll(PDO::FETCH_ASSOC);
      foreach ($resultado as $valor) {
         if (password_verify($contra, $valor['contrasena'])) {
            return $resultado;
         }
      }
      return $array;
      $listar = null;
   }

   function actualizarContrasena($idUsuario, $pass, $passwordOld)
   {
      $consultar = $this->pdo->conectar()->prepare('SELECT * from usuario  WHERE idUsuario =:idUsuario');
      $consultar->bindparam(':idUsuario', $idUsuario);
      $consultar->execute();
      $respuesta = $consultar->fetchAll(PDO::FETCH_ASSOC);


      if (password_verify($passwordOld, $respuesta[0]['contrasena'])) {
         $password = password_hash($pass, PASSWORD_DEFAULT);
         $verificar = $this->pdo->conectar()->prepare('UPDATE usuario SET contrasena=:password WHERE idUsuario =:idUsuario');
         $verificar->bindparam(':password', $password);
         $verificar->bindparam(':idUsuario', $idUsuario);
         if ($verificar->execute()) {
            $this->pdo->cerrar();
            return 1;
         }
         $this->pdo->cerrar();
         return 0;
      } else {
         $this->pdo->cerrar();
         return 2;
      }
   }


   function  listarUsuario()
   {
      $listar = $this->pdo->conectar()->prepare("SELECT u.idUsuario,u.user_name,u.estado,r.nombre_rol,r.idRol from usuario u JOIN rol r
       on u.idRol=r.idRol ORDER BY u.idUsuario DESC");
      $listar->execute();
      $arreglo = array();
      $valores = $listar->fetchAll(PDO::FETCH_ASSOC);
      $aux = count($valores);
      foreach ($valores as $elementos) {
         $elementos["numero"] = $aux;
         $arreglo["data"][] = $elementos;
         $aux--;
      }
      return $arreglo;
      $this->pdo->cerrar();
   }

   function  listarRoles($idRol)
   {
      $clave = 3;
      if ($idRol == 1) {
         $listar = $this->pdo->conectar()->prepare("SELECT * from rol");
         $listar->execute();
         return $listar->fetchAll(PDO::FETCH_ASSOC);
         $this->pdo->cerrar();
      }
      if ($idRol == 2) {
         $listar = $this->pdo->conectar()->prepare("SELECT * from rol where idRol=:idRol");
         $listar->bindParam(':idRol', $clave);
         $listar->execute();
         return $listar->fetchAll(PDO::FETCH_ASSOC);
         $this->pdo->cerrar();
      }
   }


   function registrarUsuario($usu, $pass, $estado, $idRol)
   {
      $verificar = $this->pdo->conectar()->prepare('SELECT COUNT(*)numero from usuario where user_name= BINARY :user');
      $verificar->bindparam(':user', $usu);
      $verificar->execute();
      $this->pdo->cerrar();
      $res = array();
      $valor = $verificar->fetchAll(PDO::FETCH_ASSOC);

      foreach ($valor as $elelmento) {
         if ($elelmento['numero'] == '0') { //como no existe este nombre de usuario, entoces inserte
            $verificar = $this->pdo->conectar()->prepare(
               'INSERT INTO usuario (contrasena,user_name,estado,idRol) 
         VALUES (:pass, :user, :estado, :idRol)'
            );
            $verificar->bindparam(':user', $usu);
            $verificar->bindparam(':pass', $pass);
            $verificar->bindparam(':estado', $estado);
            $verificar->bindparam(':idRol', $idRol);
            $verificar->execute();
            $this->pdo->cerrar();
            $res[] = 1;
            return $res;
         } else {
            $res[] = 2;
            return $res;
         }
      }
      return $res;
   }

   function cambiarEstado($idUsuario, $estado)
   {
      $verificar = $this->pdo->conectar()->prepare('UPDATE usuario SET estado=:estado WHERE idUsuario =:idUsuario');
      $verificar->bindparam(':estado', $estado);
      $verificar->bindparam(':idUsuario', $idUsuario);
      if ($verificar->execute()) {
         $this->pdo->cerrar();
         return 1;
      }
      $this->pdo->cerrar();
      return 0;
   }

   function editarUsuario($idUsuario, $idRol)
   {
      $editar = $this->pdo->conectar()->prepare('UPDATE usuario SET idRol=:Rol WHERE idUsuario =:idUsuario');
      $editar->bindparam(':Rol', $idRol);
      $editar->bindparam(':idUsuario', $idUsuario);
      if ($editar->execute()) {
         $this->pdo->cerrar();
         return 1;
      }
      $this->pdo->cerrar();
      return 0;
   }
}
