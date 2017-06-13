<?php

/**
 * conjunto de funciones para la tabla ces_usuario
 */
class usuarioDAO extends dataSource implements IUsuario {

  public function delete($codigo) {

//    if ($logico === true) {
//      $sql = 'UPDATE FROM usuario SET usu_deleted_at = now() WHERE usu_id = :id';
//    } else {
      $sql = 'DELETE FROM usuarios WHERE usu_codigo = :codigo';
//    }

    $params = array(
        ':codigo' => $codigo
    );
    return $this->execute($sql, $params);
  }

  /**
   * funcion para insertar nuevo usuario
   * @param \usuario $usuario
   * @return integer
   */
  public function insert(\usuario $usuario) {
    $sql = 'INSERT INTO usuarios (usu_nombres, usu_apellidos, usu_correo, usu_clave, usu_razon_social, usu_cargo, usu_direccion, usu_ciudad, usu_pais, usu_departamento, usu_telefono, usu_fecha_registro, usu_pagina_web, usu_descripcion, usu_estado, rol_id) VALUES (:nombres, :apellidos, :correo, :clave, :razonsocial, :cargo, :direccion, :ciudad, :pais, :departamento, :telefono, :fecharegistro, :paginaweb, :descripcion, :estado, :rol)';
    $params = array(
        ':nombres' => $usuario->getUsuario(),
        ':apellidos' => $usuario->getContrasena(),
        ':correo' => $usuario->getCorreo(),
        ':clave' => $usuario->getClave(),
        ':razonsocial' => $usuario->getRazon_social(),
        ':cargo' => $usuario->getCargo(),
        ':direccion' => $usuario->getDireccion(),
        ':ciudad' => $usuario->getCiudad(),
        ':pais' => $usuario->getPais(),
        ':departamento' => $usuario->getDepartamento(),
        ':telefono' => $usuario->getTelefono(),
        ':fecharegistro' => $usuario->getFecha_registro(),
        ':paginaweb' => $usuario->getPagina_web(),
        ':descripcion' => $usuario->getDescripcion(),
        ':estado' => $usuario->getEstado(),
        ':rol' => $usuario->getRol()
    );
    return $this->execute($sql, $params);
  }

  /**
   * funcion para seleccionar todos los usuarios
   * @return array of stdClass
   */
  public function select() {
    $sql = 'SELECT usu_codigo, usu_nombres, usu_apellidos, usu_correo, usu_clave, usu_razon_social, usu_cargo, usu_direccion, usu_ciudad, usu_pais, usu_departamento, usu_telefono, usu_fecha_registro, usu_pagina_web, usu_descripcion, usu_estado, rol_id FROM usuarios';
    return $this->query($sql);
  }

  /**
   * funcion para seleccionar uduarios por id
   * @param type $id
   * @return array of stdClass
   */
  public function selectById($codigo) {
    $sql = 'SELECT usu_correo, usu_clave, rol_id FROM usuarios WHERE usu_codigo = :codigo';
    $params = array(
        ':codigo' => $codigo
    );
    return $this->query($sql, $params);
  }

  /**
   * funcion para actulizar usuarios
   * @param \usuario $usuario
   * @return integer
   */
  public function update(\usuario $usuario) {
    $sql = 'UPDATE usuarios SET usu_nombres = :nombres, usu_apellidos = :apellidos, usu_correo = :correo, usu_clave = :clave, usu_razon_social = :razonsocial, usu_cargo = :cargo, usu_direccion = :direccion, usu_ciudad = :ciudad, usu_pais = :pais, usu_departamento = :departamento, usu_telefono = :telefono, usu_fecha_registro = :fecharegistro, usu_pagina_web = :paginaweb, usu_descripcion = :descripcion, usu_estado = :estado, rol_id = :rol WHERE usu_codigo = :codigo';
    $params = array(
        ':nombres' => $usuario->getUsuario(),
        ':apellidos' => $usuario->getContrasena(),
        ':correo' => $usuario->getCorreo(),
        ':clave' => $usuario->getClave(),
        ':razonsocial' => $usuario->getRazon_social(),
        ':cargo' => $usuario->getCargo(),
        ':direccion' => $usuario->getDireccion(),
        ':ciudad' => $usuario->getCiudad(),
        ':pais' => $usuario->getPais(),
        ':departamento' => $usuario->getDepartamento(),
        ':telefono' => $usuario->getTelefono(),
        ':fecharegistro' => $usuario->getFecha_registro(),
        ':paginaweb' => $usuario->getPagina_web(),
        ':descripcion' => $usuario->getDescripcion(),
        ':estado' => $usuario->getEstado(),
        ':rol' => $usuario->getRol()
    );
    return $this->execute($sql, $params);
  }

}
