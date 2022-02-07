<?php

require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Estado_actual.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/DAO.php';

/**
 * 
 *Represents the DAO of the modulo sap entity
 *
 */
class Estado_actualDAO implements DAO
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
    private static $estado_actualDAO;

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
     * @return Estado_actual
     */
    public function consult($cod_estado_actual)
    {
        
        $sql = "SELECT * FROM ESTADO_ACTUAL WHERE cod_estado_actual = " . $cod_estado_actual;
        if (!$resultado = pg_query($this->conexion, $sql)) die();

        $row = pg_fetch_array($resultado);

        $estado_actual = new Estado_actual();

        $estado_actual->setCod_estado_actual($row[0]);
        $estado_actual->setNombre_estado($row[1]);

        return $estado_actual;
    }


    /**
     * Method to create a new estado_usuario
     *
     * @param Estado_usuario $estado_usuario
     * @return void
     */
    public function create($estado_actual)
    {
        $sql = "insert into ESTADO_ACTUAL values (" . $estado_actual->getCod_estado_actual() . ",
                                            '" . $estado_actual->getNombre_estado() . "'
                                        );";

        pg_query($this->conexion, $sql);
    }

    /**
     * Method that modifies an estado usuario entered by parameter
     *
     * @param Estado_usuario $estado_usuario
     * @return void
     */
    public function modify($estado_actual)
    {

        $sql = "UPDATE ESTADO_ACTUAL SET cod_estado_actual = " . $estado_actual->getCod_estado_actual() . ",
                                   nombre_estado= '" . $estado_actual->getNombre_estado() . "',
                                   where cod_estado_actual = " . $estado_actual->getCod_estado_actual() . "
                                ;";
        pg_query($this->conexion, $sql);
    }

    /**
     * Method to delete a estado usuario
     *
     * @param Estado_usuario $estado_usuario
     * @return void
     */

    public function delete($cod_estado_actual)
    {
        $sql = "DELETE FROM ESTADO_ACTUAL WHERE cod_estado_actual = " . $cod_estado_actual;

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

        $sql = "SELECT * FROM ESTADO_actual";

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        $estado_actual = array();

        while ($row = pg_fetch_array($resultado)) {
            $estado_actual->setCod_estado_actual($row[0]);
            $estado_actual->setNombre_estado($row[1]);

            $estado_actuals[] = $estado_actual;
        }
        return $estado_actuals;
    }


    /**
     * Gets the object of this class. In case it is null, create it
     *
     * @param Object $conexion
     * @return Estado_usuarioDAO
     */
    public static function getEstado_actualDAO($conexion)
    {
        if (self::$estado_actualDAO == null) {
            self::$estado_actualDAO = new Estado_actualDAO($conexion);
        }

        return self::$estado_actualDAO;
    }

}
?>