<?php

class usuarioDAOExt extends usuarioDAO {

  public function search($correo, $clave) {
    $sql = 'SELECT rol_id, usu_codigo, usu_correo FROM usuarios WHERE usu_correo = :correo AND usu_clave = :clave';
    $params = array(
        ':correo' => $correo,
        ':clave' => $clave
    );
    
    return $this->query($sql, $params);
  }

}
