<?php
    /**
     * Import classes
     */	

    
    require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Sub_mod_sapDAO.php';
	

	class ManejoSub_mod_sap{
		
        /**
         * Atribute for the connection to  the database
         */
        private static $conexionBD;		

		function __construct(){
			
		}

        public static function consultarSub_mod_sap($cod_sub_mod_sap){

            $sub_mod_sapDAO = Sub_mod_sapDAO::getSub_mod_sapDAO(self::$conexionBD);
            $sub_mod_sap = $sub_mod_sapDAO->consult($cod_sub_mod_sap);
            return $sub_mod_sap;
        }

        /**
         * Create an sub modulo sap
         * @param Sub_mod_sap sub mod sap to create
         * @return void
         */
        public static function createSub_mod_sap($sub_mod_sap){
            $Sub_mod_sapDAO=Sub_mod_sapDAO::getSub_mod_sapDAO(self::$conexionBD);
            $Sub_mod_sapDAO->create($sub_mod_sap);
        }

        /**
         * Modify an Sub_mod_sap
         * @param Sub_mod_sap sub modulo sap to modify
         * @return void
         */
        public static function modifySub_mod_sap($sub_mod_sap){
            $sub_mod_sapDAO=Sub_mod_sapDAO::getSub_mod_sapDAO(self::$conexionBD);
            $sub_mod_sapDAO->modify($sub_mod_sap);
        }
        /**
         * Delete an Sub Modulo sap
         * @param Sub_mod_sap sub modulo sap to modify
         * @return void
         */
        public static function deleteSub_mod_sap($sub_mod_sap){
            $sub_mod_sapDAO=Sub_mod_sapDAO::getSub_mod_sapDAO(self::$conexionBD);
            $sub_mod_sapDAO->delete($sub_mod_sap);
        }

        /**
         * List of sub modulo sap
         * @return Sub_mod_sap[] List of all the sub modulo sap in the Data Base
         */
        public static function getList(){
            $sub_mod_sapDAO = Sub_mod_sapDAO::getSub_mod_sapDAO(self::$conexionBD);
            $sub_mod_sap = $sub_mod_sapDAO->getList();
            return $sub_mod_sap;
        }

	    /**
	    * Change the conexion
	    */
	    public static function setConexionBD($conexionBD){
	                self::$conexionBD = $conexionBD;
	            }
	}