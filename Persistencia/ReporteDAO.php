<?php

require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Reporte.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/DAO.php';

/**
 * 
 *Represents the DAO of the Reporte entity
 *
 */
class ReporteDAO implements DAO
{

    /**
     * Reference to the connection with the database
     * @var Object
     */
    private $conexion;

    /**
     * Reference to an ReporteDAO object
     * @var reporteDAO
     */
    private static $reporteDAO;

    //------------------------------------------
    // Builder
    //------------------------------------------

    /**
     * Builder of the class
     *
     * @param Object $conexion
     */
    private function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    /**
     * Method to query an reporte by his code type
     *
     * @param int $cod_reporte
     * @return Reporte
     */
    public function consult($cod_reporte)
    {
        
        $sql = "SELECT * FROM REPORTE WHERE cod_reporte = " . $cod_reporte;

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        $row = pg_fetch_array($resultado);

        $reporte = new Reporte();

        $reporte->setCod_reporte($row[0]);
        $reporte->setFecha_de_reporte($row[1]);
        $reporte->setCod_usuario($row[2]);
        $reporte->setCod_cliente_partner($row[3]);
        $reporte->setDescripcion_actividad($row[4]);
        $reporte->setHoras_trabajadas($row[5]);
        $reporte->setLugar_de_trabajo($row[6]);
        $reporte->setHora_de_registro($row[7]);
        $reporte->setCod_sub_cliente_partner($row[8]);
        $reporte->setCod_no_ticket($row[9]);
        $reporte->setCod_pep_cliente($row[10]);
        $reporte->setCod_sub_mod_sap($row[11]);
        $reporte->setCod_mod_sap($row[12]);

        return $reporte;
    }

    /**
     * Method to query an reporte by his code type
     *
     * @param int $cod_usuario
     * @return Reporte
     */
    public function consultUsuario($cod_usuario)
    {
        
        $sql = "SELECT * FROM REPORTE WHERE cod_usuario = " . $cod_usuario;

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        $row = pg_fetch_array($resultado);

        $reporte = new Reporte();

        $reporte->setCod_reporte($row[0]);
        $reporte->setFecha_de_reporte($row[1]);
        $reporte->setCod_usuario($row[2]);
        $reporte->setCod_cliente_partner($row[3]);
        $reporte->setDescripcion_actividad($row[4]);
        $reporte->setHoras_trabajadas($row[5]);
        $reporte->setLugar_de_trabajo($row[6]);
        $reporte->setHora_de_registro($row[7]);
        $reporte->setCod_sub_cliente_partner($row[8]);
        $reporte->setCod_no_ticket($row[9]);
        $reporte->setCod_pep_cliente($row[10]);
        $reporte->setCod_sub_mod_sap($row[11]);
        $reporte->setCod_mod_sap($row[12]);

        return $reporte;
    }


    /**
     * Method to create a new reporte
     *
     * @param Reporte $Reporte
     * @return void
     */
    public function create($reporte)
    {
        $sql = "insert into REPORTE(fecha_de_reporte, cod_usuario, cod_cliente_partner, descripcion_actividad, horas_trabajadas, lugar_de_trabajo, hora_de_registro, cod_sub_cliente_partner, cod_no_ticket, cod_pep_cliente, cod_sub_mod_sap, cod_mod_sap) 
                                        values ('" . $reporte->getFecha_de_reporte() . "',
                                            " . $reporte->getCod_usuario() . ",
                                            " . $reporte->getCod_cliente_partner() . ",
                                            '" . $reporte->getDescripcion_actividad() . "',
                                            " . $reporte->getHoras_trabajadas() . ",
                                            '" . $reporte->getLugar_de_trabajo() . "',
                                            '" . $reporte->getHora_de_registro() . "',
                                            " . $reporte->getCod_sub_cliente_partner() . ",
                                            '" . $reporte->getCod_no_ticket() . "',
                                            " . $reporte->getCod_pep_cliente() . ",
                                            " . $reporte->getCod_sub_mod_sap() . ",
                                            " . $reporte->getCod_mod_sap() . "
                                        );";

        pg_query($this->conexion, $sql);
    }

