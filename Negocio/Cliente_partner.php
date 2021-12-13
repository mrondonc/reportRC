<?php

/**
 * Represents the class of the Cliente Partner - DTO entity
 */

class Cliente_partner{

    //----------------------------
    //Attributes
    //----------------------------

    /**
     * Code of the cliente partner to which it belongs
     *
     * @return int
     */ 
    private $cod_cliente_partner;

    /**
     * Name of the cliente partner
     *
     * @return String
     */ 
    private $nombre_cliente_partner;


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
     * Get the value of nombre_cliente_partner
     */ 
    public function getNombre_cliente_partner()
    {
        return $this->nombre_cliente_partner;
    }

    /**
     * Set the value of nombre_cliente_partner
     *
     * @return  self
     */ 
    public function setNombre_cliente_partner($nombre_cliente_partner)
    {
        $this->nombre_cliente_partner = $nombre_cliente_partner;

        return $this;
    }

}  