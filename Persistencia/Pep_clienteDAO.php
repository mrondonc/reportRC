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
        $sql = "insert into PEP_CLIENTE values (" . $pep_cliente->getCod_pep_cliente() . ",
                                            '" . $pep_cliente->getReferencia_pep_cliente() . "',
                                            " . $pep_cliente->getCod_cliente_partner() . "                                               
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

        $sql = "SELECT * FROM PEP_CLIENTE";

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        $pep_cliente = array();

        while ($row = pg_fetch_array($resultado)) {
            $pep_cliente->setCod_pep_cliente($row[0]);
            $pep_cliente->setReferencia_pep_cliente($row[1]);
            $pep_cliente->setCod_cliente_partner($row[2]);

            $pep_clientes[] = $pep_cliente;
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