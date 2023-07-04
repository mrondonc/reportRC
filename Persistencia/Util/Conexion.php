<?php
class Conexion
{
   public function conectarDB()
   {
      $user =  "rcbusinesstech27";
      $password = 'PhtrS$nKvnd9d5wP#kyaSPzux%fUhU';
      $conexion = pg_connect("host=rcbusinesstech-report.cembyvlsqxem.us-east-2.rds.amazonaws.com port=5432 dbname=rcbusinesstech27 user=$user password=$password");
      return $conexion;
   }
   public function cerrarDB($conexion)
   {
      $cerrar = pg_close($conexion);
      return $cerrar;
   }
  
}
?>