<?php
class Conexion
{
   public function conectarDB()
   {

      $string = 'gA1tOq8tdqkxkfCoQLQDP/Zk739EamLLImDMfBe9';
      $ciphering = "AES-128-CTR";
      $decryption_key = "GeeksforGeeks";
      $options = 0;
      $decryption_iv = '1234567891011121';
      $stringDesc=openssl_decrypt ($string, $ciphering, $decryption_key, $options, $decryption_iv);
      $password = $stringDesc;


      $string2 = 'ogZ7PY9gdoc0jOD0R+lGWA==';
      $stringDesc2=openssl_decrypt ($string2, $ciphering, $decryption_key, $options, $decryption_iv);
      $user =  $stringDesc2;
      
      $conexion = pg_connect("host=rcbusinesstech-report.cembyvlsqxem.us-east-2.rds.amazonaws.com port=5432 dbname=$user user=$user password=$password");
      return $conexion;
   }
   public function cerrarDB($conexion)
   {
      $cerrar = pg_close($conexion);
      return $cerrar;
   }
  
}
?>