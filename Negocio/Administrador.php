<?php

/**
 * Represents the class of the Administrador - DTO entity
 */

class Administrador{

    //----------------------------
    //Attributes
    //----------------------------

    /**
     * Code of the administrador to which it belongs
     *
     * @return int
     */ 
    private $cod_administrador;

    /**
     * Name of administrador
     *
     * @return String
     */ 
    private $nombre_administrador;

    /**
     * Code of the tipo usuario to which it belongs
     *
     * @return int
     */ 
    private $cod_tipo_usuario;

    /**
     * Code of the estado usuario to which it belongs
     *
     * @return int
     */ 
    private $cod_estado_usuario;

    /**
     * contraseña del usuario
     *
     * @return String
     */ 
    private $contraseña;

    /**
     * user of the administrator
     *
     * @return String
     */ 
    private $usuario_login;

    /**
     * phone of the administrator
     *
     * @return Bigint
     */ 
    private $telefono;

    /**
     * correo of the administrator
     *
     * @return String
     */ 
    private $correo;

    /**
     * direccion of the administrator
     *
     * @return String
     */ 
    private $direccion;

    /**
     * pais of the administrator
     *
     * @return String
     */ 
    private $pais;

    /**
     * cumpleaños of the administrator
     *
     * @return Date
     */ 
    private $cumpleaños;

    /**
     * cuenta skype of the administrator
     *
     * @return String
     */ 
    private $cuenta_skype;

    /**
     * nombre contacto emergencia of the administrator
     *
     * @return String
     */ 
    private $nombre_contacto_emergencia;

    /**
     * numero contacto emergencia of the administrator
     *
     * @return Bigint
     */ 
    private $numero_contacto_emergencia;
   

    /**
     * Get the value of cod_administrador
     */ 
    public function getCod_administrador()
    {
        return $this->cod_administrador;
    }

    /**
     * Set the value of cod_administrador
     *
     * @return  self
     */ 
    public function setCod_administrador($cod_administrador)
    {
        $this->cod_administrador  = $cod_administrador;

        return $this;
    }

    /**
     * Get the value of nombre_administrador
     */ 
    public function getNombre_administrador()
    {
        return $this->nombre_administrador;
    }

    /**
     * Set the value of nombre_administrador
     *
     * @return  self
     */ 
    public function setNombre_administrador($nombre_administrador)
    {
        $this->nombre_administrador  = $nombre_administrador;

        return $this;
    }

   
    /**
     * Get the value of cod_tipo_usuario
     */ 
    public function getCod_tipo_usuario()
    {
        return $this->cod_tipo_usuario;
    }

    /**
     * Set the value of cod_tipo_usuario
     *
     * @return  self
     */ 
    public function setCod_tipo_usuario($cod_tipo_usuario)
    {
        $this->cod_tipo_usuario = $cod_tipo_usuario;

        return $this;
    }

     /**
     * Get the value of cod_estado_usuario
     */ 
    public function getCod_estado_usuario()
    {
        return $this->cod_estado_usuario;
    }

    /**
     * Set the value of cod_estado_usuario
     *
     * @return  self
     */ 
    public function setCod_estado_usuario($cod_estado_usuario)
    {
        $this->cod_estado_usuario = $cod_estado_usuario;

        return $this;
    }

    /**
     * Get the value of contraseña
     */ 
    public function getContraseña()
    {
        return $this->contraseña;
    }

    /**
     * Set the value of contraseña
     *
     * @return  self
     */ 
    public function setContraseña($contraseña)
    {
        $this->contraseña  = $contraseña;

        return $this;
    }

    /**
     * Get the value of contraseña
     */ 
    public function getUsuario_login()
    {
        return $this->usuario_login;
    }

    /**
     * Set the value of contraseña
     *
     * @return  self
     */ 
    public function setUsuario_login($usuario_login)
    {
        $this->usuario_login  = $usuario_login;

        return $this;
    }

    /**
     * Get the value of telefono
     */ 
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set the value of telefono
     *
     * @return  self
     */ 
    public function setTelefono($telefono)
    {
        $this->telefono  = $telefono;

        return $this;
    }

    /**
     * Get the value of correo
     */ 
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set the value of correo
     *
     * @return  self
     */ 
    public function setCorreo($correo)
    {
        $this->correo  = $correo;

        return $this;
    }
     
    /**
     * Get the value of direccion
     */ 
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set the value of direccion
     *
     * @return  self
     */ 
    public function setDireccion($direccion)
    {
        $this->direccion  = $direccion;

        return $this;
    }

    /**
     * Get the value of pais
     */ 
    public function getPais()
    {
        return $this->pais;
    }

    /**
     * Set the value of pais
     *
     * @return  self
     */ 
    public function setPais($pais)
    {
        $this->pais  = $pais;

        return $this;
    }

    /**
     * Get the value of cumpleaños
     */ 
    public function getCumpleaños()
    {
        return $this->cumpleaños;
    }

    /**
     * Set the value of cumpleaños
     *
     * @return  self
     */ 
    public function setCumpleaños($cumpleaños)
    {
        $this->cumpleaños  = $cumpleaños;

        return $this;
    }

    /**
     * Get the value of cuenta_skype
     */ 
    public function getCuenta_skype()
    {
        return $this->cuenta_skype;
    }

    /**
     * Set the value of cuenta_skype
     *
     * @return  self
     */ 
    public function setCuenta_skype($cuenta_skype)
    {
        $this->cuenta_skype  = $cuenta_skype;

        return $this;
    }

    /**
     * Get the value of nombre contacto emergencia
     */ 
    public function getNombre_contacto_emergencia()
    {
        return $this->nombre_contacto_emergencia;
    }

    /**
     * Set the value of nombre contacto emergencia
     *
     * @return  self
     */ 
    public function setNombre_contacto_emergencia($nombre_contacto_emergencia)
    {
        $this->nombre_contacto_emergencia  = $nombre_contacto_emergencia;

        return $this;
    }

     /**
     * Get the value of numero contacto emergencia
     */ 
    public function getNumero_contacto_emergencia()
    {
        return $this->numero_contacto_emergencia;
    }

    /**
     * Set the value of numero contacto emergencia
     *
     * @return  self
     */ 
    public function setNumero_contacto_emergencia($numero_contacto_emergencia)
    {
        $this->numero_contacto_emergencia  = $numero_contacto_emergencia;

        return $this;
    }

}  