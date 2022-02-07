<?php
    /**
     * Import classes
     */	

    
    require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Estado_cliente_partnerDAO.php';
	

	class ManejoEstado_cliente_partner{
		
        /**
         * Atribute for the connection to  the database
         */
        private static $conexionBD;		

		function __construct(){
			
		}

        public static function consultarEstado_cliente_partner($cod_estado_cliente_partner){

            $estado_cliente_partnerDAO = Estado_cliente_partnerDAO::getEstado_cliente_partnerDAO(self::$conexionBD);
            $estado_cliente_partner = $estado_cliente_partnerDAO->consult($cod_estado_cliente_partner);
            return $estado_cliente_partner;
        }


        /**
         * Create an estado usuario
         * @param Estado_usuario estado usuario to create
         * @return void
         */
        public static function createEstado_cliente_partner($estado_cliente_partner){
            $Estado_cliente_partnerDAO=Estado_cliente_partnerDAO::getEstado_cliente_partnerDAO(self::$conexionBD);
            $Estado_cliente_partnerDAO->create($estado_cliente_partner);
        }

        /**
         * Modify an Estado_usuario
         * @param Estado_usuario Estado usuario to modify
         * @return void
         */
        public static function modifyEstado_cliente_partner($estado_cliente_partner){
            $estado_cliente_partnerDAO=Estado_cliente_partnerDAO::getEstado_cliente_partnerDAO(self::$conexionBD);
            $estado_cliente_partnerDAO->modify($estado_cliente_partner);
        }
        /**
         * Delete an Estado usuario
         * @param Estado_usuario estado_usuario to modify
         * @return void
         */
        public static function deleteEstado_cliente_partner($estado_cliente_partner){
            $estado_cliente_partnerDAO=Estado_cliente_partnerDAO::getEstado_cliente_partnerDAO(self::$conexionBD);
            $estado_cliente_partnerDAO->delete($estado_cliente_partner);
        }

        /**
         * List of estado usuario
         * @return Estado_usuario[] List of all the estado usuario in the Data Base
         */
        public static function getList(){
            $estado_cliente_partnerDAO = Estado_cliente_partnerDAO::getEstado_cliente_partnerDAO(self::$conexionBD);
            $estado_cliente_partner = $estado_cliente_partnerDAO->getList();
            return $estado_cliente_partner;
        }

	    /**
	    * Change the conexion
	    */
	    public static function setConexionBD($conexionBD){
	                self::$conexionBD = $conexionBD;
	            }
	}