    /**
     * Method that modifies an reporte entered by parameter
     *
     * @param Reporte $reporte
     * @return void
     */
    public function modify($reporte)
    {

        $sql = "UPDATE REPORTE SET cod_reporte = " . $reporte->getCod_reporte() . ",
                                   fecha_de_reporte = '" . $reporte->getFecha_de_reporte() . "',
                                   cod_usuario = " . $reporte->getCod_usuario() . ",
                                   cod_cliente_partner = " . $reporte->getCod_cliente_partner() . ",
                                   descripcion_actividad = '" . $reporte->getDescripcion_actividad() . "',
                                   horas_trabajadas = " . $reporte->getHoras_trabajadas() . ",
                                   lugar_de_trabajo = '" . $reporte->getLugar_de_trabajo() . "',
                                   hora_de_registro = '" . $reporte->getHora_de_registro() . "',
                                   cod_sub_cliente_partner = " . $reporte->getCod_sub_cliente_partner() . ",
                                   cod_no_ticket = '" . $reporte->getCod_no_ticket() . "',
                                   cod_pep_cliente = " . $reporte->getCod_pep_cliente() . ",
                                   cod_sub_mod_sap = " . $reporte->getCod_sub_mod_sap() . ",
                                   cod_mod_sap = " . $reporte->getCod_mod_sap() . "
                                   where cod_reporte = " . $reporte->getCod_reporte() . "
                                ;";
        pg_query($this->conexion, $sql);
    }

    /**
     * Method to delete a reporte
     *
     * @param Reporte $reporte
     * @return void
     */

    public function delete($cod_reporte)
    {
        $sql = "DELETE FROM REPORTE WHERE cod_reporte = " . $cod_reporte;

        pg_query($this->conexion, $sql);
    }

    /**
     * Method to get an ReporteDAO object
     *
     * @param Object $conexion
     * @return ReporteDAO
     */
    public function getList()
    {

        $sql = "SELECT * FROM REPORTE order by FECHA_DE_REPORTE desc";
        $reportes = array();

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        while ($row = pg_fetch_array($resultado)) {
            $reporte = new Reporte();
            $reporte->setCod_reporte($row[0]);
            $reporte->setFecha_de_reporte($row[1]);
            $reporte->setCod_usuario($row[2]);
            $reporte->setCod_cliente_partner($row[3]);
            $reporte->setDescripcion_actividad($row[4]);
            $reporte->setHoras_trabajadas($row[5]);
            $reporte->setLugar_de_trabajo($row[6]);
            $reporte->setHora_de_registro($row[7]);
            $reporte->setCod_sub_cliente_partner($row[8]);
            $reporte->setCod_no_ticket($row[9]);
            $reporte->setCod_pep_cliente($row[10]);
            $reporte->setCod_sub_mod_sap($row[11]);
            $reporte->setCod_mod_sap($row[12]);
            array_push($reportes, $reporte);
            
        }
        return $reportes;
    }

    /**
     * Method to get an ReporteDAO object
     *
     * @param Object $conexion
     * @return ReporteDAO
     */
    public function getListPorMesActual()
    {

        $sql = "SELECT * FROM REPORTE WHERE EXTRACT(MONTH from fecha_de_reporte)=EXTRACT(MONTH from CURRENT_DATE) order by fecha_de_reporte desc";
        $reportes = array();

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        while ($row = pg_fetch_array($resultado)) {
            $reporte = new Reporte();
            $reporte->setCod_reporte($row[0]);
            $reporte->setFecha_de_reporte($row[1]);
            $reporte->setCod_usuario($row[2]);
            $reporte->setCod_cliente_partner($row[3]);
            $reporte->setDescripcion_actividad($row[4]);
            $reporte->setHoras_trabajadas($row[5]);
            $reporte->setLugar_de_trabajo($row[6]);
            $reporte->setHora_de_registro($row[7]);
            $reporte->setCod_sub_cliente_partner($row[8]);
            $reporte->setCod_no_ticket($row[9]);
            $reporte->setCod_pep_cliente($row[10]);
            $reporte->setCod_sub_mod_sap($row[11]);
            $reporte->setCod_mod_sap($row[12]);
            array_push($reportes, $reporte);
            
        }
        return $reportes;
    }

