<?php

/**
 * Represents the class of the Reporte - DTO entity
 */

class Reporte{

    //----------------------------
    //Attributes
    //----------------------------

    /**
     * Code of the reporte to which it belongs
     *
     * @return int
     */ 
    private $cod_reporte;

    /**
     * Date of the reporte
     *
     * @return Date
     */ 
    private $fecha_de_reporte; 

    /**
     * Code of the user to which it belongs
     *
     * @return int
     */ 
    private $cod_usuario;

     /**
     * Code of the cliente partner to which it belongs
     *
     * @return int
     */ 
    private $cod_cliente_partner;

    /**
     * Description of the activity
     *
     * @return String
     */ 
    private $descripcion_actividad;

    /**
     * hours worked
     *
     * @return Double_Precision
     */ 
    private $hora_trabajadas;

    /**
     * Place of the person realized the job
     *
     * @return String
     */ 
    private $lugar_de_trabajo;

    /**
     * Date of change
     *
     * @return String
     */ 
    private $hora_de_registro; 

    /**
     * Code of the user to which it belongs
     *
     * @return int
     */ 
    private $cod_sub_cliente_partner;

    /**
     * Code of the user to which it belongs
     *
     * @return String
     */ 
    private $cod_no_ticket;

    /**
     * Code of the user to which it belongs
     *
     * @return int
     */ 
    private $cod_pep_cliente;

    /**
     * Code of the user to which it belongs
     *
     * @return int
     */ 
    private $cod_sub_mod_sap;

     /**
     * Code of the user to which it belongs
     *
     * @return int
     */ 
    private $cod_mod_sap;

    /**
     * Get the value of cod_reporte
     */ 
    public function getCod_reporte()
    {
        return $this->cod_reporte;
    }

    /**
     * Set the value of cod_reporte
     *
     * @return  self
     */ 
    public function setCod_reporte($cod_reporte)
    {
        $this->cod_reporte = $cod_reporte;

        return $this;
    }

    /**
     * Get the value of fecha_de_reporte
     */ 
    public function getFecha_de_reporte()
    {
        return $this->fecha_de_reporte;
    }

    /**
     * Set the value of fecha_de_reporte
     *
     * @return  self
     */ 
    public function setFecha_de_reporte($fecha_de_reporte)
    {
        $this->fecha_de_reporte = $fecha_de_reporte;

        return $this;
    }

    /**
     * Get the value of cod_usuario
     */ 
    public function getCod_usuario()
    {
        return $this->cod_usuario;
    }

    /**
     * Set the value of cod_usuario
     *
     * @return  self
     */ 
    public function setCod_usuario($cod_usuario)
    {
        $this->cod_usuario = $cod_usuario;

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
     * Get the value of descripcion_actividad
     */ 
    public function getDescripcion_actividad()
    {
        return $this->descripcion_actividad;
    }

    /**
     * Set the value of descripcion_actividad
     *
     * @return  self
     */ 
    public function setDescripcion_actividad($descripcion_actividad)
    {
        $this->descripcion_actividad = $descripcion_actividad;

        return $this;
    }

    /**
     * Get the value of horas_trabajadas
     */ 
    public function getHoras_trabajadas()
    {
        return $this->horas_trabajadas;
    }

    /**
     * Set the value of horas_trabajadas
     *
     * @return  self
     */ 
    public function setHoras_trabajadas($horas_trabajadas)
    {
        $this->horas_trabajadas = $horas_trabajadas;

        return $this;
    }

    /**
     * Get the value of lugar_de_trabajo
     */ 
    public function getLugar_de_trabajo()
    {
        return $this->lugar_de_trabajo;
    }

    /**
     * Set the value of lugar_de_trabajo
     *
     * @return  self
     */ 
    public function setLugar_de_trabajo($lugar_de_trabajo)
    {
        $this->lugar_de_trabajo = $lugar_de_trabajo;

        return $this;
    }

    /**
     * Get the value of hora_de_registro
     */ 
    public function getHora_de_registro()
    {
        return $this->hora_de_registro;
    }

    /**
     * Set the value of hora_de_registro
     *
     * @return  self
     */ 
    public function setHora_de_registro($hora_de_registro)
    {
        $this->hora_de_registro = $hora_de_registro;

        return $this;
    }

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

}  