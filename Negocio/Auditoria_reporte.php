<?php

/**
 * Represents the class of the Auditoria Reporte - DTO entity
 */

class Auditoria_reporte{

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
     * Date of the reporte vieja
     *
     * @return Date
     */ 
    private $fecha_de_reporte_vieja; 

    /**
     * Date of the reporte nueva
     *
     * @return Date
     */ 
    private $fecha_de_reporte_nueva; 

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
     * Old hours worked
     *
     * @return Double_Precision
     */ 
    private $hora_trabajadas_vieja;

    /**
     * New hours worked
     *
     * @return Double_Precision
     */ 
    private $hora_trabajadas_nueva;

    /**
     * Place of the person realized the job
     *
     * @return String
     */ 
    private $lugar_de_trabajo;

    /**
     * Date of change
     *
     * @return Date
     */ 
    private $fecha_de_cambio; 

    /**
     * Type of change
     *
     * @return String
     */ 
    private $tipo_de_cambio;


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
     * Get the value of fecha_de_reporte_vieja
     */ 
    public function getFecha_de_reporte_vieja()
    {
        return $this->fecha_de_reporte_vieja;
    }

    /**
     * Set the value of fecha_de_reporte_vieja
     *
     * @return  self
     */ 
    public function setFecha_de_reporte_vieja($fecha_de_reporte_vieja)
    {
        $this->fecha_de_reporte_vieja = $fecha_de_reporte_vieja;

        return $this;
    }

    /**
     * Get the value of fecha_de_reporte_nueva
     */ 
    public function getFecha_de_reporte_nueva()
    {
        return $this->fecha_de_reporte_nueva;
    }

    /**
     * Set the value of fecha_de_reporte_nueva
     *
     * @return  self
     */ 
    public function setFecha_de_reporte_nueva($fecha_de_reporte_nueva)
    {
        $this->fecha_de_reporte_nueva = $fecha_de_reporte_nueva;

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
     * Get the value of horas_trabajadas_vieja
     */ 
    public function getHoras_trabajadas_vieja()
    {
        return $this->horas_trabajadas_vieja;
    }

    /**
     * Set the value of horas_trabajadas_vieja
     *
     * @return  self
     */ 
    public function setHoras_trabajadas_vieja($horas_trabajadas_vieja)
    {
        $this->horas_trabajadas_vieja = $horas_trabajadas_vieja;

        return $this;
    }

    /**
     * Get the value of horas_trabajadas_nueva
     */ 
    public function getHoras_trabajadas_nueva()
    {
        return $this->horas_trabajadas_nueva;
    }

    /**
     * Set the value of horas_trabajadas_nueva
     *
     * @return  self
     */ 
    public function setHoras_trabajadas_nueva($horas_trabajadas_nueva)
    {
        $this->horas_trabajadas_nueva = $horas_trabajadas_nueva;

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
     * Get the value of fecha_de_cambio
     */ 
    public function getFecha_de_cambio()
    {
        return $this->fecha_de_cambio;
    }

    /**
     * Set the value of fecha_de_cambio
     *
     * @return  self
     */ 
    public function setFecha_de_cambio($fecha_de_cambio)
    {
        $this->fecha_de_cambio = $fecha_de_cambio;

        return $this;
    }

    
    /**
     * Get the value of tipo_de_cambio
     */ 
    public function getTipo_de_cambio()
    {
        return $this->tipo_de_cambio;
    }

    /**
     * Set the value of tipo_de_cambio
     *
     * @return  self
     */ 
    public function setTipo_de_cambio($tipo_de_cambio)
    {
        $this->tipo_de_cambio = $tipo_de_cambio;

        return $this;
    }
}  