    /**
     * Method to get an ReporteDAO object
     *
     * @param Object $conexion
     * @return ReporteDAO
     */
    public function getListPorMesEnero()
    {

        $sql = "SELECT * FROM REPORTE WHERE EXTRACT(MONTH from fecha_de_reporte)=1 order by fecha_de_reporte desc";
        $reportes = array();

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        while ($row = pg_fetch_array($resultado)) {
            $reporte = new Reporte();
            $reporte->setCod_reporte($row[0]);
            $reporte->setFecha_de_reporte($row[1]);
            $reporte->setCod_usuario($row[2]);
            $reporte->setCod_cliente_partner($row[3]);
            $reporte->setDescripcion_actividad($row[4]);
            $reporte->setHoras_trabajadas($row[5]);
            $reporte->setLugar_de_trabajo($row[6]);
            $reporte->setHora_de_registro($row[7]);
            $reporte->setCod_sub_cliente_partner($row[8]);
            $reporte->setCod_no_ticket($row[9]);
            $reporte->setCod_pep_cliente($row[10]);
            $reporte->setCod_sub_mod_sap($row[11]);
            $reporte->setCod_mod_sap($row[12]);
            array_push($reportes, $reporte);
            
        }
        return $reportes;
    }

    /**
     * Method to get an ReporteDAO object
     *
     * @param Object $conexion
     * @return ReporteDAO
     */
    public function getListPorMesFebrero()
    {

        $sql = "SELECT * FROM REPORTE WHERE EXTRACT(MONTH from fecha_de_reporte)=2 order by fecha_de_reporte desc";
        $reportes = array();

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        while ($row = pg_fetch_array($resultado)) {
            $reporte = new Reporte();
            $reporte->setCod_reporte($row[0]);
            $reporte->setFecha_de_reporte($row[1]);
            $reporte->setCod_usuario($row[2]);
            $reporte->setCod_cliente_partner($row[3]);
            $reporte->setDescripcion_actividad($row[4]);
            $reporte->setHoras_trabajadas($row[5]);
            $reporte->setLugar_de_trabajo($row[6]);
            $reporte->setHora_de_registro($row[7]);
            $reporte->setCod_sub_cliente_partner($row[8]);
            $reporte->setCod_no_ticket($row[9]);
            $reporte->setCod_pep_cliente($row[10]);
            $reporte->setCod_sub_mod_sap($row[11]);
            $reporte->setCod_mod_sap($row[12]);
            array_push($reportes, $reporte);
            
        }
        return $reportes;
    }

    /**
     * Method to get an ReporteDAO object
     *
     * @param Object $conexion
     * @return ReporteDAO
     */
    public function getListPorMesMarzo()
    {

        $sql = "SELECT * FROM REPORTE WHERE EXTRACT(MONTH from fecha_de_reporte)=3 order by fecha_de_reporte desc";
        $reportes = array();

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        while ($row = pg_fetch_array($resultado)) {
            $reporte = new Reporte();
            $reporte->setCod_reporte($row[0]);
            $reporte->setFecha_de_reporte($row[1]);
            $reporte->setCod_usuario($row[2]);
            $reporte->setCod_cliente_partner($row[3]);
            $reporte->setDescripcion_actividad($row[4]);
            $reporte->setHoras_trabajadas($row[5]);
            $reporte->setLugar_de_trabajo($row[6]);
            $reporte->setHora_de_registro($row[7]);
            $reporte->setCod_sub_cliente_partner($row[8]);
            $reporte->setCod_no_ticket($row[9]);
            $reporte->setCod_pep_cliente($row[10]);
            $reporte->setCod_sub_mod_sap($row[11]);
            $reporte->setCod_mod_sap($row[12]);
            array_push($reportes, $reporte);
            
        }
        return $reportes;
    }

    /**
     * Method to get an ReporteDAO object
     *
     * @param Object $conexion
     * @return ReporteDAO
     */
    public function getListPorMesAbril()
    {

        $sql = "SELECT * FROM REPORTE WHERE EXTRACT(MONTH from fecha_de_reporte)=4 order by fecha_de_reporte desc";
        $reportes = array();

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        while ($row = pg_fetch_array($resultado)) {
            $reporte = new Reporte();
            $reporte->setCod_reporte($row[0]);
            $reporte->setFecha_de_reporte($row[1]);
            $reporte->setCod_usuario($row[2]);
            $reporte->setCod_cliente_partner($row[3]);
            $reporte->setDescripcion_actividad($row[4]);
            $reporte->setHoras_trabajadas($row[5]);
            $reporte->setLugar_de_trabajo($row[6]);
            $reporte->setHora_de_registro($row[7]);
            $reporte->setCod_sub_cliente_partner($row[8]);
            $reporte->setCod_no_ticket($row[9]);
            $reporte->setCod_pep_cliente($row[10]);
            $reporte->setCod_sub_mod_sap($row[11]);
            $reporte->setCod_mod_sap($row[12]);
            array_push($reportes, $reporte);
            
        }
        return $reportes;
    }

