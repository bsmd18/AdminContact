<?php

/**
 * conjunto de funciones para la tabla ces_usuario
 */
class usuarioDAO extends dataSource implements IUsuario {

  public function delete($id, $logico = true) {

    if ($logico === true) {
      $sql = 'UPDATE FROM usuario SET usu_deleted_at = now() WHERE usu_id = :id';
    } else {
      $sql = 'DELETE FROM usuario WHERE usu_id = :id';
    }

    $params = array(
        ':id' => $id
    );
    return $this->execute($sql, $params);
  }

  /**
   * funcion para insertar nuevo usuario
   * @param \usuario $usuario
   * @return integer
   */
  public function insert(\usuario $usuario) {
    $sql = 'INSERT INTO usuario (usu_usuario, usu_contrasena, rol_id, usu_created_at) VALUES (:user, :pass, :rol_id, now())';
    $params = array(
        ':user' => $usuario->getUsuario(),
        ':pass' => $usuario->getContrasena(),
        ':rol_id' => $usuario->getRol_id(),
    );
    return $this->execute($sql, $params);
  }

  /**
   * funcion para seleccionar todos los usuarios
   * @return array of stdClass
   */
  public function select() {
    $sql = 'SELECT usu_id, usu_usuario, usu_contrasena, rol_id FROM usuario';
    return $this->query($sql);
  }

  /**
   * funcion para seleccionar uduarios por id
   * @param type $id
   * @return array of stdClass
   */
  public function selectById($id) {
    $sql = 'SELECT usu_usuario, usu_contrasena, rol_id FROM usuario WHERE usu_id = :id';
    $params = array(
        ':id' => $id
    );
    return $this->query($sql, $params);
  }

  /**
   * funcion para actulizar usuarios
   * @param \usuario $usuario
   * @return integer
   */
  public function update(\usuario $usuario) {
    $sql = 'UPDATE usuario SET usu_contrasena = :pass WHERE usu_id = :id';
    $params = array(
        ':contrasena' => $usuario->getContrasena(),
        ':pass' => $usuario->getContrasena(),
        ':id' => $usuario->getId()
    );
    return $this->execute($sql, $params);
  }

}
