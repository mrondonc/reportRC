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
        $sub_cliente_partner->setCod_estado_actual($row[3]);
        return $sub_cliente_partner;
    }

    /**
     * Method to query an sub cliente partner by his code type
     *
     * @param int $cod_sub_cliente_partner
     * @return Sub_cliente_partner
     */
    public function consultCodCliente($cod_cliente_partner)
    {
        
        $sql = "SELECT * FROM SUB_CLIENTE_PARTNER WHERE cod_cliente_partner = " . $cod_cliente_partner;

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        $row = pg_fetch_array($resultado);

        $sub_cliente_partner = new Sub_cliente_partner();

        $sub_cliente_partner->setCod_sub_cliente_partner($row[0]);
        $sub_cliente_partner->setNombre_sub_cliente_partner($row[1]);
        $sub_cliente_partner->setCod_cliente_partner($row[2]);
        $sub_cliente_partner->setCod_estado_actual($row[3]);
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
        $sql = "insert into SUB_CLIENTE_PARTNER (nombre_sub_cliente_partner, cod_cliente_partner, cod_estado_actual) 
                                        values (
                                            '" . $sub_cliente_partner->getNombre_sub_cliente_partner() . "',
                                            " . $sub_cliente_partner->getCod_cliente_partner() . ",
                                            " . $sub_cliente_partner->getCod_estado_actual() . "                                               
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
                                   cod_estado_actual = " . $sub_cliente_partner->getCod_estado_actual() . "
                                   where cod_sub_cliente_partner = " . $sub_cliente_partner->getCod_sub_cliente_partner() . "
                                ;";
        pg_query($this->conexion, $sql);
    }

    /**
     * Method that modifies an sub_cliente_partner entered by parameter
     *
     * @param Sub_cliente_partner $sub_cliente_partner
     * @return void
     */
    public function modifyEstado($sub_cliente_partner)
    {

        $sql = "UPDATE SUB_CLIENTE_PARTNER SET 
                                   cod_estado_actual = " . $sub_cliente_partner->getCod_estado_actual() . "
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

        $sql = "SELECT * FROM SUB_CLIENTE_PARTNER order by nombre_sub_cliente_partner asc";
        $sub_cliente_partners = array();

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        while ($row = pg_fetch_array($resultado)) {
            $sub_cliente_partner = new Sub_cliente_partner();
            $sub_cliente_partner->setCod_sub_cliente_partner($row[0]);
            $sub_cliente_partner->setNombre_sub_cliente_partner($row[1]);
            $sub_cliente_partner->setCod_cliente_partner($row[2]);
            $sub_cliente_partner->setCod_estado_actual($row[3]);
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

        $sql = "SELECT * FROM SUB_CLIENTE_PARTNER WHERE cod_cliente_partner = 1 order by nombre_sub_cliente_partner asc";
        $sub_cliente_partners = array();

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        while ($row = pg_fetch_array($resultado)) {
            $sub_cliente_partner = new Sub_cliente_partner();
            $sub_cliente_partner->setCod_sub_cliente_partner($row[0]);
            $sub_cliente_partner->setNombre_sub_cliente_partner($row[1]);
            $sub_cliente_partner->setCod_cliente_partner($row[2]);
            $sub_cliente_partner->setCod_estado_actual($row[3]);
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
    public function getListAxityActivo()
    {

        $sql = "SELECT * FROM SUB_CLIENTE_PARTNER WHERE cod_cliente_partner = 1 AND cod_estado_actual=1 order by nombre_sub_cliente_partner asc";
        $sub_cliente_partners = array();

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        while ($row = pg_fetch_array($resultado)) {
            $sub_cliente_partner = new Sub_cliente_partner();
            $sub_cliente_partner->setCod_sub_cliente_partner($row[0]);
            $sub_cliente_partner->setNombre_sub_cliente_partner($row[1]);
            $sub_cliente_partner->setCod_cliente_partner($row[2]);
            $sub_cliente_partner->setCod_estado_actual($row[3]);
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
    public function getListItges()
    {

        $sql = "SELECT * FROM SUB_CLIENTE_PARTNER WHERE cod_cliente_partner = 10 order by nombre_sub_cliente_partner asc";
        $sub_cliente_partners = array();

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        while ($row = pg_fetch_array($resultado)) {
            $sub_cliente_partner = new Sub_cliente_partner();
            $sub_cliente_partner->setCod_sub_cliente_partner($row[0]);
            $sub_cliente_partner->setNombre_sub_cliente_partner($row[1]);
            $sub_cliente_partner->setCod_cliente_partner($row[2]);
            $sub_cliente_partner->setCod_estado_actual($row[3]);
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
    public function getListItgesActivo()
    {

        $sql = "SELECT * FROM SUB_CLIENTE_PARTNER WHERE cod_cliente_partner = 10 AND cod_estado_actual=1 order by nombre_sub_cliente_partner asc";
        $sub_cliente_partners = array();

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        while ($row = pg_fetch_array($resultado)) {
            $sub_cliente_partner = new Sub_cliente_partner();
            $sub_cliente_partner->setCod_sub_cliente_partner($row[0]);
            $sub_cliente_partner->setNombre_sub_cliente_partner($row[1]);
            $sub_cliente_partner->setCod_cliente_partner($row[2]);
            $sub_cliente_partner->setCod_estado_actual($row[3]);
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
    public function getListAVA()
    {

        $sql = "SELECT * FROM SUB_CLIENTE_PARTNER WHERE cod_cliente_partner = 11 order by nombre_sub_cliente_partner asc";
        $sub_cliente_partners = array();

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        while ($row = pg_fetch_array($resultado)) {
            $sub_cliente_partner = new Sub_cliente_partner();
            $sub_cliente_partner->setCod_sub_cliente_partner($row[0]);
            $sub_cliente_partner->setNombre_sub_cliente_partner($row[1]);
            $sub_cliente_partner->setCod_cliente_partner($row[2]);
            $sub_cliente_partner->setCod_estado_actual($row[3]);
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
    public function getListAVAActivo()
    {

        $sql = "SELECT * FROM SUB_CLIENTE_PARTNER WHERE cod_cliente_partner = 11 AND cod_estado_actual=1 order by nombre_sub_cliente_partner asc";
        $sub_cliente_partners = array();

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        while ($row = pg_fetch_array($resultado)) {
            $sub_cliente_partner = new Sub_cliente_partner();
            $sub_cliente_partner->setCod_sub_cliente_partner($row[0]);
            $sub_cliente_partner->setNombre_sub_cliente_partner($row[1]);
            $sub_cliente_partner->setCod_cliente_partner($row[2]);
            $sub_cliente_partner->setCod_estado_actual($row[3]);
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

        $sql = "SELECT * FROM SUB_CLIENTE_PARTNER WHERE cod_cliente_partner = 2 order by nombre_sub_cliente_partner asc";
        $sub_cliente_partners = array();

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        while ($row = pg_fetch_array($resultado)) {
            $sub_cliente_partner = new Sub_cliente_partner();
            $sub_cliente_partner->setCod_sub_cliente_partner($row[0]);
            $sub_cliente_partner->setNombre_sub_cliente_partner($row[1]);
            $sub_cliente_partner->setCod_cliente_partner($row[2]);
            $sub_cliente_partner->setCod_estado_actual($row[3]);
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
    public function getListEverisActivo()
    {

        $sql = "SELECT * FROM SUB_CLIENTE_PARTNER WHERE cod_cliente_partner = 2 AND cod_estado_actual=1 order by nombre_sub_cliente_partner asc";
        $sub_cliente_partners = array();

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        while ($row = pg_fetch_array($resultado)) {
            $sub_cliente_partner = new Sub_cliente_partner();
            $sub_cliente_partner->setCod_sub_cliente_partner($row[0]);
            $sub_cliente_partner->setNombre_sub_cliente_partner($row[1]);
            $sub_cliente_partner->setCod_cliente_partner($row[2]);
            $sub_cliente_partner->setCod_estado_actual($row[3]);
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

        $sql = "SELECT * FROM SUB_CLIENTE_PARTNER WHERE cod_cliente_partner = 4 order by nombre_sub_cliente_partner asc";
        $sub_cliente_partners = array();

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        while ($row = pg_fetch_array($resultado)) {
            $sub_cliente_partner = new Sub_cliente_partner();
            $sub_cliente_partner->setCod_sub_cliente_partner($row[0]);
            $sub_cliente_partner->setNombre_sub_cliente_partner($row[1]);
            $sub_cliente_partner->setCod_cliente_partner($row[2]);
            $sub_cliente_partner->setCod_estado_actual($row[3]);
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
    public function getListMilloActivo()
    {

        $sql = "SELECT * FROM SUB_CLIENTE_PARTNER WHERE cod_cliente_partner = 4 AND cod_estado_actual=1 order by nombre_sub_cliente_partner asc";
        $sub_cliente_partners = array();

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        while ($row = pg_fetch_array($resultado)) {
            $sub_cliente_partner = new Sub_cliente_partner();
            $sub_cliente_partner->setCod_sub_cliente_partner($row[0]);
            $sub_cliente_partner->setNombre_sub_cliente_partner($row[1]);
            $sub_cliente_partner->setCod_cliente_partner($row[2]);
            $sub_cliente_partner->setCod_estado_actual($row[3]);
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
    public function getListLucta()
    {

        $sql = "SELECT * FROM SUB_CLIENTE_PARTNER WHERE cod_cliente_partner = 3 order by nombre_sub_cliente_partner asc";
        $sub_cliente_partners = array();

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        while ($row = pg_fetch_array($resultado)) {
            $sub_cliente_partner = new Sub_cliente_partner();
            $sub_cliente_partner->setCod_sub_cliente_partner($row[0]);
            $sub_cliente_partner->setNombre_sub_cliente_partner($row[1]);
            $sub_cliente_partner->setCod_cliente_partner($row[2]);
            $sub_cliente_partner->setCod_estado_actual($row[3]);
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
    public function getListLuctaActivo()
    {

        $sql = "SELECT * FROM SUB_CLIENTE_PARTNER WHERE cod_cliente_partner = 3 AND cod_estado_actual=1 order by nombre_sub_cliente_partner asc";
        $sub_cliente_partners = array();

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        while ($row = pg_fetch_array($resultado)) {
            $sub_cliente_partner = new Sub_cliente_partner();
            $sub_cliente_partner->setCod_sub_cliente_partner($row[0]);
            $sub_cliente_partner->setNombre_sub_cliente_partner($row[1]);
            $sub_cliente_partner->setCod_cliente_partner($row[2]);
            $sub_cliente_partner->setCod_estado_actual($row[3]);
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
    public function getListPraxis()
    {

        $sql = "SELECT * FROM SUB_CLIENTE_PARTNER WHERE cod_cliente_partner = 5 order by nombre_sub_cliente_partner asc";
        $sub_cliente_partners = array();

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        while ($row = pg_fetch_array($resultado)) {
            $sub_cliente_partner = new Sub_cliente_partner();
            $sub_cliente_partner->setCod_sub_cliente_partner($row[0]);
            $sub_cliente_partner->setNombre_sub_cliente_partner($row[1]);
            $sub_cliente_partner->setCod_cliente_partner($row[2]);
            $sub_cliente_partner->setCod_estado_actual($row[3]);
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
    public function getListPraxisActivo()
    {

        $sql = "SELECT * FROM SUB_CLIENTE_PARTNER WHERE cod_cliente_partner = 5 AND cod_estado_actual=1 order by nombre_sub_cliente_partner asc";
        $sub_cliente_partners = array();

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        while ($row = pg_fetch_array($resultado)) {
            $sub_cliente_partner = new Sub_cliente_partner();
            $sub_cliente_partner->setCod_sub_cliente_partner($row[0]);
            $sub_cliente_partner->setNombre_sub_cliente_partner($row[1]);
            $sub_cliente_partner->setCod_cliente_partner($row[2]);
            $sub_cliente_partner->setCod_estado_actual($row[3]);
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
    public function getListSeidor()
    {

        $sql = "SELECT * FROM SUB_CLIENTE_PARTNER WHERE cod_cliente_partner = 6 order by nombre_sub_cliente_partner asc";
        $sub_cliente_partners = array();

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        while ($row = pg_fetch_array($resultado)) {
            $sub_cliente_partner = new Sub_cliente_partner();
            $sub_cliente_partner->setCod_sub_cliente_partner($row[0]);
            $sub_cliente_partner->setNombre_sub_cliente_partner($row[1]);
            $sub_cliente_partner->setCod_cliente_partner($row[2]);
            $sub_cliente_partner->setCod_estado_actual($row[3]);
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
    public function getListSeidorActivo()
    {

        $sql = "SELECT * FROM SUB_CLIENTE_PARTNER WHERE cod_cliente_partner = 6 AND cod_estado_actual=1 order by nombre_sub_cliente_partner asc";
        $sub_cliente_partners = array();

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        while ($row = pg_fetch_array($resultado)) {
            $sub_cliente_partner = new Sub_cliente_partner();
            $sub_cliente_partner->setCod_sub_cliente_partner($row[0]);
            $sub_cliente_partner->setNombre_sub_cliente_partner($row[1]);
            $sub_cliente_partner->setCod_cliente_partner($row[2]);
            $sub_cliente_partner->setCod_estado_actual($row[3]);
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
    public function getListInterno()
    {

        $sql = "SELECT * FROM SUB_CLIENTE_PARTNER WHERE cod_cliente_partner = 7 order by nombre_sub_cliente_partner asc";
        $sub_cliente_partners = array();

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        while ($row = pg_fetch_array($resultado)) {
            $sub_cliente_partner = new Sub_cliente_partner();
            $sub_cliente_partner->setCod_sub_cliente_partner($row[0]);
            $sub_cliente_partner->setNombre_sub_cliente_partner($row[1]);
            $sub_cliente_partner->setCod_cliente_partner($row[2]);
            $sub_cliente_partner->setCod_estado_actual($row[3]);
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
    public function getListInternoActivo()
    {

        $sql = "SELECT * FROM SUB_CLIENTE_PARTNER WHERE cod_cliente_partner = 7 AND cod_estado_actual=1 order by nombre_sub_cliente_partner asc";
        $sub_cliente_partners = array();

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        while ($row = pg_fetch_array($resultado)) {
            $sub_cliente_partner = new Sub_cliente_partner();
            $sub_cliente_partner->setCod_sub_cliente_partner($row[0]);
            $sub_cliente_partner->setNombre_sub_cliente_partner($row[1]);
            $sub_cliente_partner->setCod_cliente_partner($row[2]);
            $sub_cliente_partner->setCod_estado_actual($row[3]);
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
    public function getListSUCAFINA()
    {

        $sql = "SELECT * FROM SUB_CLIENTE_PARTNER WHERE cod_cliente_partner = 13 order by nombre_sub_cliente_partner asc";
        $sub_cliente_partners = array();

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        while ($row = pg_fetch_array($resultado)) {
            $sub_cliente_partner = new Sub_cliente_partner();
            $sub_cliente_partner->setCod_sub_cliente_partner($row[0]);
            $sub_cliente_partner->setNombre_sub_cliente_partner($row[1]);
            $sub_cliente_partner->setCod_cliente_partner($row[2]);
            $sub_cliente_partner->setCod_estado_actual($row[3]);
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
    public function getListSUCAFINAActivo()
    {

        $sql = "SELECT * FROM SUB_CLIENTE_PARTNER WHERE cod_cliente_partner = 13 AND cod_estado_actual=1 order by nombre_sub_cliente_partner asc";
        $sub_cliente_partners = array();

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        while ($row = pg_fetch_array($resultado)) {
            $sub_cliente_partner = new Sub_cliente_partner();
            $sub_cliente_partner->setCod_sub_cliente_partner($row[0]);
            $sub_cliente_partner->setNombre_sub_cliente_partner($row[1]);
            $sub_cliente_partner->setCod_cliente_partner($row[2]);
            $sub_cliente_partner->setCod_estado_actual($row[3]);
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
    public function getListIce()
    {

        $sql = "SELECT * FROM SUB_CLIENTE_PARTNER WHERE cod_cliente_partner = 15 order by nombre_sub_cliente_partner asc";
        $sub_cliente_partners = array();

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        while ($row = pg_fetch_array($resultado)) {
            $sub_cliente_partner = new Sub_cliente_partner();
            $sub_cliente_partner->setCod_sub_cliente_partner($row[0]);
            $sub_cliente_partner->setNombre_sub_cliente_partner($row[1]);
            $sub_cliente_partner->setCod_cliente_partner($row[2]);
            $sub_cliente_partner->setCod_estado_actual($row[3]);
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
    public function getListIceActivo()
    {

        $sql = "SELECT * FROM SUB_CLIENTE_PARTNER WHERE cod_cliente_partner = 15 AND cod_estado_actual=1 order by nombre_sub_cliente_partner asc";
        $sub_cliente_partners = array();

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        while ($row = pg_fetch_array($resultado)) {
            $sub_cliente_partner = new Sub_cliente_partner();
            $sub_cliente_partner->setCod_sub_cliente_partner($row[0]);
            $sub_cliente_partner->setNombre_sub_cliente_partner($row[1]);
            $sub_cliente_partner->setCod_cliente_partner($row[2]);
            $sub_cliente_partner->setCod_estado_actual($row[3]);
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