    /**
     * Method to get an ReporteDAO object
     *
     * @param Object $conexion
     * @return ReporteDAO
     */
    public function getListPorMesMayo()
    {

        $sql = "SELECT * FROM REPORTE WHERE EXTRACT(MONTH from fecha_de_reporte)=5 order by fecha_de_reporte desc";
        $reportes = array();

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        while ($row = pg_fetch_array($resultado)) {
            $reporte = new Reporte();
            $reporte->setCod_reporte($row[0]);
            $reporte->setFecha_de_reporte($row[1]);
            $reporte->setCod_usuario($row[2]);
            $reporte->setCod_cliente_partner($row[3]);
            $reporte->setDescripcion_actividad($row[4]);
            $reporte->setHoras_trabajadas($row[5]);
            $reporte->setLugar_de_trabajo($row[6]);
            $reporte->setHora_de_registro($row[7]);
            $reporte->setCod_sub_cliente_partner($row[8]);
            $reporte->setCod_no_ticket($row[9]);
            $reporte->setCod_pep_cliente($row[10]);
            $reporte->setCod_sub_mod_sap($row[11]);
            $reporte->setCod_mod_sap($row[12]);
            array_push($reportes, $reporte);
            
        }
        return $reportes;
    }

    /**
     * Method to get an ReporteDAO object
     *
     * @param Object $conexion
     * @return ReporteDAO
     */
    public function getListPorMesJunio()
    {

        $sql = "SELECT * FROM REPORTE WHERE EXTRACT(MONTH from fecha_de_reporte)=6 order by fecha_de_reporte desc";
        $reportes = array();

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        while ($row = pg_fetch_array($resultado)) {
            $reporte = new Reporte();
            $reporte->setCod_reporte($row[0]);
            $reporte->setFecha_de_reporte($row[1]);
            $reporte->setCod_usuario($row[2]);
            $reporte->setCod_cliente_partner($row[3]);
            $reporte->setDescripcion_actividad($row[4]);
            $reporte->setHoras_trabajadas($row[5]);
            $reporte->setLugar_de_trabajo($row[6]);
            $reporte->setHora_de_registro($row[7]);
            $reporte->setCod_sub_cliente_partner($row[8]);
            $reporte->setCod_no_ticket($row[9]);
            $reporte->setCod_pep_cliente($row[10]);
            $reporte->setCod_sub_mod_sap($row[11]);
            $reporte->setCod_mod_sap($row[12]);
            array_push($reportes, $reporte);
            
        }
        return $reportes;
    }

    /**
     * Method to get an ReporteDAO object
     *
     * @param Object $conexion
     * @return ReporteDAO
     */
    public function getListPorMesJulio()
    {

        $sql = "SELECT * FROM REPORTE WHERE EXTRACT(MONTH from fecha_de_reporte)=7 order by fecha_de_reporte desc";
        $reportes = array();

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        while ($row = pg_fetch_array($resultado)) {
            $reporte = new Reporte();
            $reporte->setCod_reporte($row[0]);
            $reporte->setFecha_de_reporte($row[1]);
            $reporte->setCod_usuario($row[2]);
            $reporte->setCod_cliente_partner($row[3]);
            $reporte->setDescripcion_actividad($row[4]);
            $reporte->setHoras_trabajadas($row[5]);
            $reporte->setLugar_de_trabajo($row[6]);
            $reporte->setHora_de_registro($row[7]);
            $reporte->setCod_sub_cliente_partner($row[8]);
            $reporte->setCod_no_ticket($row[9]);
            $reporte->setCod_pep_cliente($row[10]);
            $reporte->setCod_sub_mod_sap($row[11]);
            $reporte->setCod_mod_sap($row[12]);
            array_push($reportes, $reporte);
            
        }
        return $reportes;
    }

