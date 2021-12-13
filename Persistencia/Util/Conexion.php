<?php
class Conexion
{
   public function conectarDB()
   {
      $user =  "postgres";
      $password = "123456789";
      $conexion = pg_connect("host=reportrc.cembyvlsqxem.us-east-2.rds.amazonaws.com port=5432 dbname=postgres user=$user password=$password");
      return $conexion;
   }
   public function cerrarDB($conexion)
   {
      $cerrar = pg_close($conexion);
      return $cerrar;
   }
  
}
?>