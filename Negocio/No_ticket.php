<?php

/**
 * Represents the class of the Numero de ticket - DTO entity
 */

class No_ticket{

    //----------------------------
    //Attributes
    //----------------------------

    /**
     * Code of the numero de ticket to which it belongs
     *
     * @return int
     */ 
    private $cod_no_ticket;

    /**
     * Name of the numero de ticket
     *
     * @return String
     */ 
    private $referencia_no_ticket;

    /**
     * Code of the cliente partner to which it belongs
     *
     * @return int
     */ 
    private $cod_cliente_partner;


    /**
     * Get the value of cod_no_ticket
     */ 
    public function getCod_no_ticket()
    {
        return $this->cod_no_ticket;
    }

    /**
     * Set the value of cod_no_ticket
     *
     * @return  self
     */ 
    public function setCod_no_ticket($cod_no_ticket)
    {
        $this->cod_no_ticket = $cod_no_ticket;

        return $this;
    }

    /**
     * Get the value of referencia_no_ticket
     */ 
    public function getReferencia_no_ticket()
    {
        return $this->referencia_no_ticket;
    }

    /**
     * Set the value of referencia_no_ticket
     *
     * @return  self
     */ 
    public function setReferencia_no_ticket($referencia_no_ticket)
    {
        $this->referencia_no_ticket = $referencia_no_ticket;

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