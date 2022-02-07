<?php

/**
 * Represents the class of the Estado Usuario - DTO entity
 */

class Estado_actual{

    //----------------------------
    //Attributes
    //----------------------------

    /**
     * Code of the estado usuario to which it belongs
     *
     * @return int
     */ 
    private $cod_estado_actual;

    /**
     * nombre del estado usuario
     *
     * @return String
     */ 
    private $nombre_estado;
   

     /**
     * Get the value of cod_estado_actual
     */ 
    public function getCod_estado_actual()
    {
        return $this->cod_estado_actual;
    }

    /**
     * Set the value of cod_estado_actual
     *
     * @return  self
     */ 
    public function setCod_estado_actual($cod_estado_actual)
    {
        $this->cod_estado_actual = $cod_estado_actual;

        return $this;
    }

    /**
     * Get the value of nombre_estado
     */ 
    public function getNombre_estado()
    {
        return $this->nombre_estado;
    }

    /**
     * Set the value of nombre_estado
     *
     * @return  self
     */ 
    public function setNombre_estado($nombre_estado)
    {
        $this->nombre_estado  = $nombre_estado;

        return $this;
    }

}  