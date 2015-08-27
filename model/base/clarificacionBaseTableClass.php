<?php

use mvc\model\table\tableBaseClass;

/**
 * Description of Clarificacion
 *
 * @author Carlos Barrera <cabarrera22@misena.edu.co>
 */
class clarificacionBaseTableClass extends tableBaseClass {

  private $id;
  private $fecha;
  private $num_bache;
  private $turno;
  private $empleado_id;
  private $proveedor_id;
  private $brix;
  private $ph_diluido;
  private $ph_clarificado;
  private $cal_dosificada;
  private $floculante;

  const ID = 'id';
  const FECHA = 'fecha';
  const NUM_BACHE = 'num_bache';
  const NUM_BACHE_LENGTH = 11;
  const TURNO = 'turno';
  const TURNO_LENGTH = 7;
  const EMPLEADO_ID = 'empleado_id';
  const EMPLEADO_ID_LENGTH = 11;
  const PROVEEDOR_ID = 'proveedor_id';
  const PROVEEDOR_ID_LENGTH = 11;
  const BRIX = 'brix';
  const BRIX_LENGTH = 11;
  const PH_DILUIDO = 'ph_diluido';
  const PH_DILUIDO_LENGTH = 11;
  const PH_CLARIFICADO = 'ph_clarificado';
  const PH_CLARIFICADO_LENGTH = 11;
  const CAL_DOSIFICADA = 'cal_dosificada';
  const CAL_DOSIFICADA_LENGTH = 11;
  const FLOCULANTE = 'floculante';
  const FLOCULANTE_LENGTH = 11;

  function getId() {
    return $this->id;
  }

  function getFecha() {
    return $this->fecha;
  }

  function getNum_bache() {
    return $this->num_bache;
  }

  function getTurno() {
    return $this->turno;
  }

  function getEmpleado_id() {
    return $this->empleado_id;
  }

  function getProveedor_id() {
    return $this->proveedor_id;
  }

  function getBrix() {
    return $this->brix;
  }

  function getPh_diluido() {
    return $this->ph_diluido;
  }

  function getPh_clarificado() {
    return $this->ph_clarificado;
  }

  function getCal_dosificada() {
    return $this->cal_dosificada;
  }

  function getFloculante() {
    return $this->floculante;
  }

  function setId($id) {
    $this->id = $id;
  }

  function setFecha($fecha) {
    $this->fecha = $fecha;
  }

  function setNum_bache($num_bache) {
    $this->num_bache = $num_bache;
  }

  function setTurno($turno) {
    $this->turno = $turno;
  }

  function setEmpleado_id($empleado_id) {
    $this->empleado_id = $empleado_id;
  }

  function setProveedor_id($proveedor_id) {
    $this->proveedor_id = $proveedor_id;
  }

  function setBrix($brix) {
    $this->brix = $brix;
  }

  function setPh_diluido($ph_diluido) {
    $this->ph_diluido = $ph_diluido;
  }

  function setPh_clarificado($ph_clarificado) {
    $this->ph_clarificado = $ph_clarificado;
  }

  function setCal_dosificada($cal_dosificada) {
    $this->cal_dosificada = $cal_dosificada;
  }

  function setFloculante($floculante) {
    $this->floculante = $floculante;
  }

    
  /**
   * Obtiene el nombre de la tabla
   * @return string
   */
  static public function getNameTable() {
    return 'clarificacion';
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
