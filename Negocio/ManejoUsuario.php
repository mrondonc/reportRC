<?php
    /**
     * Import classes
     */	

    
    require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/UsuarioDAO.php';
	

	class ManejoUsuario{
		
        /**
         * Atribute for the connection to  the database
         */
        private static $conexionBD;		

		function __construct(){
			
		}

        public static function consultarUsuario($cod_usuario){

            $usuarioDAO = UsuarioDAO::getUsuarioDAO(self::$conexionBD);
            $usuario = $usuarioDAO->consult($cod_usuario);
            return $usuario;
        }

        public static function verificarCuentaUsuario($correo,$pass){

            $usuarioDAO = UsuarioDAO::getUsuarioDAO(self::$conexionBD);
            $usuario = $usuarioDAO->verificarCuenta($correo,$pass);
            return $usuario;
        }

        /**
         * Create an usuario
         * @param Usuario usuario to create
         * @return void
         */
        public static function createUsuario($usuario){
            $UsuarioDAO=UsuarioDAO::getUsuarioDAO(self::$conexionBD);
            $UsuarioDAO->create($usuario);
        }

        /**
         * Modify an Usuario
         * @param Usuario usuario to modify
         * @return void
         */
        public static function modifyUsuario($usuario){
            $usuarioDAO=UsuarioDAO::getUsuarioDAO(self::$conexionBD);
            $usuarioDAO->modify($usuario);
        }
        /**
         * Delete an usuario
         * @param Usuario usuario to modify
         * @return void
         */
        public static function deleteUsuario($usuario){
            $usuarioDAO=UsuarioDAO::getUsuarioDAO(self::$conexionBD);
            $usuarioDAO->delete($usuario);
        }

        /**
         * List of usuario
         * @return Usuario[] List of all the usuario in the Data Base
         */
        public static function getListOrdenNombre(){
            $usuarioDAO = UsuarioDAO::getUsuarioDAO(self::$conexionBD);
            $usuario = $usuarioDAO->getListOrdenNombre();
            return $usuario;
        }

        /**
         * List of usuario
         * @return Usuario[] List of all the usuario in the Data Base
         */
        public static function getListOrdenNombreEnEspera(){
            $usuarioDAO = UsuarioDAO::getUsuarioDAO(self::$conexionBD);
            $usuario = $usuarioDAO->getListOrdenNombreEnEspera();
            return $usuario;
        }

        /**
         * List of usuario
         * @return Usuario[] List of all the usuario in the Data Base
         */
        public static function getListOrdenNombreI(){
            $usuarioDAO = UsuarioDAO::getUsuarioDAO(self::$conexionBD);
            $usuario = $usuarioDAO->getListOrdenNombreI();
            return $usuario;
        }

        /**
         * List of usuario
         * @return Usuario[] List of all the usuario in the Data Base
         */
        public static function getList(){
            $usuarioDAO = UsuarioDAO::getUsuarioDAO(self::$conexionBD);
            $usuario = $usuarioDAO->getList();
            return $usuario;
        }

        public static function cambiarEstadoActivado($usuario){
            $usuarioDAO=UsuarioDAO::getUsuarioDAO(self::$conexionBD);
            $usuarioDAO->cambiarEstadoActivado($usuario);
        }

        public static function cambiarEstadoDesactivado($usuario){
            $usuarioDAO=UsuarioDAO::getUsuarioDAO(self::$conexionBD);
            $usuarioDAO->cambiarEstadoDesactivado($usuario);
        }

    
        public static function getListActivar()
        {
            $usuarioDAO = UsuarioDAO::getUsuarioeDAO(self::$conexionBD);
            $usuario = $usuarioAO->getListActivar();
            return $usuario;
           
        }

        
        public static function getListDesactivar()
        {
            $usuarioDAO = UsuarioDAO::getUsuarioDAO(self::$conexionBD);
            $usuario = $usuarioDAO->getListDesactivar();
            return $usuario;
           
        }

	    /**
	    * Change the conexion
	    */
	    public static function setConexionBD($conexionBD){
	                self::$conexionBD = $conexionBD;
	            }
	}