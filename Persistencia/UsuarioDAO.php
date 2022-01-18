<?php

require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Usuario.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/DAO.php';

/**
 * 
 *Represents the DAO of the usuario entity
 *
 */
class UsuarioDAO implements DAO
{

    /**
     * Reference to the connection with the database
     * @var Object
     */
    private $conexion;

    /**
     * Reference to an UsuarioDAO object
     * @var usuarioDAO
     */
    private static $usuarioDAO;

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
     * Method to query an usuario by his code type
     *
     * @param int $cod_usuario
     * @return Usuario
     */
    public function consult($cod_usuario)
    {
        
        $sql = "SELECT * FROM USUARIO WHERE cod_usuario = " . $cod_usuario;

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        $row = pg_fetch_array($resultado);

        $usuario = new Usuario();

        $usuario->setCod_usuario($row[0]);
        $usuario->setNombre_usuario($row[1]);
        $usuario->setApellido_usuario($row[2]);
        $usuario->setTelefono_usuario($row[3]);
        $usuario->setCorreo_usuario($row[4]);
        $usuario->setDireccion_usuario($row[5]);
        $usuario->setCod_mod_sap($row[6]);
        $usuario->setCod_tipo_usuario($row[7]);
        $usuario->setCod_estado_usuario($row[8]);
        $usuario->setContraseña($row[9]);
        $usuario->setPais($row[10]);
        $usuario->setUsuario_login($row[11]);
        $usuario->setCumpleaños($row[12]);
        $usuario->setCuenta_skype($row[13]);
        $usuario->setNombre_contacto_emergencia($row[14]);
        $usuario->setNumero_contacto_emergencia($row[15]);

        return $usuario;
    }


    /**
     * Method to create a new usuario
     *
     * @param Usuario $usuario
     * @return void
     */
    public function create($usuario)
    {
        $sql = "insert into USUARIO (nombre_usuario, apellido_usuario, telefono_usuario, correo_usuario, direccion_usuario, cod_mod_sap, cod_tipo_usuario, cod_estado_usuario, contraseña, pais, usuario_login, cumpleaños, cuenta_skype, nombre_contacto_emergencia, numero_contacto_emergencia) 
                                        values (
                                            '" . $usuario->getNombre_usuario() . "',
                                            '" . $usuario->getApellido_usuario() . "',
                                            " . $usuario->getTelefono_usuario() . ",
                                            '" . $usuario->getCorreo_usuario() . "',
                                            '" . $usuario->getDireccion_usuario() . "',                                           
                                            " . $usuario->getCod_mod_sap() . ",
                                            " . $usuario->getCod_tipo_usuario() . ",
                                            " . $usuario->getCod_estado_usuario() . ",
                                            '" . $usuario->getContraseña() . "',
                                            '" . $usuario->getPais() . "',
                                            '" . $usuario->getUsuario_login() . "',
                                            '" . $usuario->getCumpleaños() . "',
                                            '" . $usuario->getCuenta_skype() . "',
                                            '" . $usuario->getNombre_contacto_emergencia() . "',
                                            " . $usuario->getNumero_contacto_emergencia() . "
                                        );";

        pg_query($this->conexion, $sql);
    }

    /**
     * Method that modifies an usuario entered by parameter
     *
     * @param Usuario $usuario
     * @return void
     */
    public function modify($usuario)
    {

        $sql = "UPDATE USUARIO SET cod_usuario = " . $usuario->getCod_usuario() . ",
                                    nombre_usuario = '" . $usuario->getNombre_usuario() . "',
                                    apellido_usuario = '". $usuario->getApellido_usuario() . "',
                                    telefono_usuario = ". $usuario->getTelefono_usuario() . ",
                                    correo_usuario = '" . $usuario->getCorreo_usuario() . "',
                                    direccion_usuario = '". $usuario->getDireccion_usuario() . "',                                          
                                    cod_mod_sap = " . $usuario->getCod_mod_sap() . ",
                                    cod_tipo_usuario = ". $usuario->getCod_tipo_usuario() . ",
                                    cod_estado_usuario = ". $usuario->getCod_estado_usuario() .",
                                    contraseña = '". $usuario->getContraseña() ."',
                                    pais = '". $usuario->getPais() ."',
                                    usuario_login = '". $usuario->getUsuario_login() ."',
                                    cumpleaños = '". $usuario->getCumpleaños() ."',
                                    cuenta_skype = '". $usuario->getCuenta_skype() ."',
                                    nombre_contacto_emergencia = '". $usuario->getNombre_contacto_emergencia() ."',
                                    numero_contacto_emergencia = ". $usuario->getNumero_contacto_emergencia() ."
                                   where cod_usuario = " . $usuario->getCod_usuario() . "
                                ;";
        pg_query($this->conexion, $sql);
    }

