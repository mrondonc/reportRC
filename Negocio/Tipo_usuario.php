<?php

/**
 * Represents the class of the tipo de usuario - DTO entity
 */

class Tipo_usuario{

    //----------------------------
    //Attributes
    //----------------------------

    /**
     * Code of the tipo de usuario to which it belongs
     *
     * @return int
     */ 
    private $cod_tipo_usuario;

    /**
     * Name of the tipo_usuario
     *
     * @return String
     */ 
    private $nombre_tipo_usuario;

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
     * Get the value of nombre_tipo_usuario
     */ 
    public function getNombre_tipo_usuario()
    {
        return $this->nombre_tipo_usuario;
    }

    /**
     * Set the value of nombre_tipo_usuario
     *
     * @return  self
     */ 
    public function setNombre_tipo_usuario($nombre_tipo_usuario)
    {
        $this->nombre_tipo_usuario  = $nombre_tipo_usuario;

        return $this;
    }

}  