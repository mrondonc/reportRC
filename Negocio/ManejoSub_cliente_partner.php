<?php
    /**
     * Import classes
     */	

    
    require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Sub_cliente_partnerDAO.php';
	

	class ManejoSub_cliente_partner{
		
        /**
         * Atribute for the connection to  the database
         */
        private static $conexionBD;		

		function __construct(){
			
		}

        public static function consultarSub_cliente_partner($cod_sub_cliente_partner){

            $sub_cliente_partnerDAO = Sub_cliente_partnerDAO::getSub_cliente_partnerDAO(self::$conexionBD);
            $sub_cliente_partner = $sub_cliente_partnerDAO->consult($cod_sub_cliente_partner);
            return $sub_cliente_partner;
        }

        public static function consultarSub_cliente_partnerPorCLiente($cod_cliente_partner){

            $sub_cliente_partnerDAO = Sub_cliente_partnerDAO::getSub_cliente_partnerDAO(self::$conexionBD);
            $sub_cliente_partner = $sub_cliente_partnerDAO->consultCodCliente($cod_cliente_partner);
            return $sub_cliente_partner;
        }

        /**
         * Create an sub cliente partner
         * @param Sub_cliente_partner sub cliente partner to create
         * @return void
         */
        public static function createSub_cliente_partner($sub_cliente_partner){
            $Sub_cliente_partnerDAO=Sub_cliente_partnerDAO::getSub_cliente_partnerDAO(self::$conexionBD);
            $Sub_cliente_partnerDAO->create($sub_cliente_partner);
        }

        /**
         * Modify an Sub_sliente_partner
         * @param Sub_cliente_partner sub cliente partner to modify
         * @return void
         */
        public static function modifySub_cliente_partner($sub_cliente_partner){
            $sub_cliente_partnerDAO=Sub_cliente_partnerDAO::getSub_cliente_partnerDAO(self::$conexionBD);
            $sub_cliente_partnerDAO->modify($sub_cliente_partner);
        }
        /**
         * Delete an Sub Cliente partner
         * @param Sub_cliente_partner sub_cliente_partner to modify
         * @return void
         */
        public static function deleteSub_cliente_partner($sub_cliente_partner){
            $sub_cliente_partnerDAO=Sub_cliente_partnerDAO::getSub_cliente_partnerDAO(self::$conexionBD);
            $sub_cliente_partnerDAO->delete($sub_cliente_partner);
        }

        /**
         * List of sub cliente partner
         * @return Sub_cliente_partner[] List of all the sub cliente partner in the Data Base
         */
        public static function getList(){
            $sub_cliente_partnerDAO = Sub_cliente_partnerDAO::getSub_cliente_partnerDAO(self::$conexionBD);
            $sub_cliente_partner = $sub_cliente_partnerDAO->getList();
            return $sub_cliente_partner;
        }

        /**
         * List of sub cliente partner
         * @return Sub_cliente_partner[] List of all the sub cliente partner in the Data Base
         */
        public static function getListAxity(){
            $sub_cliente_partnerDAO = Sub_cliente_partnerDAO::getSub_cliente_partnerDAO(self::$conexionBD);
            $sub_cliente_partner = $sub_cliente_partnerDAO->getListAxity();
            return $sub_cliente_partner;
        }

        /**
         * List of sub cliente partner
         * @return Sub_cliente_partner[] List of all the sub cliente partner in the Data Base
         */
        public static function getListEveris(){
            $sub_cliente_partnerDAO = Sub_cliente_partnerDAO::getSub_cliente_partnerDAO(self::$conexionBD);
            $sub_cliente_partner = $sub_cliente_partnerDAO->getListEveris();
            return $sub_cliente_partner;
        }

        /**
         * List of sub cliente partner
         * @return Sub_cliente_partner[] List of all the sub cliente partner in the Data Base
         */
        public static function getListMillo(){
            $sub_cliente_partnerDAO = Sub_cliente_partnerDAO::getSub_cliente_partnerDAO(self::$conexionBD);
            $sub_cliente_partner = $sub_cliente_partnerDAO->getListMillo();
            return $sub_cliente_partner;
        }

	    /**
	    * Change the conexion
	    */
	    public static function setConexionBD($conexionBD){
	                self::$conexionBD = $conexionBD;
	            }
	}