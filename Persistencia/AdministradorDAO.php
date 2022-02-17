<?php

require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Administrador.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/DAO.php';

/**
 * 
 *Represents the DAO of the administrador entity
 *
 */
class AdministradorDAO implements DAO
{

    /**
     * Reference to the connection with the database
     * @var Object
     */
    private $conexion;

    /**
     * Reference to an administradorDAO object
     * @var administradorDAO
     */
    private static $administradorDAO;

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
     * @return Administrador
     */
    public function consult($cod_administrador)
    {
        
        $sql = "SELECT * FROM ADMINISTRADOR WHERE cod_administrador = " . $cod_administrador;

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        $row = pg_fetch_array($resultado);

        $administrador = new Administrador();

        $administrador->setCod_administrador($row[0]);
        $administrador->setNombre_administrador($row[1]);
        $administrador->setCod_estado_usuario($row[2]);
        $administrador->setCod_tipo_usuario($row[3]);
        $administrador->setContraseña($row[4]);
        $administrador->setUsuario_login($row[5]);
        $administrador->setTelefono($row[6]);
        $administrador->setCorreo($row[7]);
        $administrador->setDireccion($row[8]);
        $administrador->setPais($row[9]);
        $administrador->setCumpleaños($row[10]);
        $administrador->setCuenta_skype($row[11]);
        $administrador->setNombre_contacto_emergencia($row[12]);
        $administrador->setNumero_contacto_emergencia($row[13]);

        return $administrador;
    }


    /**
     * Method to create a new usuario
     *
     * @param Administrador $usuario
     * @return void
     */
    public function create($administrador)
    {
        $sql = "insert into ADMINISTRADOR (nombre_administrador, cod_estado_usuario, cod_tipo_usuario, contraseña, usuario_login, telefono, correo, direccion, pais, cumpleaños, cuenta_skype, nombre_contacto_emergencia, numero_contacto_emergencia)
                                        values (" . $administrador->getCod_administrador() . ",
                                            '" . $administrador->getNombre_administrador() . "',
                                            " . $administrador->getCod_estado_usuario() . ",
                                            " . $administrador->getCod_tipo_usuario() . ",
                                            '" . $administrador->getContraseña() . "',
                                            '" . $administrador->getUsuario_login() . "',
                                            " . $administrador->getTelefono() . ",
                                            '" . $administrador->getCorreo() . "',
                                            '" . $administrador->getDireccion() . "',
                                            '" . $administrador->getPais() . "',
                                            '" . $administrador->getCumpleaños() . "',
                                            '" . $administrador->getCuenta_skype() . "',
                                            '" . $administrador->getNombre_contacto_emergencia() . "',
                                            " . $administrador->getNumero_contacto_emergencia() . "
                                        );";

        pg_query($this->conexion, $sql);
    }

    /**
     * Method that modifies an usuario entered by parameter
     *
     * @param Administrador $usuario
     * @return void
     */
    public function modify($administrador)
    {

        $sql = "UPDATE ADMINISTRADOR SET cod_administrador = " . $administrador->getCod_administrador() . ",
                                    nombre_administrador = '" . $administrador->getNombre_administrador() . "',
                                    cod_estado_usuario = ". $administrador->getCod_estado_usuario() .",
                                    cod_tipo_usuario = ". $administrador->getCod_tipo_usuario() . ",
                                    contraseña = '". $administrador->getContraseña() ."',
                                    usuario_login = '". $administrador->getUsuario_login() ."',
                                    telefono = ". $administrador->getTelefono() .",
                                    correo = '". $administrador->getCorreo() ."',
                                    direccion = '". $administrador->getDireccion() ."',
                                    pais = '". $administrador->getPais() ."',
                                    cumpleaños = '". $administrador->getCumpleaños() ."',
                                    cuenta_skype = '". $administrador->getCuenta_skype() ."',
                                    nombre_contacto_emergencia = '". $administrador->getNombre_contacto_emergencia() ."',
                                    numero_contacto_emergencia = ". $administrador->getNumero_contacto_emergencia() ."
                                   where cod_administrador = " . $administrador->getCod_administrador() . "
                                ;";
        pg_query($this->conexion, $sql);
    }

    /**
     * Method to delete a usuario
     *
     * @param Administrador $usuario
     * @return void
     */

    public function delete($cod_administrador)
    {
        $sql = "DELETE FROM ADMINISTRADOR WHERE cod_administrador = " . $cod_administrador;

        pg_query($this->conexion, $sql);
    }

    /**
     * Method to get an UsuarioDAO object
     *
     * @param Object $conexion
     * @return AdministradorDAO
     */
    public function getList()
    {

        $sql = "SELECT * FROM ADMINISTRADOR order by nombre_administrador";
        $administradors = array();
        if (!$resultado = pg_query($this->conexion, $sql)) die();

        while ($row = pg_fetch_array($resultado)) {
            $administrador = new Administrador();
            $administrador->setCod_administrador($row[0]);
            $administrador->setNombre_administrador($row[1]);
            $administrador->setCod_estado_usuario($row[2]);
            $administrador->setCod_tipo_usuario($row[3]);
            $administrador->setContraseña($row[4]);
            $administrador->setUsuario_login($row[5]);
            $administrador->setTelefono($row[6]);
            $administrador->setCorreo($row[7]);
            $administrador->setDireccion($row[8]);
            $administrador->setPais($row[9]);
            $administrador->setCumpleaños($row[10]);
            $administrador->setCuenta_skype($row[11]);
            $administrador->setNombre_contacto_emergencia($row[12]);
            $administrador->setNumero_contacto_emergencia($row[13]);
            array_push($administradors, $administrador);
         
        }
        return $administradors;
    }

    public function verificarCuenta($correo, $pass)
    {

        $sql = "SELECT * from administrador WHERE usuario_login = '" . $correo . "' and contraseña = '" . $pass . "'";

        if (!$resultado = pg_query($this->conexion, $sql)) die();
        $row = pg_fetch_array($resultado);
        if ($row[0] == null) {
            return null;
        }


        $administrador = new Administrador();

        $administrador->setCod_administrador($row[0]);
        $administrador->setNombre_administrador($row[1]);
        $administrador->setCod_estado_usuario($row[2]);
        $administrador->setCod_tipo_usuario($row[3]);
        $administrador->setContraseña($row[4]);
        $administrador->setUsuario_login($row[5]);
        $administrador->setTelefono($row[6]);
        $administrador->setCorreo($row[7]);
        $administrador->setDireccion($row[8]);
        $administrador->setPais($row[9]);
        $administrador->setCumpleaños($row[10]);
        $administrador->setCuenta_skype($row[11]);
        $administrador->setNombre_contacto_emergencia($row[12]);
        $administrador->setNumero_contacto_emergencia($row[13]);

        return $administrador;
    }

    /**
     * Gets the object of this class. In case it is null, create it
     *
     * @param Object $conexion
     * @return AdministradorDAO
     */
    public static function getAdministradorDAO($conexion)
    {
        if (self::$administradorDAO == null) {
            self::$administradorDAO = new AdministradorDAO($conexion);
        }

        return self::$administradorDAO;
    }
    

}
?>