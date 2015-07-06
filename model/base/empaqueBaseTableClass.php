<?php

use mvc\model\table\tableBaseClass;

/**
 * Description of Empaque
 *
 * @author Carlos Barrera <cabarrera22@misena.edu.co>
 */
class empaqueBaseTableClass extends tableBaseClass {

    private $id;
    private $fecha;
    private $empleado_id;
    private $tipo_empaque_id;
    private $cantidad;
    private $insumo_id;

    const ID = 'id';
    const FECHA = 'fecha';
    const EMPLEADO_ID = 'empleado_id';
    const TIPO_EMPAQUE_ID = 'tipo_empaque_id';
    const CANTIDAD = 'cantidad';
    const CANTIDAD_LEGTH = 20;
    const INSUMO_ID = 'insumo_id';

    function getId() {
        return $this->id;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getEmpleado_id() {
        return $this->empleado_id;
    }

    function getTipo_empaque_id() {
        return $this->tipo_empaque_id;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function getInsumo_id() {
        return $this->insumo_id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setEmpleado_id($empleado_id) {
        $this->empleado_id = $empleado_id;
    }

    function setTipo_empaque_id($tipo_empaque_id) {
        $this->tipo_empaque_id = $tipo_empaque_id;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    function setInsumo_id($insumo_id) {
        $this->insumo_id = $insumo_id;
    }

    
    /**
     * Obtiene el nombre de la tabla
     * @return string
     */
    static public function getNameTable() {
        return 'empaque';
    }

    /**
     * Método para borrar un registro de una tabla X en la base de datos
     *
     * @param array $ids Array con los campos por posiciones
     * asociativas y los valores por valores a tener en cuenta para el borrado.
     * Ejemplo $fieldsAndValues['id'] = 1
     * @param boolean $deletedLogical [optional] Borrado lógico [por defecto] o
     * borrado físico de un registro en una tabla de la base de datos
     * @return PDOException|boolean
     */
    public static function getNameField($field, $html = false, $table = null) {
        return parent::getNameField($field, self::getNameTable(), $html);
    }

    public static function delete($ids, $deletedLogical = true, $table = null) {
        return parent::delete($ids, $deletedLogical, self::getNameTable());
    }

    /**
     * Método para insertar en una tabla usuario
     *
     * @param array $data Array asociativo donde las claves son los nombres de
     * los campos y su valor sería el valor a insertar. Ejemplo:
     * $data['nombre'] = 'Erika'; $data['apellido'] = 'Galindo';
     * @return PDOException|boolean
     */
    public static function insert($data, $table = null) {
        return parent::insert(self::getNameTable(), $data);
    }

    /**
     * Método para leer todos los registros de una tabla
     *
     * @param array $fields Array con los nombres de los campos a solicitar
     * @param boolean $deletedLogical [optional] Indicación de borrado lógico
     * o borrado físico
     * @param array $orderBy [optional] Array con el o los nombres de los campos
     * por los cuales se ordenará la consulta
     * @param string $order [optional] Forma de ordenar la consulta
     * (por defecto NULL), pude ser ASC o DESC
     * @param integer $limit [optional] Cantidad de resultados a mostrar
     * @param integer $offset [optional] Página solicitadad sobre la cantidad
     * de datos a mostrar
     * @return mixed una instancia de una clase estandar, la cual tendrá como
     * variables publica los nombres de las columnas de la consulta o una
     * instancia de \PDOException en caso de fracaso.
     */
    public static function getAll($fields, $deletedLogical = null, $orderBy = null, $order = null, $limit = null, $offset = null, $where = null, $table = null) {
        return parent::getAll(self::getNameTable(), $fields, $deletedLogical, $orderBy, $order, $limit, $offset, $where);
    }

    /**
     * Método para actualizar un registro en una tabla de una base de datos
     *
     * @param array $ids Array asociativo con las posiciones por nombres de los
     * campos y los valores son quienes serían las llaves a buscar.
     * @param array $data Array asociativo con los datos a modificar,
     * las posiciones por nombres de las columnas con los valores por los nuevos
     * datos a escribir
     * @return PDOException|boolean
     */
    public static function update($ids, $data, $table = null) {
        return parent::update($ids, $data, self::getNameTable());
    }

}
