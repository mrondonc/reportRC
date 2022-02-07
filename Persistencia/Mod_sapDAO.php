<?php

require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Mod_sap.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/DAO.php';

/**
 * 
 *Represents the DAO of the modulo sap entity
 *
 */
class Mod_sapDAO implements DAO
{

    /**
     * Reference to the connection with the database
     * @var Object
     */
    private $conexion;

    /**
     * Reference to an mod_sapDAO object
     * @var mod_sapDAO
     */
    private static $mod_sapDAO;

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
     * Method to query an modulo sap by his code type
     *
     * @param int $cod_mod_sap
     * @return Mod_sap
     */
    public function consult($cod_mod_sap)
    {
        
        $sql = "SELECT * FROM MOD_SAP WHERE cod_mod_sap = " . $cod_mod_sap;

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        $row = pg_fetch_array($resultado);

        $mod_sap = new Mod_sap();

        $mod_sap->setCod_mod_sap($row[0]);
        $mod_sap->setNombre_mod_sap($row[1]);
        $mod_sap->setCod_estado_actual($row[2]);

        return $mod_sap;
    }


    /**
     * Method to create a new mod_sap
     *
     * @param Mod_sap $mod_sap
     * @return void
     */
    public function create($mod_sap)
    {
        $sql = "insert into MOD_SAP (nombre_mod_sap, cod_estado_actual) values ('" . $mod_sap->getNombre_mod_sap() . "', " . $mod_sap->getCod_estado_actual() . "
                                        );";

        pg_query($this->conexion, $sql);
    }

    /**
     * Method that modifies an modulo sap entered by parameter
     *
     * @param Mod_sap $mod_sap
     * @return void
     */
    public function modify($mod_sap)
    {

        $sql = "UPDATE MOD_SAP SET cod_mod_sap = " . $mod_sap->getCod_mod_sap() . ",
                                   nombre_mod_sap = " . $mod_sap->getNombre_mod_sap() . ",
                                   cod_estado_actual = " . $mod_sap->getCod_estado_actual() . "
                                   where cod_mod_sap = " . $mod_sap->getCod_mod_sap() . "
                                ;";
        pg_query($this->conexion, $sql);
    }

    /**
     * Method to delete a modulo sap
     *
     * @param Mod_sap $mod_sap
     * @return void
     */

    public function delete($cod_mod_sap)
    {
        $sql = "DELETE FROM MOD_SAP WHERE cod_mod_sap = " . $cod_mod_sap;

        pg_query($this->conexion, $sql);
    }

    /**
     * Method to get an Mod_sapDAO object
     *
     * @param Object $conexion
     * @return Mod_sapDAO
     */
    public function getList()
    {

        $sql = "SELECT * FROM MOD_SAP order by nombre_mod_sap asc";
        $mod_saps = array();
        if (!$resultado = pg_query($this->conexion, $sql)) die();

        while ($row = pg_fetch_array($resultado)) {
            $mod_sap = new Mod_sap();
            $mod_sap->setCod_mod_sap($row[0]);
            $mod_sap->setNombre_mod_sap($row[1]);
            $mod_sap->setCod_estado_actual($row[2]);
            array_push($mod_saps, $mod_sap);
        }
        return $mod_saps;
    }


    /**
     * Gets the object of this class. In case it is null, create it
     *
     * @param Object $conexion
     * @return Mod_sapDAO
     */
    public static function getMod_sapDAO($conexion)
    {
        if (self::$mod_sapDAO == null) {
            self::$mod_sapDAO = new Mod_sapDAO($conexion);
        }

        return self::$mod_sapDAO;
    }

}
?>