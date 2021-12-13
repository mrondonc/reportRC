<?php

require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Auditoria_reporte.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/DAO.php';

/**
 * 
 *Represents the DAO of the Auditoria reporte entity
 *
 */
class Auditoria_reporteDAO implements DAO
{

    /**
     * Reference to the connection with the database
     * @var Object
     */
    private $conexion;

    /**
     * Reference to an Auditoria_reporteDAO object
     * @var auditoria_reporteDAO
     */
    private static $auditoria_reporteDAO;

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
     * Method to query an auditoria reporte by his code type
     *
     * @param int $cod_reporte
     * @return Auditoria_reporte
     */
    public function consult($cod_reporte)
    {
        
        $sql = "SELECT * FROM AUDITORIA_REPORTE WHERE cod_reporte = " . $cod_reporte;

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        $row = pg_fetch_array($resultado);

        $auditoria_reporte = new Auditoria_reporte();

        $auditoria_reporte->setCod_reporte($row[0]);
        $auditoria_reporte->setFecha_de_reporte_vieja($row[1]);
        $auditoria_reporte->setFecha_de_reporte_nueva($row[2]);
        $auditoria_reporte->setCod_usuario($row[3]);
        $auditoria_reporte->setCod_cliente_partner($row[4]);
        $auditoria_reporte->setDescripcion_actvidad($row[5]);
        $auditoria_reporte->setHoras_trabajadas_vieja($row[6]);
        $auditoria_reporte->setHoras_trabajadas_nueva($row[7]);
        $auditoria_reporte->setLugar_de_trabajo($row[8]);
        $auditoria_reporte->setFecha_de_cambio($row[9]);
        $auditoria_reporte->setTipo_de_cambio($row[10]);

        return $auditoria_reporte;
    }


    /**
     * Method to create a new admin
     *
     * @param Auditoria_reporte $auditoria_reporte
     * @return void
     */
    public function create($auditoria_reporte)
    {
        $sql = "insert into AUDITORIA_REPORTE values (" . $auditoria_reporte->getCod_reporte() . ",
                                            " . $auditoria_reporte->getFecha_de_reporte_vieja() . ",
                                            " . $auditoria_reporte->getFecha_de_reporte_nueva() . ",
                                            " . $auditoria_reporte->getCod_usuario() . ",
                                            " . $auditoria_reporte->getCod_cliente_partner() . ",
                                            '" . $auditoria_reporte->getDescripcion_actvidad() . "',
                                            " . $auditoria_reporte->getHoras_trabajadas_vieja() . ",
                                            " . $auditoria_reporte->getHoras_trabajadas_nueva() . ",
                                            '" . $auditoria_reporte->getLugar_de_trabajo() . "',
                                            " . $auditoria_reporte->getFecha_de_cambio() . ",
                                            '" . $auditoria_reporte->getTipo_de_cambio() . "'
                                        );";

        pg_query($this->conexion, $sql);
    }

    /**
     * Method that modifies an auditoria reporte entered by parameter
     *
     * @param Auditoria_reporte $auditoria_reporte
     * @return void
     */
    public function modify($auditoria_reporte)
    {

        $sql = "UPDATE AUDITORIA_REPORTE SET cod_reporte = " . $auditoria_reporte->getCod_reporte() . ",
                                   fecha_de_reporte_vieja = " . $auditoria_reporte->getFecha_de_reporte_vieja() . ",
                                   fecha_de_reporte_nueva = " . $auditoria_reporte->getFecha_de_reporte_nueva() . ",
                                   cod_usuario = " . $auditoria_reporte->getCod_usuario() . ",
                                   cod_cliente_partner = " . $auditoria_reporte->getCod_cliente_partner() . ",
                                   descripcion_actividad = '" . $auditoria_reporte->getDescripcion_actividad() . "',
                                   horas_trabajadas_vieja = " . $auditoria_reporte->getHoras_trabajadas_vieja() . ",
                                   horas_trabajadas_nueva = " . $auditoria_reporte->getHoras_trabajadas_nueva() . ",
                                   lugar_de_trabajo = '" . $auditoria_reporte->getLugar_de_trabajo() . "',
                                   fecha_de_cambio = " . $auditoria_reporte->getFecha_de_cambio() . ",
                                   tipo_de_cambio = '" . $auditoria_reporte->getTipo_de_cambio() . "',
                                   where cod_reporte = " . $auditoria_reporte->getCod_reporte() . "
                                ;";
        pg_query($this->conexion, $sql);
    }

    /**
     * Method to delete a auditoria reporte
     *
     * @param Auditoria_reporte $auditoria_reporte
     * @return void
     */

    public function delete($cod_reporte)
    {
        $sql = "DELETE FROM AUDITORIA_REPORTE WHERE cod_reporte = " . $cod_reporte;

        pg_query($this->conexion, $sql);
    }

    /**
     * Method to get an Auditoria_reporteDAO object
     *
     * @param Object $conexion
     * @return Auditoria_reporteDAO
     */
    public function getList()
    {

        $sql = "SELECT * FROM AUDITORIA_REPORTE";

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        $auditoria_reporte = array();

        while ($row = pg_fetch_array($resultado)) {
            $auditoria_reporte->setCod_reporte($row[0]);
            $auditoria_reporte->setFecha_de_reporte_vieja($row[1]);
            $auditoria_reporte->setFecha_de_reporte_nueva($row[2]);
            $auditoria_reporte->setCod_usuario($row[3]);
            $auditoria_reporte->setCod_cliente_partner($row[4]);
            $auditoria_reporte->setDescripcion_actvidad($row[5]);
            $auditoria_reporte->setHoras_trabajadas_vieja($row[6]);
            $auditoria_reporte->setHoras_trabajadas_nueva($row[7]);
            $auditoria_reporte->setLugar_de_trabajo($row[8]);
            $auditoria_reporte->setFecha_de_cambio($row[9]);
            $auditoria_reporte->setTipo_de_cambio($row[10]);

            $auditoria_reportes[] = $auditoria_reporte;
        }
        return $auditoria_reportes;
    }


    /**
     * Gets the object of this class. In case it is null, create it
     *
     * @param Object $conexion
     * @return Auditoria_reporteDAO
     */
    public static function getAuditoria_reporteDAO($conexion)
    {
        if (self::$auditoria_reporteDAO == null) {
            self::$auditoria_reporteDAO = new Auditoria_reporteDAO($conexion);
        }

        return self::$auditoria_reporteDAO;
    }

}
?>