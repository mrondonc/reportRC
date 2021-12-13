<?php
    /**
     * Import classes
     */	

    
    require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Tipo_usuarioDAO.php';
	

	class ManejoTipo_usuario{
		
        /**
         * Atribute for the connection to  the database
         */
        private static $conexionBD;		

		function __construct(){
			
		}

        public static function consultarTipo_usuario($cod_tipo_usuario){

            $tipo_usuarioDAO = Tipo_usuarioDAO::getTipo_usuarioDAO(self::$conexionBD);
            $tipo_usuario = $tipo_usuarioDAO->consult($cod_tipo_usuario);
            return $tipo_usuario;
        }

        /**
         * Create an tipo de usuario
         * @param Tipo_usuario tipo de usuario to create
         * @return void
         */
        public static function createTipo_usuario($tipo_usuario){
            $Tipo_usuarioDAO=Tipo_usuarioDAO::getTipo_usuarioDAO(self::$conexionBD);
            $Tipo_usuarioDAO->create($tipo_usuario);
        }

        /**
         * Modify an Tipo de usuario
         * @param Tipo_usuario tipo de usuario to modify
         * @return void
         */
        public static function modifyTipo_usuario($tipo_usuario){
            $tipo_usuarioDAO=Tipo_usuarioDAO::getTipo_usuarioDAO(self::$conexionBD);
            $tipo_usuarioDAO->modify($tipo_usuario);
        }
        /**
         * Delete an tipo de usuario
         * @param Tipo_usuario tipo de usuario to modify
         * @return void
         */
        public static function deleteTipo_usuario($tipo_usuario){
            $tipo_usuarioDAO=Tipo_usuarioDAO::getTipo_usuarioDAO(self::$conexionBD);
            $tipo_usuarioDAO->delete($tipo_usuario);
        }

        /**
         * List of tipo de usuario
         * @return Tipo_usuario[] List of all the tipo de usuario in the Data Base
         */
        public static function getList(){
            $tipo_usuarioDAO = Tipo_usuarioDAO::getTipo_usuarioDAO(self::$conexionBD);
            $tipo_usuarioDAO = $tipo_usuarioDAO->getList();
        }

	    /**
	    * Change the conexion
	    */
	    public static function setConexionBD($conexionBD){
	                self::$conexionBD = $conexionBD;
	            }
	}