    /**
     * Method to get an ReporteDAO object
     *
     * @param Object $conexion
     * @return ReporteDAO
     */
    public function getListPorMesAgosto()
    {

        $sql = "SELECT * FROM REPORTE WHERE EXTRACT(MONTH from fecha_de_reporte)=8 order by fecha_de_reporte desc";
        $reportes = array();

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        while ($row = pg_fetch_array($resultado)) {
            $reporte = new Reporte();
            $reporte->setCod_reporte($row[0]);
            $reporte->setFecha_de_reporte($row[1]);
            $reporte->setCod_usuario($row[2]);
            $reporte->setCod_cliente_partner($row[3]);
            $reporte->setDescripcion_actividad($row[4]);
            $reporte->setHoras_trabajadas($row[5]);
            $reporte->setLugar_de_trabajo($row[6]);
            $reporte->setHora_de_registro($row[7]);
            $reporte->setCod_sub_cliente_partner($row[8]);
            $reporte->setCod_no_ticket($row[9]);
            $reporte->setCod_pep_cliente($row[10]);
            $reporte->setCod_sub_mod_sap($row[11]);
            $reporte->setCod_mod_sap($row[12]);
            array_push($reportes, $reporte);
            
        }
        return $reportes;
    }

    /**
     * Method to get an ReporteDAO object
     *
     * @param Object $conexion
     * @return ReporteDAO
     */
    public function getListPorMesSeptiembre()
    {

        $sql = "SELECT * FROM REPORTE WHERE EXTRACT(MONTH from fecha_de_reporte)=9 order by fecha_de_reporte desc";
        $reportes = array();

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        while ($row = pg_fetch_array($resultado)) {
            $reporte = new Reporte();
            $reporte->setCod_reporte($row[0]);
            $reporte->setFecha_de_reporte($row[1]);
            $reporte->setCod_usuario($row[2]);
            $reporte->setCod_cliente_partner($row[3]);
            $reporte->setDescripcion_actividad($row[4]);
            $reporte->setHoras_trabajadas($row[5]);
            $reporte->setLugar_de_trabajo($row[6]);
            $reporte->setHora_de_registro($row[7]);
            $reporte->setCod_sub_cliente_partner($row[8]);
            $reporte->setCod_no_ticket($row[9]);
            $reporte->setCod_pep_cliente($row[10]);
            $reporte->setCod_sub_mod_sap($row[11]);
            $reporte->setCod_mod_sap($row[12]);
            array_push($reportes, $reporte);
            
        }
        return $reportes;
    }

    /**
     * Method to get an ReporteDAO object
     *
     * @param Object $conexion
     * @return ReporteDAO
     */
    public function getListPorMesOctubre()
    {

        $sql = "SELECT * FROM REPORTE WHERE EXTRACT(MONTH from fecha_de_reporte)=10 order by fecha_de_reporte desc";
        $reportes = array();

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        while ($row = pg_fetch_array($resultado)) {
            $reporte = new Reporte();
            $reporte->setCod_reporte($row[0]);
            $reporte->setFecha_de_reporte($row[1]);
            $reporte->setCod_usuario($row[2]);
            $reporte->setCod_cliente_partner($row[3]);
            $reporte->setDescripcion_actividad($row[4]);
            $reporte->setHoras_trabajadas($row[5]);
            $reporte->setLugar_de_trabajo($row[6]);
            $reporte->setHora_de_registro($row[7]);
            $reporte->setCod_sub_cliente_partner($row[8]);
            $reporte->setCod_no_ticket($row[9]);
            $reporte->setCod_pep_cliente($row[10]);
            $reporte->setCod_sub_mod_sap($row[11]);
            $reporte->setCod_mod_sap($row[12]);
            array_push($reportes, $reporte);
            
        }
        return $reportes;
    }

    /**
     * Method to get an ReporteDAO object
     *
     * @param Object $conexion
     * @return ReporteDAO
     */
    public function getListPorMesNoviembre()
    {

        $sql = "SELECT * FROM REPORTE WHERE EXTRACT(MONTH from fecha_de_reporte)=11 order by fecha_de_reporte desc";
        $reportes = array();

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        while ($row = pg_fetch_array($resultado)) {
            $reporte = new Reporte();
            $reporte->setCod_reporte($row[0]);
            $reporte->setFecha_de_reporte($row[1]);
            $reporte->setCod_usuario($row[2]);
            $reporte->setCod_cliente_partner($row[3]);
            $reporte->setDescripcion_actividad($row[4]);
            $reporte->setHoras_trabajadas($row[5]);
            $reporte->setLugar_de_trabajo($row[6]);
            $reporte->setHora_de_registro($row[7]);
            $reporte->setCod_sub_cliente_partner($row[8]);
            $reporte->setCod_no_ticket($row[9]);
            $reporte->setCod_pep_cliente($row[10]);
            $reporte->setCod_sub_mod_sap($row[11]);
            $reporte->setCod_mod_sap($row[12]);
            array_push($reportes, $reporte);
            
        }
        return $reportes;
    }

