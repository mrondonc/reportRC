<?php
    /**
     * Import classes
     */	

    
    require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Mod_sapDAO.php';
	

	class ManejoMod_sap{
		
        /**
         * Atribute for the connection to  the database
         */
        private static $conexionBD;		

		function __construct(){
			
		}

        public static function consultarMod_sap($cod_mod_sap){

            $mod_sapDAO = Mod_sapDAO::getMod_sapDAO(self::$conexionBD);
            $mod_sap = $mod_sapDAO->consult($cod_mod_sap);
            return $mod_sap;
        }

        /**
         * Create an modulo sap
         * @param Mod_sap mod sap to create
         * @return void
         */
        public static function createMod_sap($mod_sap){
            $Mod_sapDAO=Mod_sapDAO::getMod_sapDAO(self::$conexionBD);
            $Mod_sapDAO->create($mod_sap);
        }

        /**
         * Modify an Mod_sap
         * @param Mod_sap modulo sap to modify
         * @return void
         */
        public static function modifyMod_sap($mod_sap){
            $mod_sapDAO=Mod_sapDAO::getMod_sapDAO(self::$conexionBD);
            $mod_sapDAO->modify($mod_sap);
        }
        /**
         * Delete an Modulo sap
         * @param Mod_sap modulo sap to modify
         * @return void
         */
        public static function deleteMod_sap($mod_sap){
            $mod_sapDAO=Mod_sapDAO::getMod_sapDAO(self::$conexionBD);
            $mod_sapDAO->delete($mod_sap);
        }

        /**
         * List of modulo sap
         * @return Mod_sap[] List of all the modulo sap in the Data Base
         */
        public static function getList(){
            $mod_sapDAO = Mod_sapDAO::getMod_sapDAO(self::$conexionBD);
            $mod_sap = $mod_sapDAO->getList();
            return $mod_sap;
        }

	    /**
	    * Change the conexion
	    */
	    public static function setConexionBD($conexionBD){
	                self::$conexionBD = $conexionBD;
	            }
	}