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

}  