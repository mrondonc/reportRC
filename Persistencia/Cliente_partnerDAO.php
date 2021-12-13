<?php

require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Cliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/DAO.php';

/**
 * 
 *Represents the DAO of the cliente partner entity
 *
 */
class Cliente_partnerDAO implements DAO
{

    /**
     * Reference to the connection with the database
     * @var Object
     */
    private $conexion;

    /**
     * Reference to an Cliente_partnerDAO object
     * @var cliente_partnerDAO
     */
    private static $cliente_partnerDAO;

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
     * Method to query an cliente partner by his code type
     *
     * @param int $cod_cliente_partner
     * @return Cliente_partner
     */
    public function consult($cod_cliente_partner)
    {
        
        $sql = "SELECT * FROM CLIENTE_PARTNER WHERE cod_cliente_partner = " . $cod_cliente_partner;

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        $row = pg_fetch_array($resultado);

        $cliente_partner = new Cliente_partner();

        $cliente_partner->setCod_cliente_partner($row[0]);
        $cliente_partner->setNombre_cliente_partner($row[1]);

        return $cliente_partner;
    }


    /**
     * Method to create a new cliente_partner
     *
     * @param Cliente_partner $cliente_partner
     * @return void
     */
    public function create($cliente_partner)
    {
        $sql = "insert into CLIENTE_PARTNER values (" . $cliente_partner->getCod_cliente_partner() . ",
                                            '" . $cliente_partner->getNombre_cliente_partner() . "'                                            
                                        );";

        pg_query($this->conexion, $sql);
    }

    /**
     * Method that modifies an cliente partner entered by parameter
     *
     * @param Cliente_partner $cliente_partner
     * @return void
     */
    public function modify($cliente_partner)
    {

        $sql = "UPDATE CLIENTE_PARTNER SET cod_cliente_partner = " . $cliente_partner->getCod_cliente_partner() . ",
                                   nombre_cliente_partner = " . $cliente_partner->getNombre_cliente_partner() . ",
                                   where cod_cliente_partner = " . $cliente_partner->getCod_cliente_partner() . "
                                ;";
        pg_query($this->conexion, $sql);
    }

    /**
     * Method to delete a cliente partner
     *
     * @param Cliente_partner $cliente_partner
     * @return void
     */

    public function delete($cod_cliente_partner)
    {
        $sql = "DELETE FROM CLIENTE_PARTNER WHERE cod_cliente_partner = " . $cod_cliente_partner;

        pg_query($this->conexion, $sql);
    }

    /**
     * Method to get an Cliente_partnerDAO object
     *
     * @param Object $conexion
     * @return Cliente_partnerDAO
     */
    public function getList()
    {

        $sql = "SELECT * FROM CLIENTE_PARTNER";

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        $cliente_partner = array();

        while ($row = pg_fetch_array($resultado)) {
            $cliente_partner->setCod_cliente_partner($row[0]);
            $cliente_partner->setNombre_cliente_partner($row[1]);

            $cliente_partners[] = $cliente_partner;
        }
        return $cliente_partners;
    }


    /**
     * Gets the object of this class. In case it is null, create it
     *
     * @param Object $conexion
     * @return Cliente_partnerDAO
     */
    public static function getCliente_partnerDAO($conexion)
    {
        if (self::$cliente_partnerDAO == null) {
            self::$cliente_partnerDAO = new Cliente_partnerDAO($conexion);
        }

        return self::$cliente_partnerDAO;
    }

}
?>