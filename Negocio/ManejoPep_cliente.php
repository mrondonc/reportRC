<?php
    /**
     * Import classes
     */	

    
    require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Pep_clienteDAO.php';
	

	class ManejoPep_cliente{
		
        /**
         * Atribute for the connection to  the database
         */
        private static $conexionBD;		

		function __construct(){
			
		}

        public static function consultarPep_cliente($cod_pep_cliente){

            $pep_clienteDAO = Pep_clienteDAO::getPep_clienteDAO(self::$conexionBD);
            $pep_cliente = $pep_clienteDAO->consult($cod_pep_cliente);
            return $pep_cliente;
        }

        /**
         * Create an pep cliente
         * @param Pep_cliente pep del cliente to create
         * @return void
         */
        public static function createPep_cliente($pep_cliente){
            $Pep_clienteDAO=Pep_clienteDAO::getPep_clienteDAO(self::$conexionBD);
            $Pep_clienteDAO->create($pep_cliente);
        }

        /**
         * Modify an Pep_cliente
         * @param Pep_cliente pep del cliente to modify
         * @return void
         */
        public static function modifyPep_cliente($pep_cliente){
            $pep_clienteDAO=Pep_clienteDAO::getPep_clienteDAO(self::$conexionBD);
            $pep_clienteDAO->modify($pep_cliente);
        }
        /**
         * Delete an pep del cliente
         * @param Pep_cliente pep_cliente to modify
         * @return void
         */
        public static function deletePep_cliente($pep_cliente){
            $pep_clienteDAO=Pep_clienteDAO::getPep_clienteDAO(self::$conexionBD);
            $pep_clienteDAO->delete($pep_cliente);
        }

        /**
         * List of Pep del cliente
         * @return Pep_cliente[] List of all the pep del cliente in the Data Base
         */
        public static function getList(){
            $pep_clienteDAO = Pep_clienteDAO::getPep_clienteDAO(self::$conexionBD);
            $pep_cliente = $pep_clienteDAO->getList();
            return $pep_cliente;
        }

        /**
         * List of Pep del cliente
         * @return Pep_cliente[] List of all the pep del cliente in the Data Base
         */
        public static function getListSeidor(){
            $pep_clienteDAO = Pep_clienteDAO::getPep_clienteDAO(self::$conexionBD);
            $pep_cliente = $pep_clienteDAO->getListSeidor();
            return $pep_cliente;
        }

	    /**
	    * Change the conexion
	    */
	    public static function setConexionBD($conexionBD){
	                self::$conexionBD = $conexionBD;
	            }
	}