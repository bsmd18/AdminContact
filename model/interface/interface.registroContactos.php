<?php

/*
 * Interface para la tabla registro de personal.
 */
interface IregistroContactos {
/*
 * Metodo para seleccionar todos los datos de la tabla
 */
  public function select();
  /**
   * Metodo para seleccionar un registro por un id
   * 
   * @param Integer $id
   */

  public function selectById($id);
  /**
   * Metodo para insertar el registro de una persona 
   * @param registroPersonal $rePersonal
   */

  public function insert(registroContactos $reContactos);

  /**
   * Metodo para actualizar registro por el  id.
   * @param registroPersonal $rePersonal
   */
  public function update(registroContactos $reContactos);
/**
 * Metodo para el borrado de un registro del personal.
 * @param type $id
 */
  public function delete($id);
}
