<?php
    /**
     * Import classes
     */	

    
    require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Cliente_partnerDAO.php';
	

	class ManejoCliente_partner{
		
        /**
         * Atribute for the connection to  the database
         */
        private static $conexionBD;		

		function __construct(){
			
		}

        public static function consultarCliente_partner($cod_cliente_partner){

            $cliente_partnerDAO = Cliente_partnerDAO::getCliente_partnerDAO(self::$conexionBD);
            $cliente_partner = $cliente_partnerDAO->consult($cod_cliente_partner);
            return $cliente_partner;
        }

        /**
         * Create an cliente partner
         * @param Cliente_partner cliente partner to create
         * @return void
         */
        public static function createCliente_partner($cliente_partner){
            $Cliente_partnerDAO=Cliente_partnerDAO::getCliente_partnerDAO(self::$conexionBD);
            $Cliente_partnerDAO->create($cliente_partner);
        }

        /**
         * Modify an Cliente_partner
         * @param Cliente_partner cliente partner to modify
         * @return void
         */
        public static function modifyCliente_partner($cliente_partner){
            $cliente_partnerDAO=Cliente_partnerDAO::getCliente_partnerDAO(self::$conexionBD);
            $cliente_partnerDAO->modify($cliente_partner);
        }
        /**
         * Delete an Cliente partner
         * @param Cliente_partner cliente_partner to modify
         * @return void
         */
        public static function deleteCliente_partner($cliente_partner){
            $cliente_partnerDAO=Cliente_partnerDAO::getCliente_partnerDAO(self::$conexionBD);
            $cliente_partnerDAO->delete($cliente_partner);
        }

        /**
         * List of cliente partner
         * @return Cliente_partner[] List of all the auditoria reporte in the Data Base
         */
        public static function getList(){
            $cliente_partnerDAO = Cliente_partnerDAO::getCliente_partnerDAO(self::$conexionBD);
            $cliente_partner = $cliente_partnerDAO->getList();
            return $cliente_partner;
        }

	    /**
	    * Change the conexion
	    */
	    public static function setConexionBD($conexionBD){
	                self::$conexionBD = $conexionBD;
	            }
	}