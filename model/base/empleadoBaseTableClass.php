<?php

use mvc\model\table\tableBaseClass;

/**
 * Description of Empleado
 *
 * @author Carlos Barrera <cabarrera22@misena.edu.co>
 */
class empleadoBaseTableClass extends tableBaseClass {

  private $id;
  private $nom_empleado;
  private $apell_empleado;
  private $telefono;
  private $direccion;
  private $tipo_id_id;
  private $numero_identificacion;
  private $credencial_id;
  private $correo;

  const ID = 'id';
  const NOM_EMPLEADO = 'nom_empleado';
  const NOM_EMPLEADO_LENGTH = 50;
  const APELL_EMPLEADO = 'apell_empleado';
  const APELL_EMPLEADO_LENGTH = 50;
  const TELEFONO = 'telefono';
  const TELEFONO_LENGTH = 20;
  const DIRECCION = 'direccion';
  const DIRECCION_LENGTH = 30;
  const TIPO_ID_ID = 'tipo_id_id';
  const TIPO_ID_ID_LENGTH = 11;
  const NUMERO_IDENTIFICACION = 'numero_identificacion';
  const NUMERO_IDENTIFICACION_LENGTH = 15;
  const CREDENCIAL_ID = 'credencial_id';
  const CREDENCIAL_ID_LENGTH = 11;
  const CORREO = 'correo';
  const CORREO_LENGTH = 70;

  function getId() {
    return $this->id;
  }

  function getNom_empleado() {
    return $this->nom_empleado;
  }

  function getApell_empleado() {
    return $this->apell_empleado;
  }

  function getTelefono() {
    return $this->telefono;
  }

  function getDireccion() {
    return $this->direccion;
  }

  function getTipo_id_id() {
    return $this->tipo_id_id;
  }

  function getNumero_identificacion() {
    return $this->numero_identificacion;
  }

  function getCredencial_id() {
    return $this->credencial_id;
  }

  function getCorreo() {
    return $this->correo;
  }

  function setId($id) {
    $this->id = $id;
  }

  function setNom_empleado($nom_empleado) {
    $this->nom_empleado = $nom_empleado;
  }

  function setApell_empleado($apell_empleado) {
    $this->apell_empleado = $apell_empleado;
  }

  function setTelefono($telefono) {
    $this->telefono = $telefono;
  }

  function setDireccion($direccion) {
    $this->direccion = $direccion;
  }

  function setTipo_id_id($tipo_id_id) {
    $this->tipo_id_id = $tipo_id_id;
  }

  function setNumero_identificacion($numero_identificacion) {
    $this->numero_identificacion = $numero_identificacion;
  }

  function setCredencial_id($credencial_id) {
    $this->credencial_id = $credencial_id;
  }

  function setCorreo($correo) {
    $this->correo = $correo;
  }

  /**
   * Obtiene el nombre de la tabla
   * @return string
   */
  static public function getNameTable() {
    return 'empleado';
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
