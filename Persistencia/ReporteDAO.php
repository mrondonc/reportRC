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
        $reporte->setDescripcion_actvidad($row[4]);
        $reporte->setHoras_trabajadas($row[5]);
        $reporte->setLugar_de_trabajo($row[6]);
        $reporte->setHora_de_registro($row[7]);

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
        $sql = "insert into REPORTE values (" . $reporte->getCod_reporte() . ",
                                            " . $reporte->getFecha_de_reporte() . ",
                                            " . $reporte->getCod_usuario() . ",
                                            " . $reporte->getCod_cliente_partner() . ",
                                            '" . $reporte->getDescripcion_actvidad() . "',
                                            " . $reporte->getHoras_trabajadas() . ",
                                            '" . $reporte->getLugar_de_trabajo() . "',
                                            " . $reporte->getHora_de_registro() . "
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
                                   fecha_de_reporte = " . $reporte->getFecha_de_reporte() . ",
                                   cod_usuario = " . $reporte->getCod_usuario() . ",
                                   cod_cliente_partner = " . $reporte->getCod_cliente_partner() . ",
                                   descripcion_actividad = '" . $reporte->getDescripcion_actividad() . "',
                                   horas_trabajadas = " . $reporte->getHoras_trabajadas() . ",
                                   lugar_de_trabajo = '" . $reporte->getLugar_de_trabajo() . "',
                                   hora_de_registro = " . $reporte->getHora_de_registro() . ",
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

        $sql = "SELECT * FROM REPORTE";

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        $reporte = array();

        while ($row = pg_fetch_array($resultado)) {
            $reporte->setCod_reporte($row[0]);
            $reporte->setFecha_de_reporte($row[1]);
            $reporte->setCod_usuario($row[2]);
            $reporte->setCod_cliente_partner($row[3]);
            $reporte->setDescripcion_actvidad($row[4]);
            $reporte->setHoras_trabajadas($row[5]);
            $reporte->setLugar_de_trabajo($row[6]);
            $reporte->setHora_de_registro($row[7]);

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