    /**
     * Method to delete a usuario
     *
     * @param Usuario $usuario
     * @return void
     */

    public function delete($cod_usuarios)
    {
        $sql = "DELETE FROM USUARIO WHERE cod_usuario = " . $cod_usuario;

        pg_query($this->conexion, $sql);
    }

    /**
     * Method to get an UsuarioDAO object
     *
     * @param Object $conexion
     * @return UsuarioDAO
     */
    public function getList()
    {

        $sql = "SELECT * FROM USUARIO";
        $usuarios = array();
        if (!$resultado = pg_query($this->conexion, $sql)) die();

        while ($row = pg_fetch_array($resultado)) {
            $usuario = new Usuario();
            $usuario->setCod_usuario($row[0]);
            $usuario->setNombre_usuario($row[1]);
            $usuario->setApellido_usuario($row[2]);
            $usuario->setTelefono_usuario($row[3]);
            $usuario->setCorreo_usuario($row[4]);
            $usuario->setDireccion_usuario($row[5]);
            $usuario->setCod_mod_sap($row[6]);
            $usuario->setCod_tipo_usuario($row[7]);
            $usuario->setCod_estado_usuario($row[8]);
            $usuario->setContraseña($row[9]);
            $usuario->setPais($row[10]);
            $usuario->setUsuario_login($row[11]);
            $usuario->setCumpleaños($row[12]);
            $usuario->setCuenta_skype($row[13]);
            $usuario->setNombre_contacto_emergencia($row[14]);
            $usuario->setNumero_contacto_emergencia($row[15]);
            array_push($usuarios, $usuario);
            
        }
        return $usuarios;
    }


    public function verificarCuenta($correo, $pass)
    {

        $sql = "SELECT * from usuario WHERE usuario_login = '" . $correo . "' and contraseña = '" . $pass . "' and cod_estado_usuario=2";

        if (!$resultado = pg_query($this->conexion, $sql)) die();
        $row = pg_fetch_array($resultado);
        if ($row[0] == null) {
            return null;
        }


        $usuario = new Usuario();

        $usuario->setCod_usuario($row[0]);
        $usuario->setNombre_usuario($row[1]);
        $usuario->setApellido_usuario($row[2]);
        $usuario->setTelefono_usuario($row[3]);
        $usuario->setCorreo_usuario($row[4]);
        $usuario->setDireccion_usuario($row[5]);
        $usuario->setCod_mod_sap($row[6]);
        $usuario->setCod_tipo_usuario($row[7]);
        $usuario->setCod_estado_usuario($row[8]);
        $usuario->setContraseña($row[9]);
        $usuario->setPais($row[10]);
        $usuario->setUsuario_login($row[11]);
        $usuario->setCumpleaños($row[12]);
        $usuario->setCuenta_skype($row[13]);
        $usuario->setNombre_contacto_emergencia($row[14]);
        $usuario->setNumero_contacto_emergencia($row[15]);
        
        return $usuario;
    }


    /**
     * Gets the object of this class. In case it is null, create it
     *
     * @param Object $conexion
     * @return UsuarioDAO
     */
    public static function getUsuarioDAO($conexion)
    {
        if (self::$usuarioDAO == null) {
            self::$usuarioDAO = new UsuarioDAO($conexion);
        }

        return self::$usuarioDAO; 
    }


    public function cambiarEstadoActivado($cod_usuario)

    {
        $sql = "UPDATE  USUARIO SET COD_ESTADO_USUARIO=3 WHERE cod_usuario = " . $cod_usuario;

        pg_query($this->conexion, $sql);
    }

    public function cambiarEstadoDesactivado($cod_usuario)

    {
        $sql = "UPDATE  USUARIO SET COD_ESTADO_USUARIO=2 WHERE cod_usuario = " . $cod_usuario;

        pg_query($this->conexion, $sql);
    }

    /**
     * Method to get an DistribuidorDAO object
     *
     * @param Object $conexion
     * @return DistribuidorDAO
     */
    public function getListActivar()
    {

        $sql = "SELECT cod_usuario
        FROM usuario
        WHERE usuario.cod_estado_usuario = 2
        ";
        $list = array();
        if (!$resultado = pg_query($this->conexion, $sql)) die();
        while ($row = pg_fetch_array($resultado)) {
            $item = new Usuario();
            $item->setCod_usuario($row[0]);

            array_push($list, $item);
        }
        return $list;
    }

    public function getListDesactivar()
    {

        $sql = "SELECT cod_usuario
        FROM usuario
        WHERE usuario.cod_estado_usuario = 3
        ";
        $list = array();
        if (!$resultado = pg_query($this->conexion, $sql)) die();
        while ($row = pg_fetch_array($resultado)) {
            $item = new Usuario();
            $item->setCod_usuario($row[0]);

            array_push($list, $item);
        }
        return $list;
    }

}
?>