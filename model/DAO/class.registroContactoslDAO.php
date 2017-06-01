<?php

/**
 * Manage class de los metodos principales de la tabla resgistro del personal
 */
class registroContactosDAO extends dataSource implements IregistroContactos {

  /**
   * Mètodo para el borrado de un registro.
   * @param Integer $id
   * @return Integer
   */
  public function delete($id) {
    $sql = 'DELETE FROM contacto WHERE con_id = :id';
    $params = array(
        ':id' => $id
    );
    return $this->execute($sql, $params);
  }

  /**
   * Metodo para insertar el registro de una persona en la BD.
   * @param \registroPersonal $rePersonal
   * @return Integer
   */
  public function insert(registroContactos $reContactos) {
    $sql = 'INSERT INTO contacto (con_foto,con_nombre,con_apellido,con_edad) VALUES (:foto,:nombre,:apellido,:edad)';
    $params = array(
        ':foto' => (string) $reContactos->getFoto(),
        ':nombre' => (string) $reContactos->getNombre(),
        ':apellido' => (string) $reContactos->getApellido(),
        ':edad' => (integer) $reContactos->getEdad()
    );
    return $this->execute($sql, $params);
  }

  /**
   * Metodo para seleccionar todos los registros de la tabla.
   * @return array of stdClass
   */
  public function select() {
    $sql = 'SELECT con_foto,con_nombre, con_apellido, con_edad FROM contacto';
    return $this->query($sql);
  }

  /**
   * Metodo para seleccionar un registro que se busca por id.
   * @param Integer $id
   * @return array of stdClass
   */
  public function selectById($id) {

    $sql = 'SELECT con_foto,con_nombre, con_apellido, con_edad FROM contacto WHERE con_id = :id';
    $params = array(
        ':id' => $id
    );
    return $this->query($sql, $params);
  }

  /**
   * Metodo para actualizar un registro de entrada y salida por id.
   * @param \registroPersonal $rePersonal
   * @return Integer
   */
  public function update(registroContactos $reContactos) {

    $sql = 'UPDATE con_foto,con_nombre, con_apellido, con_edad SET con_foto = :foto,con_nombre = :nombre, con_apellido = :apellido, con_edad = :edad WHERE con_id = :id';
    $params = array(
        ':id' => $id,
        ':foto' => $foto,
        ':nombre' => $nombre,
        ':apellido' => $apellido,
        ':edad' => $edad
    );
    return $this->execute($sql, $params);
  }

}
