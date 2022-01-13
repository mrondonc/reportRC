<?php
    /**
     * Import classes
     */	

    
    require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/ReporteDAO.php';
	

	class ManejoReporte{
		
        /**
         * Atribute for the connection to  the database
         */
        private static $conexionBD;		

		function __construct(){
			
		}

        public static function consultarReporte($cod_reporte){

            $reporteDAO = ReporteDAO::getReporteDAO(self::$conexionBD);
            $reporte = $reporteDAO->consult($cod_reporte);
            return $reporte;
        }

        public static function consultarReporteUsuario($cod_usuario){

            $reporteDAO = ReporteDAO::getReporteDAO(self::$conexionBD);
            $reporte = $reporteDAO->consultUsuario($cod_usuario);
            return $reporte;
        }

        /**
         * Create an  reporte
         * @param Reporte reporte to create
         * @return void
         */
        public static function createReporte($reporte){
            $ReporteDAO=ReporteDAO::getReporteDAO(self::$conexionBD);
            $ReporteDAO->create($reporte);
        }

        /**
         * Modify an reporte
         * @param Reporte reporte to modify
         * @return void
         */
        public static function modifyReporte($reporte){
            $reporteDAO=ReporteDAO::getReporteDAO(self::$conexionBD);
            $reporteDAO->modify($reporte);
        }
        /**
         * Delete an reporte
         * @param Reporte reporte to modify
         * @return void
         */
        public static function deleteReporte($reporte){
            $reporteDAO=ReporteDAO::getReporteDAO(self::$conexionBD);
            $reporteDAO->delete($reporte);
        }

        /**
         * List of reporte
         * @return Reporte[] List of all the reporte in the Data Base
         */
        public static function getList(){
            $reporteDAO = ReporteDAO::getReporteDAO(self::$conexionBD);
            $reporte = $reporteDAO->getList();
            return $reporte;
        }

        /**
         * List of reporte
         * @return Reporte[] List of all the reporte in the Data Base
         */
        public static function getListByUser($cod_usuario){
            $reporteDAO = ReporteDAO::getReporteDAO(self::$conexionBD);
            $reporte = $reporteDAO->getListByUser($cod_usuario);
            return $reporte;
        }

	    /**
	    * Change the conexion
	    */
	    public static function setConexionBD($conexionBD){
	                self::$conexionBD = $conexionBD;
	            }
	}