<?php

require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Tipo_usuario.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/DAO.php';

/**
 * 
 *Represents the DAO of the tipo de usuario entity
 *
 */
class Tipo_usuarioDAO implements DAO
{

    /**
     * Reference to the connection with the database
     * @var Object
     */
    private $conexion;

    /**
     * Reference to an tipo_usuarioDAO object
     * @var tipo_usuarioDAO
     */
    private static $tipo_usuarioDAO;

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
     * Method to query an tipo de usuario by his code type
     *
     * @param int $cod_tipo_usuario
     * @return Tipo_usuario
     */
    public function consult($cod_tipo_usuario)
    {
        
        $sql = "SELECT * FROM TIPO_USARIO WHERE cod_tipo_usuario = " . $cod_tipo_usuario;

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        $row = pg_fetch_array($resultado);

        $tipo_usuario = new Tipo_usuario();

        $tipo_usuario->setCod_tipo_usuario($row[0]);
        $tipo_usuario->setNombre_tipo_usuario($row[1]);

        return $tipo_usuario;
    }


    /**
     * Method to create a new tipo_usuario
     *
     * @param Tipo_usuario $tipo_usuario
     * @return void
     */
    public function create($tipo_usuario)
    {
        $sql = "insert into TIPO_USUARIO values (" . $tipo_usuario->getCod_tipo_usuario() . ",
                                            '" . $tipo_usuario->getNombre_tipo_usuario() . "'                                            
                                        );";

        pg_query($this->conexion, $sql);
    }

    /**
     * Method that modifies an tipo de usuario entered by parameter
     *
     * @param Tipo_usuario $tipo_usuario
     * @return void
     */
    public function modify($tipo_usuario)
    {

        $sql = "UPDATE TIPO_USUARIO SET cod_tipo_usuario = " . $tipo_usuario->getCod_tipo_usuario() . ",
                                   nombre_tipo_usuario = " . $tipo_usuario->getNombre_tipo_usuario() . ",
                                   where cod_tipo_usuario = " . $tipo_usuario->getCod_tipo_usuario() . "
                                ;";
        pg_query($this->conexion, $sql);
    }

    /**
     * Method to delete a tipo_usuario
     *
     * @param Tipo_usuario $tipo_usuario
     * @return void
     */

    public function delete($cod_tipo_usuarios)
    {
        $sql = "DELETE FROM TIPO_USUARIO WHERE cod_tipo_usuario = " . $cod_tipo_usuario;

        pg_query($this->conexion, $sql);
    }

    /**
     * Method to get an Tipo_usuarioDAO object
     *
     * @param Object $conexion
     * @return Tipo_usuarioDAO
     */
    public function getList()
    {

        $sql = "SELECT * FROM TIPO_USUARIO";

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        $tipo_usuario = array();

        while ($row = pg_fetch_array($resultado)) {
            $tipo_usuario->setCod_tipo_usuario($row[0]);
            $tipo_usuario->setNombre_tipo_usuario($row[1]);

            $tipo_usuarios[] = $tipo_usuario;
        }
        return $tipo_usuarios;
    }


    /**
     * Gets the object of this class. In case it is null, create it
     *
     * @param Object $conexion
     * @return Tipo_usuarioDAO
     */
    public static function getTipo_usuarioDAO($conexion)
    {
        if (self::$tipo_usuarioDAO == null) {
            self::$tipo_usuarioDAO = new Tipo_usuarioDAO($conexion);
        }

        return self::$tipo_usuarioDAO;
    }

}
?>