<?php

/**
 * Represents the class of the PEP del cliente - DTO entity
 */

class Pep_cliente{

    //----------------------------
    //Attributes
    //----------------------------

    /**
     * Code of the pep cliente to which it belongs
     *
     * @return int
     */ 
    private $cod_pep_cliente;

    /**
     * Name of the pep del cliente
     *
     * @return String
     */ 
    private $referencia_pep_cliente;

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
     * Get the value of cod_pep_cliente
     */ 
    public function getCod_pep_cliente()
    {
        return $this->cod_pep_cliente;
    }

    /**
     * Set the value of cod_pep_cliente
     *
     * @return  self
     */ 
    public function setCod_pep_cliente($cod_pep_cliente)
    {
        $this->cod_pep_cliente = $cod_pep_cliente;

        return $this;
    }

    /**
     * Get the value of referencia_pep_cliente
     */ 
    public function getReferencia_pep_cliente()
    {
        return $this->referencia_pep_cliente;
    }

    /**
     * Set the value of referencia_pep_cliente
     *
     * @return  self
     */ 
    public function setReferencia_pep_cliente($referencia_pep_cliente)
    {
        $this->referencia_pep_cliente = $referencia_pep_cliente;

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