<?php

require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Sub_cliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/DAO.php';

/**
 * 
 *Represents the DAO of the sub cliente partner entity
 *
 */
class Sub_cliente_partnerDAO implements DAO
{

    /**
     * Reference to the connection with the database
     * @var Object
     */
    private $conexion;

    /**
     * Reference to an sub_cliente_partnerDAO object
     * @var sub_cliente_partnerDAO
     */
    private static $sub_cliente_partnerDAO;

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
     * Method to query an sub cliente partner by his code type
     *
     * @param int $cod_sub_cliente_partner
     * @return Sub_cliente_partner
     */
    public function consult($cod_sub_cliente_partner)
    {
        
        $sql = "SELECT * FROM SUB_CLIENTE_PARTNER WHERE cod_sub_cliente_partner = " . $cod_sub_cliente_partner;

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        $row = pg_fetch_array($resultado);

        $sub_cliente_partner = new Sub_cliente_partner();

        $sub_cliente_partner->setCod_sub_cliente_partner($row[0]);
        $sub_cliente_partner->setNombre_sub_cliente_partner($row[1]);
        $sub_cliente_partner->setCod_cliente_partner($row[2]);

        return $sub_cliente_partner;
    }




    /**
     * Method to create a new sub_cliente_partner
     *
     * @param Sub_cliente_partner $sub_cliente_partner
     * @return void
     */
    public function create($sub_cliente_partner)
    {
        $sql = "insert into SUB_CLIENTE_PARTNER values (" . $sub_cliente_partner->getCod_sub_cliente_partner() . ",
                                            '" . $sub_cliente_partner->getNombre_sub_cliente_partner() . "',
                                            " . $sub_cliente_partner->getCod_cliente_partner() . "                                               
                                        );";

        pg_query($this->conexion, $sql);
    }

    /**
     * Method that modifies an sub_cliente_partner entered by parameter
     *
     * @param Sub_cliente_partner $sub_cliente_partner
     * @return void
     */
    public function modify($sub_cliente_partner)
    {

        $sql = "UPDATE SUB_CLIENTE_PARTNER SET cod_sub_cliente_partner = " . $sub_cliente_partner->getCod_sub_cliente_partner() . ",
                                   nombre_sub_cliente_partner = '" . $sub_cliente_partner->getNombre_sub_cliente_partner() . "',
                                   cod_cliente_partner = " . $sub_cliente_partner->getCod_cliente_partner() . ",
                                   where cod_sub_cliente_partner = " . $sub_cliente_partner->getCod_sub_cliente_partner() . "
                                ;";
        pg_query($this->conexion, $sql);
    }

    /**
     * Method to delete a sub_cliente_partner
     *
     * @param Sub_cliente_partner $Sub_cliente_partner
     * @return void
     */

    public function delete($cod_sub_cliente_partner)
    {
        $sql = "DELETE FROM SUB_CLIENTE_PARTNER WHERE cod_sub_cliente_partner = " . $cod_sub_cliente_partner;

        pg_query($this->conexion, $sql);
    }

    /**
     * Method to get an sub_cliente_partnerDAO object
     *
     * @param Object $conexion
     * @return Sub_cliente_partnerDAO
     */
    public function getList()
    {

        $sql = "SELECT * FROM SUB_CLIENTE_PARTNER";
        $sub_cliente_partners = array();

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        while ($row = pg_fetch_array($resultado)) {
            $sub_cliente_partner = new Sub_cliente_partner();
            $sub_cliente_partner->setCod_sub_cliente_partner($row[0]);
            $sub_cliente_partner->setNombre_sub_cliente_partner($row[1]);
            $sub_cliente_partner->setCod_cliente_partner($row[2]);
            array_push($sub_cliente_partners, $sub_cliente_partner);
            
        }
        return $sub_cliente_partners;
    }

    
    /**
     * Method to get an sub_cliente_partnerDAO object
     *
     * @param Object $conexion
     * @return Sub_cliente_partnerDAO
     */
    public function getListAxity()
    {

        $sql = "SELECT * FROM SUB_CLIENTE_PARTNER WHERE cod_cliente_partner = 1";
        $sub_cliente_partners = array();

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        while ($row = pg_fetch_array($resultado)) {
            $sub_cliente_partner = new Sub_cliente_partner();
            $sub_cliente_partner->setCod_sub_cliente_partner($row[0]);
            $sub_cliente_partner->setNombre_sub_cliente_partner($row[1]);
            $sub_cliente_partner->setCod_cliente_partner($row[2]);
            array_push($sub_cliente_partners, $sub_cliente_partner);
            
        }
        return $sub_cliente_partners;
    }

    /**
     * Method to get an sub_cliente_partnerDAO object
     *
     * @param Object $conexion
     * @return Sub_cliente_partnerDAO
     */
    public function getListEveris()
    {

        $sql = "SELECT * FROM SUB_CLIENTE_PARTNER WHERE cod_cliente_partner = 2";
        $sub_cliente_partners = array();

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        while ($row = pg_fetch_array($resultado)) {
            $sub_cliente_partner = new Sub_cliente_partner();
            $sub_cliente_partner->setCod_sub_cliente_partner($row[0]);
            $sub_cliente_partner->setNombre_sub_cliente_partner($row[1]);
            $sub_cliente_partner->setCod_cliente_partner($row[2]);
            array_push($sub_cliente_partners, $sub_cliente_partner);
            
        }
        return $sub_cliente_partners;
    }

    /**
     * Method to get an sub_cliente_partnerDAO object
     *
     * @param Object $conexion
     * @return Sub_cliente_partnerDAO
     */
    public function getListMillo()
    {

        $sql = "SELECT * FROM SUB_CLIENTE_PARTNER WHERE cod_cliente_partner = 4";
        $sub_cliente_partners = array();

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        while ($row = pg_fetch_array($resultado)) {
            $sub_cliente_partner = new Sub_cliente_partner();
            $sub_cliente_partner->setCod_sub_cliente_partner($row[0]);
            $sub_cliente_partner->setNombre_sub_cliente_partner($row[1]);
            $sub_cliente_partner->setCod_cliente_partner($row[2]);
            array_push($sub_cliente_partners, $sub_cliente_partner);
            
        }
        return $sub_cliente_partners;
    }   


    /**
     * Gets the object of this class. In case it is null, create it
     *
     * @param Object $conexion
     * @return Sub_cliente_partnerDAO
     */
    public static function getSub_cliente_partnerDAO($conexion)
    {
        if (self::$sub_cliente_partnerDAO == null) {
            self::$sub_cliente_partnerDAO = new Sub_cliente_partnerDAO($conexion);
        }

        return self::$sub_cliente_partnerDAO;
    }

}
?>