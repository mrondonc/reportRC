<?php
    /**
     * Import classes
     */	

    
    require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/No_ticketDAO.php';
	

	class ManejoNo_ticket{
		
        /**
         * Atribute for the connection to  the database
         */
        private static $conexionBD;		

		function __construct(){
			
		}

        public static function consultarNo_ticket($cod_no_ticket){

            $no_ticketDAO = No_ticketDAO::getNo_ticketDAO(self::$conexionBD);
            $no_ticket = $no_ticketDAO->consult($cod_no_ticket);
            return $no_ticket;
        }

        /**
         * Create an numero de ticket
         * @param No_ticket numero de ticket to create
         * @return void
         */
        public static function createNo_ticket($no_ticket){
            $No_ticketDAO=No_ticketDAO::getNo_ticketDAO(self::$conexionBD);
            $No_ticketDAO->create($no_ticket);
        }

        /**
         * Modify an No_ticket
         * @param No_ticket numero de ticket to modify
         * @return void
         */
        public static function modifyNo_ticket($no_ticket){
            $no_ticketDAO=No_ticketDAO::getNo_ticketDAO(self::$conexionBD);
            $no_ticketDAO->modify($no_ticket);
        }
        /**
         * Delete an Numero de ticket
         * @param No_ticket numero de ticket to modify
         * @return void
         */
        public static function deleteNo_ticket($no_ticket){
            $no_ticketDAO=No_ticketDAO::getNo_ticketDAO(self::$conexionBD);
            $no_ticketDAO->delete($no_ticket);
        }

        /**
         * List of numero de ticket
         * @return No_ticket[] List of all the numero de ticket in the Data Base
         */
        public static function getList(){
            $no_ticketDAO = No_ticketDAO::getNo_ticketDAO(self::$conexionBD);
            $no_ticket = $no_ticketDAO->getList();
            return $no_ticket;
        }

         /**
         * List of numero de ticket
         * @return No_ticket[] List of all the numero de ticket in the Data Base
         */
        public static function getListAxity(){
            $no_ticketDAO = No_ticketDAO::getNo_ticketDAO(self::$conexionBD);
            $no_ticket = $no_ticketDAO->getListAxity();
            return $no_ticket;
        }

	    /**
	    * Change the conexion
	    */
	    public static function setConexionBD($conexionBD){
	                self::$conexionBD = $conexionBD;
	            }
	}