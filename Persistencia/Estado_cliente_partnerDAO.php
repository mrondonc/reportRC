<?php

require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Estado_cliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/DAO.php';

/**
 * 
 *Represents the DAO of the modulo sap entity
 *
 */
class Estado_cliente_partnerDAO implements DAO
{

    /**
     * Reference to the connection with the database
     * @var Object
     */
    private $conexion;

    /**
     * Reference to an estado_usuarioDAO object
     * @var estado_usuarioDAO
     */
    private static $estado_cliente_partnerDAO;

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
     * Method to query an estado usuario by his code type
     *
     * @param int $cod_estado_usuario
     * @return Estado_usuario
     */
    public function consult($cod_estado_cliente_partner)
    {
        
        $sql = "SELECT * FROM ESTADO_CLIENTE_PARTNER WHERE cod_estado_cliente_partner = " . $cod_estado_cliente_partner;

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        $row = pg_fetch_array($resultado);

        $estado_cliente_partner = new Estado_cliente_partner();

        $estado_cliente_partner->setCod_estado_cliente_partner($row[0]);
        $estado_cliente_partner->setNombre_estado($row[1]);

        return $estado_cliente_partner;
    }


    /**
     * Method to create a new estado_usuario
     *
     * @param Estado_usuario $estado_usuario
     * @return void
     */
    public function create($estado_cliente_partner)
    {
        $sql = "insert into ESTADO_CLIENTE_PARTNER values (" . $estado_cliente_partner->getCod_estado_cliente_partner() . ",
                                            '" . $estado_cliente_partner->getNombre_estado() . "'
                                        );";

        pg_query($this->conexion, $sql);
    }

    /**
     * Method that modifies an estado usuario entered by parameter
     *
     * @param Estado_usuario $estado_usuario
     * @return void
     */
    public function modify($estado_cliente_partner)
    {

        $sql = "UPDATE ESTADO_CLIENTE_PARTNER SET cod_estado_cliente_partner = " . $estado_cliente_partner->getCod_estado_cliente_partner() . ",
                                   nombre_estado= '" . $estado_actual->getNombre_estado() . "',
                                   where cod_estado_cliente_partner = " . $estado_cliente_partner->getCod_estado_cliente_partner() . "
                                ;";
        pg_query($this->conexion, $sql);
    }

    /**
     * Method to delete a estado usuario
     *
     * @param Estado_usuario $estado_usuario
     * @return void
     */

    public function delete($cod_estado_cliente_partner)
    {
        $sql = "DELETE FROM ESTADO_CLIENTE_PARTNER WHERE cod_estado_cliente_partner = " . $cod_estado_cliente_partner;

        pg_query($this->conexion, $sql);
    }

    /**
     * Method to get an estado_usuarioDAO object
     *
     * @param Object $conexion
     * @return Estado_usuarioDAO
     */
    public function getList()
    {

        $sql = "SELECT * FROM ESTADO_CLIENTE_PARTNER";

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        $estado_cliente_partner = array();

        while ($row = pg_fetch_array($resultado)) {
            $estado_cliente_partner->setCod_estado_cliente_partner($row[0]);
            $estado_cliente_partner->setNombre_estado($row[1]);

            $estado_cliente_partners[] = $estado_cliente_partner;
        }
        return $estado_cliente_partners;
    }


    /**
     * Gets the object of this class. In case it is null, create it
     *
     * @param Object $conexion
     * @return Estado_usuarioDAO
     */
    public static function getEstado_cliente_partnerDAO($conexion)
    {
        if (self::$estado_cliente_partnerDAO == null) {
            self::$estado_cliente_partnerDAO = new Estado_cliente_partnerDAO($conexion);
        }

        return self::$estado_cliente_partnerDAO;
    }

}
?>