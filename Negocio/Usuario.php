<?php

/**
 * Represents the class of the Usuario - DTO entity
 */

class Usuario{

    //----------------------------
    //Attributes
    //----------------------------

    /**
     * Code of the usuario to which it belongs
     *
     * @return int
     */ 
    private $cod_usuario;

    /**
     * Name of usuario
     *
     * @return String
     */ 
    private $nombre_usuario;

    /**
     * Last name of usuario
     *
     * @return String
     */ 
    private $apellido_usuario;

    /**
     * Telefono del usuario
     *
     * @return BigInt
     */ 
    private $telefono_usuario;

    /**
     * correo del usuario
     *
     * @return String
     */ 
    private $correo_usuario;

     /**
     * direccion del usuario
     *
     * @return String
     */ 
    private $direccion_usuario;

    /**
     * Code of the mod sap to which it belongs
     *
     * @return int
     */ 
    private $cod_mod_sap;

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
     * pais del usuario
     *
     * @return String
     */ 
    private $pais;

     /**
     * pais del usuario
     *
     * @return String
     */ 
    private $usuario_login;

    /**
     * cumpleaños del usuario
     *
     * @return Date
     */ 
    private $cumpleaños;

    /**
     * cuenta skype del usuario
     *
     * @return String
     */ 
    private $cuenta_skype;

    /**
     * contacto de emergencia del usuario
     *
     * @return String
     */ 
    private $nombre_contacto_emergencia;

    /**
     * contacto de emergencia del usuario
     *
     * @return Bigint
     */ 
    private $numero_contacto_emergencia;

    /**
     * Get the value of cod_usuario
     */ 
    public function getCod_usuario()
    {
        return $this->cod_usuario;
    }

    /**
     * Set the value of cod_usuario
     *
     * @return  self
     */ 
    public function setCod_usuario($cod_usuario)
    {
        $this->cod_usuario  = $cod_usuario;

        return $this;
    }

    /**
     * Get the value of nombre_usuario
     */ 
    public function getNombre_usuario()
    {
        return $this->nombre_usuario;
    }

    /**
     * Set the value of nombre_usuario
     *
     * @return  self
     */ 
    public function setNombre_usuario($nombre_usuario)
    {
        $this->nombre_usuario  = $nombre_usuario;

        return $this;
    }

    /**
     * Get the value of apellido_usuario
     */ 
    public function getApellido_usuario()
    {
        return $this->apellido_usuario;
    }

    /**
     * Set the value of apellido_usuario
     *
     * @return  self
     */ 
    public function setApellido_usuario($apellido_usuario)
    {
        $this->apellido_usuario  = $apellido_usuario;

        return $this;
    }

    /**
     * Get the value of telefono_usuario
     */ 
    public function getTelefono_usuario()
    {
        return $this->telefono_usuario;
    }

    /**
     * Set the value of telefono_usuario
     *
     * @return  self
     */ 
    public function setTelefono_usuario($telefono_usuario)
    {
        $this->telefono_usuario  = $telefono_usuario;

        return $this;
    }

      /**
     * Get the value of correo_usuario
     */ 
    public function getCorreo_usuario()
    {
        return $this->correo_usuario;
    }

    /**
     * Set the value of correo_usuario
     *
     * @return  self
     */ 
    public function setCorreo_usuario($correo_usuario)
    {
        $this->correo_usuario  = $correo_usuario;

        return $this;
    }

     /**
     * Get the value of direccion_usuario
     */ 
    public function getDireccion_usuario()
    {
        return $this->direccion_usuario;
    }

    /**
     * Set the value of direccion_usuario
     *
     * @return  self
     */ 
    public function setDireccion_usuario($direccion_usuario)
    {
        $this->direccion_usuario  = $direccion_usuario;

        return $this;
    }

    /**
     * Get the value of cod_mod_sap
     */ 
    public function getCod_mod_sap()
    {
        return $this->cod_mod_sap;
    }

    /**
     * Set the value of cod_mod_sap
     *
     * @return  self
     */ 
    public function setCod_mod_sap($cod_mod_sap)
    {
        $this->cod_mod_sap = $cod_mod_sap;

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
     * Get the value of pais
     */ 
    public function getUsuario_login()
    {
        return $this->usuario_login;
    }

    /**
     * Set the value of pais
     *
     * @return  self
     */ 
    public function setUsuario_login($usuario_login)
    {
        $this->usuario_login  = $usuario_login;

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
     * Get the value of cuenta skype
     */ 
    public function getCuenta_skype()
    {
        return $this->cuenta_skype;
    }

    /**
     * Set the value of cuenta skype
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