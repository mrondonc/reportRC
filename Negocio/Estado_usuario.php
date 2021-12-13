<?php

/**
 * Represents the class of the Estado Usuario - DTO entity
 */

class Estado_usuario{

    //----------------------------
    //Attributes
    //----------------------------

    /**
     * Code of the estado usuario to which it belongs
     *
     * @return int
     */ 
    private $cod_estado_usuario;

    /**
     * nombre del estado usuario
     *
     * @return String
     */ 
    private $nombre_estado_usuario;
   

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
     * Get the value of nombre_estado_usuario
     */ 
    public function getNombre_estado_usuario()
    {
        return $this->nombre_estado_usuario;
    }

    /**
     * Set the value of nombre_estado_usuario
     *
     * @return  self
     */ 
    public function setNombre_estado_usuario($nombre_estado_usuario)
    {
        $this->nombre_estado_usuario  = $nombre_estado_usuario;

        return $this;
    }

}  