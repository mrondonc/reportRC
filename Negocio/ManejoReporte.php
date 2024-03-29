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
        public static function getListPorMesActual(){
            $reporteDAO = ReporteDAO::getReporteDAO(self::$conexionBD);
            $reporte = $reporteDAO->getListPorMesActual();
            return $reporte;
        }

        /**
         * List of reporte
         * @return Reporte[] List of all the reporte in the Data Base
         */
        public static function getListPorMesActualMax5(){
            $reporteDAO = ReporteDAO::getReporteDAO(self::$conexionBD);
            $reporte = $reporteDAO->getListPorMesActualMax5();
            return $reporte;
        }

        /**
         * List of reporte
         * @return Reporte[] List of all the reporte in the Data Base
         */
        public static function getListPorMesEnero(){
            $reporteDAO = ReporteDAO::getReporteDAO(self::$conexionBD);
            $reporte = $reporteDAO->getListPorMesEnero();
            return $reporte;
        }

        /**
         * List of reporte
         * @return Reporte[] List of all the reporte in the Data Base
         */
        public static function getListPorMesEneroByUser($cod_usuario){
            $reporteDAO = ReporteDAO::getReporteDAO(self::$conexionBD);
            $reporte = $reporteDAO->getListPorMesEneroByUser($cod_usuario);
            return $reporte;
        }

         /**
         * List of reporte
         * @return Reporte[] List of all the reporte in the Data Base
         */
        public static function getListPorMesFebrero(){
            $reporteDAO = ReporteDAO::getReporteDAO(self::$conexionBD);
            $reporte = $reporteDAO->getListPorMesFebrero();
            return $reporte;
        }

         /**
         * List of reporte
         * @return Reporte[] List of all the reporte in the Data Base
         */
        public static function getListPorMesFebreroByUser($cod_usuario){
            $reporteDAO = ReporteDAO::getReporteDAO(self::$conexionBD);
            $reporte = $reporteDAO->getListPorMesFebreroByUser($cod_usuario);
            return $reporte;
        }

         /**
         * List of reporte
         * @return Reporte[] List of all the reporte in the Data Base
         */
        public static function getListPorMesMarzo(){
            $reporteDAO = ReporteDAO::getReporteDAO(self::$conexionBD);
            $reporte = $reporteDAO->getListPorMesMarzo();
            return $reporte;
        }

         /**
         * List of reporte
         * @return Reporte[] List of all the reporte in the Data Base
         */
        public static function getListPorMesMarzoByUser($cod_usuario){
            $reporteDAO = ReporteDAO::getReporteDAO(self::$conexionBD);
            $reporte = $reporteDAO->getListPorMesMarzoByUser($cod_usuario);
            return $reporte;
        }

         /**
         * List of reporte
         * @return Reporte[] List of all the reporte in the Data Base
         */
        public static function getListPorMesAbril(){
            $reporteDAO = ReporteDAO::getReporteDAO(self::$conexionBD);
            $reporte = $reporteDAO->getListPorMesAbril();
            return $reporte;
        }

         /**
         * List of reporte
         * @return Reporte[] List of all the reporte in the Data Base
         */
        public static function getListPorMesAbrilByUser($cod_usuario){
            $reporteDAO = ReporteDAO::getReporteDAO(self::$conexionBD);
            $reporte = $reporteDAO->getListPorMesAbrilByUser($cod_usuario);
            return $reporte;
        }

         /**
         * List of reporte
         * @return Reporte[] List of all the reporte in the Data Base
         */
        public static function getListPorMesMayo(){
            $reporteDAO = ReporteDAO::getReporteDAO(self::$conexionBD);
            $reporte = $reporteDAO->getListPorMesMayo();
            return $reporte;
        }

         /**
         * List of reporte
         * @return Reporte[] List of all the reporte in the Data Base
         */
        public static function getListPorMesMayoByUser($cod_usuario){
            $reporteDAO = ReporteDAO::getReporteDAO(self::$conexionBD);
            $reporte = $reporteDAO->getListPorMesMayoByUser($cod_usuario);
            return $reporte;
        }

         /**
         * List of reporte
         * @return Reporte[] List of all the reporte in the Data Base
         */
        public static function getListPorMesJunio(){
            $reporteDAO = ReporteDAO::getReporteDAO(self::$conexionBD);
            $reporte = $reporteDAO->getListPorMesJunio();
            return $reporte;
        }

        /**
         * List of reporte
         * @return Reporte[] List of all the reporte in the Data Base
         */
        public static function getListPorMesJunioByUser($cod_usuario){
            $reporteDAO = ReporteDAO::getReporteDAO(self::$conexionBD);
            $reporte = $reporteDAO->getListPorMesJunioByUser($cod_usuario);
            return $reporte;
        }

         /**
         * List of reporte
         * @return Reporte[] List of all the reporte in the Data Base
         */
        public static function getListPorMesJulio(){
            $reporteDAO = ReporteDAO::getReporteDAO(self::$conexionBD);
            $reporte = $reporteDAO->getListPorMesJulio();
            return $reporte;
        }

         /**
         * List of reporte
         * @return Reporte[] List of all the reporte in the Data Base
         */
        public static function getListPorMesJulioByUser($cod_usuario){
            $reporteDAO = ReporteDAO::getReporteDAO(self::$conexionBD);
            $reporte = $reporteDAO->getListPorMesJulioByUser($cod_usuario);
            return $reporte;
        }

         /**
         * List of reporte
         * @return Reporte[] List of all the reporte in the Data Base
         */
        public static function getListPorMesAgosto(){
            $reporteDAO = ReporteDAO::getReporteDAO(self::$conexionBD);
            $reporte = $reporteDAO->getListPorMesAgosto();
            return $reporte;
        }

         /**
         * List of reporte
         * @return Reporte[] List of all the reporte in the Data Base
         */
        public static function getListPorMesAgostoByUser($cod_usuario){
            $reporteDAO = ReporteDAO::getReporteDAO(self::$conexionBD);
            $reporte = $reporteDAO->getListPorMesAgostoByUser($cod_usuario);
            return $reporte;
        }

         /**
         * List of reporte
         * @return Reporte[] List of all the reporte in the Data Base
         */
        public static function getListPorMesSeptiembre(){
            $reporteDAO = ReporteDAO::getReporteDAO(self::$conexionBD);
            $reporte = $reporteDAO->getListPorMesSeptiembre();
            return $reporte;
        }

         /**
         * List of reporte
         * @return Reporte[] List of all the reporte in the Data Base
         */
        public static function getListPorMesSeptiembreByUser($cod_usuario){
            $reporteDAO = ReporteDAO::getReporteDAO(self::$conexionBD);
            $reporte = $reporteDAO->getListPorMesSeptiembreByUser($cod_usuario);
            return $reporte;
        }

         /**
         * List of reporte
         * @return Reporte[] List of all the reporte in the Data Base
         */
        public static function getListPorMesOctubre(){
            $reporteDAO = ReporteDAO::getReporteDAO(self::$conexionBD);
            $reporte = $reporteDAO->getListPorMesOctubre();
            return $reporte;
        }

         /**
         * List of reporte
         * @return Reporte[] List of all the reporte in the Data Base
         */
        public static function getListPorMesOctubreByUser($cod_usuario){
            $reporteDAO = ReporteDAO::getReporteDAO(self::$conexionBD);
            $reporte = $reporteDAO->getListPorMesOctubreByUser($cod_usuario);
            return $reporte;
        }

         /**
         * List of reporte
         * @return Reporte[] List of all the reporte in the Data Base
         */
        public static function getListPorMesNoviembre(){
            $reporteDAO = ReporteDAO::getReporteDAO(self::$conexionBD);
            $reporte = $reporteDAO->getListPorMesNoviembre();
            return $reporte;
        }

         /**
         * List of reporte
         * @return Reporte[] List of all the reporte in the Data Base
         */
        public static function getListPorMesNoviembreByUser($cod_usuario){
            $reporteDAO = ReporteDAO::getReporteDAO(self::$conexionBD);
            $reporte = $reporteDAO->getListPorMesNoviembreByUser($cod_usuario);
            return $reporte;
        }

         /**
         * List of reporte
         * @return Reporte[] List of all the reporte in the Data Base
         */
        public static function getListPorMesDiciembre(){
            $reporteDAO = ReporteDAO::getReporteDAO(self::$conexionBD);
            $reporte = $reporteDAO->getListPorMesDiciembre();
            return $reporte;
        }

         /**
         * List of reporte
         * @return Reporte[] List of all the reporte in the Data Base
         */
        public static function getListPorMesDiciembreByUser($cod_usuario){
            $reporteDAO = ReporteDAO::getReporteDAO(self::$conexionBD);
            $reporte = $reporteDAO->getListPorMesDiciembreByUser($cod_usuario);
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
         * List of reporte
         * @return Reporte[] List of all the reporte in the Data Base
         */
        public static function getListByUserMax15($cod_usuario){
            $reporteDAO = ReporteDAO::getReporteDAO(self::$conexionBD);
            $reporte = $reporteDAO->getListByUserMax15($cod_usuario);
            return $reporte;
        }

        /**
         * List of reporte
         * @return Reporte[] List of all the reporte in the Data Base
         */
        public static function getListByUserMax5($cod_usuario){
            $reporteDAO = ReporteDAO::getReporteDAO(self::$conexionBD);
            $reporte = $reporteDAO->getListByUserMax5($cod_usuario);
            return $reporte;
        }

        /**
         * List of reporte
         * @return Reporte[] List of all the reporte in the Data Base
         */
        public static function getListReporteMensual($cod_usuario){
            $reporteDAO = ReporteDAO::getReporteDAO(self::$conexionBD);
            $reporte = $reporteDAO->getListReporteMensual($cod_usuario);
            return $reporte;
        }

        /**
         * List of reporte
         * @return Reporte[] List of all the reporte in the Data Base
         */
        public static function getListPorUsuarioNew($cod_usuario){
            $reporteDAO = ReporteDAO::getReporteDAO(self::$conexionBD);
            $reporte = $reporteDAO->getListPorUsuarioNew($cod_usuario);
            return $reporte;
        }

	    /**
	    * Change the conexion
	    */
	    public static function setConexionBD($conexionBD){
	                self::$conexionBD = $conexionBD;
	            }
	}