    /**
     * Method to get an ReporteDAO object
     *
     * @param Object $conexion
     * @return ReporteDAO
     */
    public function getListPorMesDiciembre()
    {

        $sql = "SELECT * FROM REPORTE WHERE EXTRACT(MONTH from fecha_de_reporte)=12 order by fecha_de_reporte desc";
        $reportes = array();

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        while ($row = pg_fetch_array($resultado)) {
            $reporte = new Reporte();
            $reporte->setCod_reporte($row[0]);
            $reporte->setFecha_de_reporte($row[1]);
            $reporte->setCod_usuario($row[2]);
            $reporte->setCod_cliente_partner($row[3]);
            $reporte->setDescripcion_actividad($row[4]);
            $reporte->setHoras_trabajadas($row[5]);
            $reporte->setLugar_de_trabajo($row[6]);
            $reporte->setHora_de_registro($row[7]);
            $reporte->setCod_sub_cliente_partner($row[8]);
            $reporte->setCod_no_ticket($row[9]);
            $reporte->setCod_pep_cliente($row[10]);
            $reporte->setCod_sub_mod_sap($row[11]);
            $reporte->setCod_mod_sap($row[12]);
            array_push($reportes, $reporte);
            
        }
        return $reportes;
    }


    /**
     * Method to get an ReporteDAO object
     *
     * @param Object $conexion
     * @return ReporteDAO
     */
    public function getListByUser($cod_usuario)
    {

        $sql = "SELECT * FROM REPORTE WHERE COD_USUARIO = " .$cod_usuario. " order by fecha_de_reporte desc;";
        $reportes = array();
        if (!$resultado = pg_query($this->conexion, $sql)) die();

        while ($row = pg_fetch_array($resultado)) {
            $reporte = new Reporte();
            $reporte->setCod_reporte($row[0]);
            $reporte->setFecha_de_reporte($row[1]);
            $reporte->setCod_usuario($row[2]);
            $reporte->setCod_cliente_partner($row[3]);
            $reporte->setDescripcion_actividad($row[4]);
            $reporte->setHoras_trabajadas($row[5]);
            $reporte->setLugar_de_trabajo($row[6]);
            $reporte->setHora_de_registro($row[7]);
            $reporte->setCod_sub_cliente_partner($row[8]);
            $reporte->setCod_no_ticket($row[9]);
            $reporte->setCod_pep_cliente($row[10]);
            $reporte->setCod_sub_mod_sap($row[11]);
            $reporte->setCod_mod_sap($row[12]);
            $reportes[] = $reporte;
        }
        return $reportes;
    }

    /**
     * Method to get an ReporteDAO object
     *
     * @param Object $conexion
     * @return ReporteDAO
     */
    public function getListReporteMensual($cod_usuario)
    {

        $sql = "SELECT EXTRACT(MONTH from FECHA_DE_REPORTE), sum(HORAS_TRABAJADAS) FROM REPORTE WHERE COD_USUARIO = " .$cod_usuario. " group by EXTRACT(MONTH from FECHA_DE_REPORTE);";
        $reportes = array();
        if (!$resultado = pg_query($this->conexion, $sql)) die();

        while ($row = pg_fetch_array($resultado)) {
            $reporte = new Reporte();
            $reporte->setFecha_de_reporte($row[0]);
            $reporte->setHoras_trabajadas($row[1]);
            $reportes[] = $reporte;
        }
        return $reportes;
    }


    /**
     * Gets the object of this class. In case it is null, create it
     *
     * @param Object $conexion
     * @return ReporteDAO
     */
    public static function getReporteDAO($conexion)
    {
        if (self::$reporteDAO == null) {
            self::$reporteDAO = new ReporteDAO($conexion);
        }

        return self::$reporteDAO;
    }

}
?>