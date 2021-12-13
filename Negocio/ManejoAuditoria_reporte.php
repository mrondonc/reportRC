<?php
    /**
     * Import classes
     */	

    
    require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Auditoria_reporteDAO.php';
	

	class ManejoAuditoria_reporte{
		
        /**
         * Atribute for the connection to  the database
         */
        private static $conexionBD;		

		function __construct(){
			
		}

        public static function consultarAuditoria_reporte($cod_reporte){

            $auditoria_reporteDAO = Auditoria_reporteDAO::getAuditoria_reporteDAO(self::$conexionBD);
            $auditoria_reporte = $auditoria_reporteDAO->consult($cod_reporte);
            return $auditoria_reporte;
        }

        /**
         * Create an auditoria reporte
         * @param Auditoria_reporte auditoria_reporte to create
         * @return void
         */
        public static function createAuditoria_reporte($auditoria_reporte){
            $Auditoria_reporteDAO=Auditoria_reporteDAO::getAuditoria_reporteDAO(self::$conexionBD);
            $Auditoria_reporteDAO->create($auditoria_reporte);
        }

        /**
         * Modify an Auditoria reporte
         * @param Auditoria_reporte auditoria reporte to modify
         * @return void
         */
        public static function modifyAuditoria_reporte($auditoria_reporte){
            $auditoria_reporteDAO=Auditoria_reporteDAO::getAuditoria_reporteDAO(self::$conexionBD);
            $auditoria_reporteDAO->modify($auditoria_reporte);
        }
        /**
         * Delete an Auditoria reporte
         * @param Auditoria_reporte auditoria_reporte to modify
         * @return void
         */
        public static function deleteAuditoria_reporte($auditoria_reporte){
            $auditoria_reporteDAO=Auditoria_reporteDAO::getAuditoria_reporteDAO(self::$conexionBD);
            $auditoria_reporteDAO->delete($auditoria_reporte);
        }

        /**
         * List of auditoria reporte
         * @return Auditoria_reporte[] List of all the auditoria reporte in the Data Base
         */
        public static function getList(){
            $auditoria_reporteDAO = Auditoria_reporteDAO::getAuditoria_reporteDAO(self::$conexionBD);
            $auditoria_reporte = $auditoria_reporteDAO->getList();
        }

	    /**
	    * Change the conexion
	    */
	    public static function setConexionBD($conexionBD){
	                self::$conexionBD = $conexionBD;
	            }
	}