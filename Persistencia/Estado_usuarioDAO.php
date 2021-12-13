<?php

require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Estado_usuario.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/DAO.php';

/**
 * 
 *Represents the DAO of the modulo sap entity
 *
 */
class Estado_usuarioDAO implements DAO
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
    private static $estado_usuarioDAO;

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
    public function consult($cod_estado_usuario)
    {
        
        $sql = "SELECT * FROM ESTADO_USUARIO WHERE cod_estado_usuario = " . $cod_estado_usuario;

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        $row = pg_fetch_array($resultado);

        $estado_usuario = new Estado_usuario();

        $estado_usuario->setCod_estado_usuario($row[0]);
        $estado_usuario->setNombre_estado_usuario($row[1]);

        return $estado_usuario;
    }


    /**
     * Method to create a new estado_usuario
     *
     * @param Estado_usuario $estado_usuario
     * @return void
     */
    public function create($estado_usuario)
    {
        $sql = "insert into ESTADO_USUARIO values (" . $estado_usuario->getCod_estado_usuario() . ",
                                            '" . $estado_usuario->getNombre_estado_usuario() . "'
                                        );";

        pg_query($this->conexion, $sql);
    }

    /**
     * Method that modifies an estado usuario entered by parameter
     *
     * @param Estado_usuario $estado_usuario
     * @return void
     */
    public function modify($estado_usuario)
    {

        $sql = "UPDATE ESTADO_USUARIO SET cod_estado_usuario = " . $estado_usuario->getCod_estado_usuario() . ",
                                   nombre_estado_usuario = '" . $estado_usuario->getNombre_estado_usuario() . "',
                                   where cod_estado_usuario = " . $estado_usuario->getCod_estado_usuario() . "
                                ;";
        pg_query($this->conexion, $sql);
    }

    /**
     * Method to delete a estado usuario
     *
     * @param Estado_usuario $estado_usuario
     * @return void
     */

    public function delete($cod_estado_usuario)
    {
        $sql = "DELETE FROM ESTADO_USUARIO WHERE cod_estado_usuario = " . $cod_estado_usuario;

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

        $sql = "SELECT * FROM ESTADO_USUARIO";

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        $estado_usuario = array();

        while ($row = pg_fetch_array($resultado)) {
            $estado_usuario->setCod_estado_usuario($row[0]);
            $estado_usuario->setNombre_estado_usuario($row[1]);

            $estado_usuarios[] = $estado_usuario;
        }
        return $estado_usuarios;
    }


    /**
     * Gets the object of this class. In case it is null, create it
     *
     * @param Object $conexion
     * @return Estado_usuarioDAO
     */
    public static function getEstado_usuarioDAO($conexion)
    {
        if (self::$estado_usuarioDAO == null) {
            self::$estado_usuarioDAO = new Estado_usuarioDAO($conexion);
        }

        return self::$estado_usuarioDAO;
    }

}
?>