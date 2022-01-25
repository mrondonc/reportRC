<?php
    /**
     * Import classes
     */	

    
    require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/AdministradorDAO.php';
	

	class ManejoAdministrador{
		
        /**
         * Atribute for the connection to  the database
         */
        private static $conexionBD;		

		function __construct(){
			
		}

        public static function consultarAdministrador($cod_administrador){

            $administradorDAO = AdministradorDAO::getAdministradorDAO(self::$conexionBD);
            $administrador = $administradorDAO->consult($cod_administrador);
            return $administrador;
        }

        public static function verificarCuentaAdministrador($correo,$pass){

            $administradorDAO = AdministradorDAO::getAdministradorDAO(self::$conexionBD);
            $administrador = $administradorDAO->verificarCuenta($correo,$pass);
            return $administrador;
        }

        /**
         * Create an administrador
         * @param Administrador usuario to create
         * @return void
         */
        public static function createAdministrador($administrador){
            $administradorDAO=AdministradorDAO::getAdministradorDAO(self::$conexionBD);
            $administradorDAO->create($administrador);
        }

        /**
         * Modify an Usuario
         * @param Administrador usuario to modify
         * @return void
         */
        public static function modifyAdministrador($administrador){
            $administradorDAO=AdministradorDAO::getAdministradorDAO(self::$conexionBD);
            $administradorDAO->modify($administrador);
        }
        /**
         * Delete an usuario
         * @param Administrador usuario to modify
         * @return void
         */
        public static function deleteAdministrador($administrador){
            $administradorDAO=AdministradorDAO::getAdministradorDAO(self::$conexionBD);
            $administradorDAO->delete($administrador);
        }

        /**
         * List of usuario
         * @return Administrador[] List of all the usuario in the Data Base
         */
        public static function getList(){
            $administradorDAO = AdministradorDAO::getAdministradorDAO(self::$conexionBD);
            $administradorDAO = $administradorDAO->getList();
        }

	    /**
	    * Change the conexion
	    */
	    public static function setConexionBD($conexionBD){
	                self::$conexionBD = $conexionBD;
	            }
	}