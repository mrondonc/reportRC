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

}  