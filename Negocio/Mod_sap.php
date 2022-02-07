<?php

/**
 * Represents the class of the Modulo SAP - DTO entity
 */

class Mod_sap{

    //----------------------------
    //Attributes
    //----------------------------

    /**
     * Code of the modulo sap to which it belongs
     *
     * @return int
     */ 
    private $cod_mod_sap;

    /**
     * Name of the modulo sap
     *
     * @return String
     */ 
    private $nombre_mod_sap;

    /**
     * Code of the modulo sap to which it belongs
     *
     * @return int
     */ 
    private $cod_estado_actual;



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
     * Get the value of nombre_mod_sap
     */ 
    public function getNombre_mod_sap()
    {
        return $this->nombre_mod_sap;
    }

    /**
     * Set the value of nombre_mod_sap
     *
     * @return  self
     */ 
    public function setNombre_mod_sap($nombre_mod_sap)
    {
        $this->nombre_mod_sap = $nombre_mod_sap;

        return $this;
    }

    /**
     * Get the value of cod_mod_sap
     */ 
    public function getCod_estado_actual()
    {
        return $this->cod_estado_actual;
    }

    /**
     * Set the value of cod_mod_sap
     *
     * @return  self
     */ 
    public function setCod_estado_actual($cod_estado_actual)
    {
        $this->cod_estado_actual = $cod_estado_actual;

        return $this;
    }

}  