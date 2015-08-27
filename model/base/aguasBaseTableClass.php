<?php

use mvc\model\table\tableBaseClass;

/**
 * Description of ingresoCanaBaseTableClass
 *
* @author Cristian Ramirez <ccristianramirezc@gmail.com>
 */
class aguasBaseTableClass extends tableBaseClass {

  private $id;
  private $procedencia;
  private $arrastre_dulce;
  private $ph;
  private $cloro_residual;
  private $control_id;
  private $hora;

  const ID = 'id';
  const PROCEDENCIA = 'procedencia';
  const PROCEDENCIA_LENGTH = 35;
  const ARRASTRE_DULCE = 'arrastre_dulce';
  const ARRASTRE_DULCE_LENGTH = 35;
  const PH = 'ph';
  const PH_LENGTH = 20;
  const CLORO_RESIDUAL = 'cloro_residual'; 
  const CONTROL_ID = 'control_id';
  const HORA = 'hora';

  function getId() {
      return $this->id;
  }

  function getProcedencia() {
      return $this->procedencia;
  }

  function getArrastre_dulce() {
      return $this->arrastre_dulce;
  }

  function getPh() {
      return $this->ph;
  }

  function getCloro_residual() {
      return $this->cloro_residual;
  }

  function getControl_id() {
      return $this->control_id;
  }

  function getHora() {
      return $this->hora;
  }

  function setId($id) {
      $this->id = $id;
  }

  function setProcedencia($procedencia) {
      $this->procedencia = $procedencia;
  }

  function setArrastre_dulce($arrastre_dulce) {
      $this->arrastre_dulce = $arrastre_dulce;
  }

  function setPh($ph) {
      $this->ph = $ph;
  }

  function setCloro_residual($cloro_residual) {
      $this->cloro_residual = $cloro_residual;
  }

  function setControl_id($control_id) {
      $this->control_id = $control_id;
  }

  function setHora($hora) {
      $this->hora = $hora;
  }

        
  /**
   * Obtiene el nombre de la tabla
   * @return string
   */
  public static function getNameTable() {
    return 'aguas';
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
