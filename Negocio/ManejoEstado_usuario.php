<?php
    /**
     * Import classes
     */	

    
    require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Estado_usuarioDAO.php';
	

	class ManejoEstado_usuario{
		
        /**
         * Atribute for the connection to  the database
         */
        private static $conexionBD;		

		function __construct(){
			
		}

        public static function consultarEstado_usuario($cod_estado_usuario){

            $estado_usuarioDAO = Estado_usuarioDAO::getEstado_usuarioDAO(self::$conexionBD);
            $estado_usuario = $estado_usuarioDAO->consult($cod_estado_usuario);
            return $estado_usuario;
        }


        /**
         * Create an estado usuario
         * @param Estado_usuario estado usuario to create
         * @return void
         */
        public static function createEstado_usuario($estado_usuario){
            $Estado_usuarioDAO=Estado_usuarioDAO::getEstado_usuarioDAO(self::$conexionBD);
            $Estado_usuarioDAO->create($estado_usuario);
        }

        /**
         * Modify an Estado_usuario
         * @param Estado_usuario Estado usuario to modify
         * @return void
         */
        public static function modifyEstado_usuario($estado_usuario){
            $estado_usuarioDAO=Estado_usuarioDAO::getEstado_usuarioDAO(self::$conexionBD);
            $estado_usuarioDAO->modify($estado_usuario);
        }
        /**
         * Delete an Estado usuario
         * @param Estado_usuario estado_usuario to modify
         * @return void
         */
        public static function deleteEstado_usuario($estado_usuario){
            $estado_usuarioDAO=Estado_usuarioDAO::getEstado_usuarioDAO(self::$conexionBD);
            $estado_usuarioDAO->delete($estado_usuario);
        }

        /**
         * List of estado usuario
         * @return Estado_usuario[] List of all the estado usuario in the Data Base
         */
        public static function getList(){
            $estado_usuarioDAO = Estado_usuarioDAO::getEstado_usuarioDAO(self::$conexionBD);
            $estado_usuario = $estado_usuarioDAO->getList();
        }

	    /**
	    * Change the conexion
	    */
	    public static function setConexionBD($conexionBD){
	                self::$conexionBD = $conexionBD;
	            }
	}