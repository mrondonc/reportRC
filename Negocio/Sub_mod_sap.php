<?php

/**
 * Represents the class of the sub modulo sap - DTO entity
 */

class Sub_mod_sap{

    //----------------------------
    //Attributes
    //----------------------------

    /**
     * Code of the sub modulo sap to which it belongs
     *
     * @return int
     */ 
    private $cod_sub_mod_sap;

    /**
     * Name of the sub modulo sap
     *
     * @return String
     */ 
    private $nombre_sub_mod_sap;

    /**
     * Code of the cliente partner to which it belongs
     *
     * @return int
     */ 
    private $cod_cliente_partner;

    /**
     * Code of the modulo sap to which it belongs
     *
     * @return int
     */ 
    private $cod_estado_actual;



    /**
     * Get the value of cod_sub_mod_sap
     */ 
    public function getCod_sub_mod_sap()
    {
        return $this->cod_sub_mod_sap;
    }

    /**
     * Set the value of cod_sub_mod_sap
     *
     * @return  self
     */ 
    public function setCod_sub_mod_sap($cod_sub_mod_sap)
    {
        $this->cod_sub_mod_sap = $cod_sub_mod_sap;

        return $this;
    }

    /**
     * Get the value of nombre_sub_mod_sap
     */ 
    public function getNombre_sub_mod_sap()
    {
        return $this->nombre_sub_mod_sap;
    }

    /**
     * Set the value of nombre_sub_mod_sap
     *
     * @return  self
     */ 
    public function setNombre_sub_mod_sap($nombre_sub_mod_sap)
    {
        $this->nombre_sub_mod_sap = $nombre_sub_mod_sap;

        return $this;
    }

    /**
     * Get the value of cod_cliente_partner
     */ 
    public function getCod_cliente_partnert()
    {
        return $this->cod_cliente_partner;
    }

    /**
     * Set the value of cod_cliente_partner
     *
     * @return  self
     */ 
    public function setCod_cliente_partner($cod_cliente_partner)
    {
        $this->cod_cliente_partner = $cod_cliente_partner;

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