<?php

/**
 * Represents the class of the sub cliente partner - DTO entity
 */

class Sub_cliente_partner{

    //----------------------------
    //Attributes
    //----------------------------

    /**
     * Code of the sub cliente partner to which it belongs
     *
     * @return int
     */ 
    private $cod_sub_cliente_partner;

    /**
     * Name of the sub cliente_partner
     *
     * @return String
     */ 
    private $nombre_sub_cliente_partner;

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
     * Get the value of cod_sub_cliente_partner
     */ 
    public function getCod_sub_cliente_partner()
    {
        return $this->cod_sub_cliente_partner;
    }

    /**
     * Set the value of cod_sub_cliente_partner
     *
     * @return  self
     */ 
    public function setCod_sub_cliente_partner($cod_sub_cliente_partner)
    {
        $this->cod_sub_cliente_partner = $cod_sub_cliente_partner;

        return $this;
    }

    /**
     * Get the value of nombre_sub_cliente_partner
     */ 
    public function getNombre_sub_cliente_partner()
    {
        return $this->nombre_sub_cliente_partner;
    }

    /**
     * Set the value of nombre_sub_cliente_partner
     *
     * @return  self
     */ 
    public function setNombre_sub_cliente_partner($nombre_sub_cliente_partner)
    {
        $this->nombre_sub_cliente_partner  = $nombre_sub_cliente_partner;

        return $this;
    }

    /**
     * Get the value of cod_cliente_partner
     */ 
    public function getCod_cliente_partner()
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