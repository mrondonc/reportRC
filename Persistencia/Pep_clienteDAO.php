<?php

require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Pep_cliente.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/DAO.php';

/**
 * 
 *Represents the DAO of the pep del cliente entity
 *
 */
class Pep_clienteDAO implements DAO
{

    /**
     * Reference to the connection with the database
     * @var Object
     */
    private $conexion;

    /**
     * Reference to an pep_clienteDAO object
     * @var pep_clienteDAO
     */
    private static $pep_clienteDAO;

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
     * Method to query an pep_cliente by his code type
     *
     * @param int $cod_pep_cliente
     * @return pep_cliente
     */
    public function consult($cod_pep_cliente)
    {
        
        $sql = "SELECT * FROM PEP_CLIENTE WHERE cod_pep_cliente = " . $cod_pep_cliente;

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        $row = pg_fetch_array($resultado);

        $pep_cliente = new Pep_cliente();

        $pep_cliente->setCod_pep_cliente($row[0]);
        $pep_cliente->setReferencia_pep_cliente($row[1]);
        $pep_cliente->setCod_cliente_partner($row[2]);
        $pep_cliente->setCod_estado_actual($row[3]);
        return $pep_cliente;
    }


    /**
     * Method to create a new pep_cliente
     *
     * @param Pep_cliente $pep_cliente
     * @return void
     */
    public function create($pep_cliente)
    {
        $sql = "insert into PEP_CLIENTE (referencia_pep_cliente, cod_cliente_partner, cod_estado_actual) 
                                        values ('" . $pep_cliente->getReferencia_pep_cliente() . "',
                                            " . $pep_cliente->getCod_cliente_partner() . ",
                                            " . $pep_cliente->getCod_estado_actual() . "                                               
                                        );";

        pg_query($this->conexion, $sql);
    }

    /**
     * Method that modifies an pep_cliente entered by parameter
     *
     * @param Pep_cliente $pep_cliente
     * @return void
     */
    public function modify($pep_cliente)
    {

        $sql = "UPDATE PEP_CLIENTE SET cod_pep_cliente = " . $pep_cliente->getCod_pep_cliente() . ",
                                   referencia_pep_cliente = '" . $pep_cliente->getReferencia_pep_cliente() . "',
                                   cod_cliente_partner = " . $pep_cliente->getCod_cliente_partner() . ",
                                   cod_estado_actual = " . $pep_cliente->getCod_estado_actual() . "
                                   where cod_pep_cliente = " . $pep_cliente->getCod_pep_cliente() . "
                                ;";
        pg_query($this->conexion, $sql);
    }

     /**
     * Method that modifies an pep_cliente entered by parameter
     *
     * @param Pep_cliente $pep_cliente
     * @return void
     */
    public function modifyEstado($pep_cliente)
    {

        $sql = "UPDATE PEP_CLIENTE SET 
                                   cod_estado_actual = " . $pep_cliente->getCod_estado_actual() . "
                                   where cod_pep_cliente = " . $pep_cliente->getCod_pep_cliente() . "
                                ;";
        pg_query($this->conexion, $sql);
    }

    /**
     * Method to delete a pep_cliente
     *
     * @param Pep_cliente $pep_cliente
     * @return void
     */

    public function delete($cod_pep_cliente)
    {
        $sql = "DELETE FROM PEP_CLIENTE WHERE cod_pep_cliente = " . $cod_pep_cliente;

        pg_query($this->conexion, $sql);
    }

    /**
     * Method to get an Pep_clienteDAO object
     *
     * @param Object $conexion
     * @return Pep_clienteDAO
     */
    public function getList()
    {

        $sql = "SELECT * FROM PEP_CLIENTE ORDER BY referencia_pep_cliente ASC";
        $pep_clientes = array();
        if (!$resultado = pg_query($this->conexion, $sql)) die();

        while ($row = pg_fetch_array($resultado)) {
            $pep_cliente = new Pep_cliente();
            $pep_cliente->setCod_pep_cliente($row[0]);
            $pep_cliente->setReferencia_pep_cliente($row[1]);
            $pep_cliente->setCod_cliente_partner($row[2]);
            $pep_cliente->setCod_estado_actual($row[3]);
            array_push($pep_clientes, $pep_cliente);
           
        }
        return $pep_clientes;
    }

     /**
     * Method to get an Pep_clienteDAO object
     *
     * @param Object $conexion
     * @return Pep_clienteDAO
     */
    public function getListSeidor()
    {

        $sql = "SELECT * FROM PEP_CLIENTE WHERE cod_cliente_partner = 6 ORDER BY referencia_pep_cliente ASC";
        $pep_clientes = array();
        if (!$resultado = pg_query($this->conexion, $sql)) die();

        while ($row = pg_fetch_array($resultado)) {
            $pep_cliente = new Pep_cliente();
            $pep_cliente->setCod_pep_cliente($row[0]);
            $pep_cliente->setReferencia_pep_cliente($row[1]);
            $pep_cliente->setCod_cliente_partner($row[2]);
            $pep_cliente->setCod_estado_actual($row[3]);
            array_push($pep_clientes, $pep_cliente);
           
        }
        return $pep_clientes;
    }

    /**
     * Method to get an Pep_clienteDAO object
     *
     * @param Object $conexion
     * @return Pep_clienteDAO
     */
    public function getListSeidorActivo()
    {

        $sql = "SELECT * FROM PEP_CLIENTE WHERE cod_cliente_partner = 6 AND cod_estado_actual=1 ORDER BY referencia_pep_cliente ASC";
        $pep_clientes = array();
        if (!$resultado = pg_query($this->conexion, $sql)) die();

        while ($row = pg_fetch_array($resultado)) {
            $pep_cliente = new Pep_cliente();
            $pep_cliente->setCod_pep_cliente($row[0]);
            $pep_cliente->setReferencia_pep_cliente($row[1]);
            $pep_cliente->setCod_cliente_partner($row[2]);
            $pep_cliente->setCod_estado_actual($row[3]);
            array_push($pep_clientes, $pep_cliente);
           
        }
        return $pep_clientes;
    }

    /**
     * Gets the object of this class. In case it is null, create it
     *
     * @param Object $conexion
     * @return Pep_clienteDAO
     */
    public static function getPep_clienteDAO($conexion)
    {
        if (self::$pep_clienteDAO == null) {
            self::$pep_clienteDAO = new Pep_clienteDAO($conexion);
        }

        return self::$pep_clienteDAO;
    }

}
?>