<?php

require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Sub_mod_sap.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/DAO.php';

/**
 * 
 *Represents the DAO of the sub modulo sap entity
 *
 */
class Sub_mod_sapDAO implements DAO
{

    /**
     * Reference to the connection with the database
     * @var Object
     */
    private $conexion;

    /**
     * Reference to an sub_mod_sapDAO object
     * @var sub_mod_sapDAO
     */
    private static $sub_mod_sapDAO;

    //------------------------------------------
    // Builder
    //------------------------------------------

    /**
     * Builder of the class
     *
     * @param Object $conexion
     */
    private function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    /**
     * Method to query an sub mod sap by his code type
     *
     * @param int $cod_sub_mod_sap
     * @return Sub_mod_sap
     */
    public function consult($cod_sub_mod_sap)
    {
        
        $sql = "SELECT * FROM SUB_MOD_SAP WHERE cod_sub_mod_sap = " . $cod_sub_mod_sap;

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        $row = pg_fetch_array($resultado);

        $sub_mod_sap = new Sub_mod_sap();

        $sub_mod_sap->setCod_sub_mod_sap($row[0]);
        $sub_mod_sap->setNombre_sub_mod_sap($row[1]);
        $sub_mod_sap->setCod_cliente_partner($row[2]);

        return $sub_mod_sap;
    }
    
    /**
     * Method to query an sub mod sap by his code type
     *
     * @param int $cod_sub_mod_sap
     * @return Sub_mod_sap
     */
    public function consultCodigoCliente($cod_cliente_partner)
    {
        
        $sql = "SELECT * FROM SUB_MOD_SAP WHERE cod_cliente_partner = " . $cod_cliente_partner;

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        $row = pg_fetch_array($resultado);

        $sub_mod_sap = new Sub_mod_sap();

        $sub_mod_sap->setCod_sub_mod_sap($row[0]);
        $sub_mod_sap->setNombre_sub_mod_sap($row[1]);
        $sub_mod_sap->setCod_cliente_partner($row[2]);

        return $sub_mod_sap;
    }


    /**
     * Method to create a new sub_mod_sap
     *
     * @param Sub_mod_sap $sub_mod_sap
     * @return void
     */
    public function create($sub_mod_sap)
    {
        $sql = "insert into SUB_MOD_SAP values (" . $sub_mod_sap->getCod_sub_mod_sap() . ",
                                            '" . $sub_mod_sap->getNombre_sub_mod_sap() . "',
                                            " . $sub_mod_sap->getCod_cliente_partner() . "                                               
                                        );";

        pg_query($this->conexion, $sql);
    }

    /**
     * Method that modifies an sub_mod_sap entered by parameter
     *
     * @param Sub_mod_sap $sub_mod_sap
     * @return void
     */
    public function modify($sub_mod_sap)
    {

        $sql = "UPDATE SUB_MOD_SAP SET cod_sub_mod_sap = " . $sub_mod_sap->getCod_sub_mod_sap() . ",
                                   nombre_sub_mod_sap = '" . $sub_mod_sap->getNombre_sub_mod_sap() . "',
                                   cod_cliente_partner = " . $sub_mod_sap->getCod_cliente_partner() . ",
                                   where cod_sub_mod_sap = " . $sub_mod_sap->getCod_sub_mod_sap() . "
                                ;";
        pg_query($this->conexion, $sql);
    }

    /**
     * Method to delete a sub_mod_sap
     *
     * @param Sub_mod_sap $Sub_mod_sap
     * @return void
     */

    public function delete($cod_sub_mod_sap)
    {
        $sql = "DELETE FROM SUB_MOD_SAP WHERE cod_sub_mod_sap = " . $cod_sub_mod_sap;

        pg_query($this->conexion, $sql);
    }

    /**
     * Method to get an sub_mod_sapDAO object
     *
     * @param Object $conexion
     * @return Sub_mod_sapDAO
     */
    public function getList()
    {

        $sql = "SELECT * FROM SUB_MOD_SAP";
        $sub_mod_saps = array();
        if (!$resultado = pg_query($this->conexion, $sql)) die();

        while ($row = pg_fetch_array($resultado)) {
            $sub_mod_sap = new Sub_mod_sap();
            $sub_mod_sap->setCod_sub_mod_sap($row[0]);
            $sub_mod_sap->setNombre_sub_mod_sap($row[1]);
            $sub_mod_sap->setCod_cliente_partner($row[2]);
            array_push($sub_mod_saps, $sub_mod_sap);
        }
        return $sub_mod_saps;
    }

     /**
     * Method to get an sub_mod_sapDAO object
     *
     * @param Object $conexion
     * @return Sub_mod_sapDAO
     */
    public function getListAxity()
    {

        $sql = "SELECT * FROM SUB_MOD_SAP WHERE cod_cliente_partner = 1";
        $sub_mod_saps = array();
        if (!$resultado = pg_query($this->conexion, $sql)) die();

        while ($row = pg_fetch_array($resultado)) {
            $sub_mod_sap = new Sub_mod_sap();
            $sub_mod_sap->setCod_sub_mod_sap($row[0]);
            $sub_mod_sap->setNombre_sub_mod_sap($row[1]);
            $sub_mod_sap->setCod_cliente_partner($row[2]);
            array_push($sub_mod_saps, $sub_mod_sap);
        }
        return $sub_mod_saps;
    }


    /**
     * Gets the object of this class. In case it is null, create it
     *
     * @param Object $conexion
     * @return Sub_mod_sapDAO
     */
    public static function getSub_mod_sapDAO($conexion)
    {
        if (self::$sub_mod_sapDAO == null) {
            self::$sub_mod_sapDAO = new Sub_mod_sapDAO($conexion);
        }

        return self::$sub_mod_sapDAO;
    }

}
?>