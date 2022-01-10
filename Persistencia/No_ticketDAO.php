<?php

require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/No_ticket.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/DAO.php';

/**
 * 
 *Represents the DAO of the modulo sap entity
 *
 */
class No_ticketDAO implements DAO
{

    /**
     * Reference to the connection with the database
     * @var Object
     */
    private $conexion;

    /**
     * Reference to an no_ticketDAO object
     * @var no_ticketDAO
     */
    private static $no_ticketDAO;

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
     * Method to query an numero de ticket by his code type
     *
     * @param int $cod_no_ticket
     * @return No_ticket
     */
    public function consult($cod_no_ticket)
    {
        
        $sql = "SELECT * FROM NO_TICKET WHERE cod_no_ticket = " . $cod_no_ticket;

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        $row = pg_fetch_array($resultado);

        $no_ticket = new No_ticket();

        $no_ticket->setCod_no_ticket($row[0]);
        $no_ticket->setReferencia_no_ticket($row[1]);
        $no_ticket->setCod_cliente_partner($row[2]);

        return $no_ticket;
    }


    /**
     * Method to create a new no_ticket
     *
     * @param No_ticket $no_ticket
     * @return void
     */
    public function create($no_ticket)
    {
        $sql = "insert into NO_TICKET (referencia_no_ticket, cod_cliente_partner) values (
                                            '" . $no_ticket->getReferencia_no_ticket() . "',
                                            " . $no_ticket->getCod_cliente_partner() . "                                               
                                        );";

        pg_query($this->conexion, $sql);
    }

    /**
     * Method that modifies an numero de ticket entered by parameter
     *
     * @param No_ticket $no_ticket
     * @return void
     */
    public function modify($no_ticket)
    {

        $sql = "UPDATE NO_TICKET SET cod_no_ticket = " . $no_ticket->getCod_no_ticket() . ",
                                   referencia_no_ticket = '" . $no_ticket->getReferencia_no_ticket() . "',
                                   cod_cliente_partner = " . $no_ticket->getCod_cliente_partner() . ",
                                   where cod_no_ticket = " . $no_ticket->getCod_no_ticket() . "
                                ;";
        pg_query($this->conexion, $sql);
    }

    /**
     * Method to delete a numero de ticket
     *
     * @param No_ticket $no_ticket
     * @return void
     */

    public function delete($cod_no_ticket)
    {
        $sql = "DELETE FROM NO_TICKET WHERE cod_no_ticket = " . $cod_no_ticket;

        pg_query($this->conexion, $sql);
    }

    /**
     * Method to get an No_ticketDAO object
     *
     * @param Object $conexion
     * @return No_ticketDAO
     */
    public function getList()
    {

        $sql = "SELECT * FROM NO_TICKET";

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        $no_ticket = array();

        while ($row = pg_fetch_array($resultado)) {
            $no_ticket->setCod_no_ticket($row[0]);
            $no_ticket->setReferencia_no_ticket($row[1]);
            $no_ticket->setCod_cliente_partner($row[2]);

            $no_tickets[] = $no_ticket;
        }
        return $no_tickets;
    }


    /**
     * Gets the object of this class. In case it is null, create it
     *
     * @param Object $conexion
     * @return No_ticketDAO
     */
    public static function getNo_ticketDAO($conexion)
    {
        if (self::$no_ticketDAO == null) {
            self::$no_ticketDAO = new No_ticketDAO($conexion);
        }

        return self::$no_ticketDAO;
    }

}
?>