<?php
    /**
     * Import classes
     */	

    
    require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Estado_actualDAO.php';
	

	class ManejoEstado_actual{
		
        /**
         * Atribute for the connection to  the database
         */
        private static $conexionBD;		

		function __construct(){
			
		}

        public static function consultarEstado_actual($cod_estado_actual){

            $estado_actualDAO = Estado_actualDAO::getEstado_actualDAO(self::$conexionBD);
            $estado_actual = $estado_actualDAO->consult($cod_estado_actual);
            return $estado_actual;
        }


        /**
         * Create an estado usuario
         * @param Estado_usuario estado usuario to create
         * @return void
         */
        public static function createEstado_actual($estado_actual){
            $Estado_actualDAO=Estado_actualDAO::getEstado_actualDAO(self::$conexionBD);
            $Estado_actualDAO->create($estado_actual);
        }

        /**
         * Modify an Estado_usuario
         * @param Estado_usuario Estado usuario to modify
         * @return void
         */
        public static function modifyEstado_actual($estado_actual){
            $estado_actualDAO=Estado_actualDAO::getEstado_actualDAO(self::$conexionBD);
            $estado_actualDAO->modify($estado_actual);
        }
        /**
         * Delete an Estado usuario
         * @param Estado_usuario estado_usuario to modify
         * @return void
         */
        public static function deleteEstado_actual($estado_actual){
            $estado_actualDAO=Estado_actualDAO::getEstado_actualDAO(self::$conexionBD);
            $estado_actualDAO->delete($estado_actual);
        }

        /**
         * List of estado usuario
         * @return Estado_usuario[] List of all the estado usuario in the Data Base
         */
        public static function getList(){
            $estado_actualDAO = Estado_actualDAO::getEstado_actualDAO(self::$conexionBD);
            $estado_actual = $estado_actualDAO->getList();
            return $estado_actual;
        }

	    /**
	    * Change the conexion
	    */
	    public static function setConexionBD($conexionBD){
	                self::$conexionBD = $conexionBD;
	            }
	}