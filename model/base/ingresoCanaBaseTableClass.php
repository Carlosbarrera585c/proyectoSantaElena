<?php

use mvc\model\table\tableBaseClass;

/**
 * Description of ingresoCanaBaseTableClass
 *
 * @author Bayron Henao <baironhenao82@gmail.com>
 */
class ingresoCanaBaseTableClass extends tableBaseClass {

  private $id;
  private $fecha;
  private $empleado_id;
  private $proveedor_id;
  private $cantidad;
  private $peso_caña;
  private $peso_caña2;
  private $peso_caña3;
  private $peso_caña4;
  private $peso_caña5;
  private $num_vagon;
  private $num_vagon2;
  private $num_vagon3;
  private $num_vagon4;
  private $num_vagon6;
  private $variedad;
  private $total;

  const ID = 'id';
  const FECHA = 'fecha';
  const FECHA_LENGTH = 35;
  const EMPLEADO_ID = 'empleado_id';
  const PROVEEDOR_ID = 'proveedor_id';
  const CANTIDAD = 'cantidad';
  const CANTIDAD_LENGTH = 30;
  const PESO_CAÑA = 'peso_caña';
  const PESO_CAÑA_LENGTH = 30;
  const PESO_CAÑA2 = 'peso_caña2';
  const PESO_CAÑA2_LENGTH = 30;
  const PESO_CAÑA3 = 'peso_caña3';
  const PESO_CAÑA3_LENGTH = 30;
  const PESO_CAÑA4 = 'peso_caña4';
  const PESO_CAÑA4_LENGTH = 30;
  const PESO_CAÑA5 = 'peso_caña5';
  const PESO_CAÑA5_LENGTH = 30;
  const NUM_VAGON = 'num_vagon';
  const NUM_VAGON_LENGTH = 30;
  const NUM_VAGON2 = 'num_vagon2';
  const NUM_VAGON2_LENGTH = 30;
  const NUM_VAGON3 = 'num_vagon3';
  const NUM_VAGON3_LENGTH = 30;
  const NUM_VAGON4 = 'num_vagon4';
  const NUM_VAGON4_LENGTH = 30;
  const NUM_VAGON5 = 'num_vagon5';
  const NUM_VAGON5_LENGTH = 30;
  const VARIEDAD = 'variedad';
  const VARIEDAD_LENGTH = 30;
  const TOTAL = 'total';
  const TOTAL_LENGHT = 10;
  
  function getId() {
	return $this->id;
  }

  function getFecha() {
	return $this->fecha;
  }

  function getEmpleado_id() {
	return $this->empleado_id;
  }

  function getProveedor_id() {
	return $this->proveedor_id;
  }

  function getCantidad() {
	return $this->cantidad;
  }

  function getPeso_caña() {
	return $this->peso_caña;
  }

  function getPeso_caña2() {
	return $this->peso_caña2;
  }

  function getPeso_caña3() {
	return $this->peso_caña3;
  }

  function getPeso_caña4() {
	return $this->peso_caña4;
  }

  function getPeso_caña5() {
	return $this->peso_caña5;
  }

  function getNum_vagon() {
	return $this->num_vagon;
  }

  function getNum_vagon2() {
	return $this->num_vagon2;
  }

  function getNum_vagon3() {
	return $this->num_vagon3;
  }

  function getNum_vagon4() {
	return $this->num_vagon4;
  }

  function getNum_vagon6() {
	return $this->num_vagon6;
  }

  function getVariedad() {
	return $this->variedad;
  }

  function getTotal() {
	return $this->total;
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

  function setProveedor_id($proveedor_id) {
	$this->proveedor_id = $proveedor_id;
  }

  function setCantidad($cantidad) {
	$this->cantidad = $cantidad;
  }

  function setPeso_caña($peso_caña) {
	$this->peso_caña = $peso_caña;
  }

  function setPeso_caña2($peso_caña2) {
	$this->peso_caña2 = $peso_caña2;
  }

  function setPeso_caña3($peso_caña3) {
	$this->peso_caña3 = $peso_caña3;
  }

  function setPeso_caña4($peso_caña4) {
	$this->peso_caña4 = $peso_caña4;
  }

  function setPeso_caña5($peso_caña5) {
	$this->peso_caña5 = $peso_caña5;
  }

  function setNum_vagon($num_vagon) {
	$this->num_vagon = $num_vagon;
  }

  function setNum_vagon2($num_vagon2) {
	$this->num_vagon2 = $num_vagon2;
  }

  function setNum_vagon3($num_vagon3) {
	$this->num_vagon3 = $num_vagon3;
  }

  function setNum_vagon4($num_vagon4) {
	$this->num_vagon4 = $num_vagon4;
  }

  function setNum_vagon6($num_vagon6) {
	$this->num_vagon6 = $num_vagon6;
  }

  function setVariedad($variedad) {
	$this->variedad = $variedad;
  }

  function setTotal($total) {
	$this->total = $total;
  }

  
  
  
  /**
   * Obtiene el nombre de la tabla
   * @return string
   */
  public static function getNameTable() {
	return 'ingreso_caña';
  }

  /**
   * Método para obtener el nombre del campo más la tabla ya sea en formato
   * DB (.) o en formato HTML (_)
   *
   * @param string $field Nombre del campo
   * @param string $html [optional] Por defecto traerá el nombre del campo en
   * versión DB
   * @return string
   */
  public static function getNameField($field, $html = false, $table = null) {
	return parent::getNameField($field, self::getNameTable(), $html);
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
  public static function delete($ids, $deletedLogical = false, $table = null) {
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
  public static function getAll($fields, $deletedLogical = false, $orderBy = null, $order = null, $limit = null, $offset = null, $where = null, $table = null) {
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
