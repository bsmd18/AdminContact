<?php

class proyectosDAO extends dataSource implements IProyectos {

  public function delete($pro_codigo) {
    $sql = 'DELETE FROM proyectos WHERE pro_codigo = :codigo';
    $params = array(
        ':codigo' => $pro_codigo
    );
    return $this->execute($sql, $params);
  }

  public function insert(\proyectos $proyectos) {
    $sql = 'INSERT INTO proyectos (pro_nombre,pro_descripcion,pro_fecha_inicio,pro_fecha_final,pro_tipo,pro_valor,pro_estado) VALUES (:nombre,:descripcion,:fecha_inicio,:fecha_final,:tipo,:valor,:estado)';
    $params = array(
        ':nombre' => $proyectos->getPro_nombre(),
        ':descripcion' => $proyectos->getPro_descripcion(),
        ':fecha_inicio' => $proyectos->getPro_fecha_inicio(),
        ':fecha_final' => $proyectos->getPro_fecha_final(),
        ':tipo' => $proyectos->getPro_tipo(),
        ':valor' => $proyectos->getPro_valor(),
        ':estado' => $proyectos->getPro_estado()
    );
    return $this->execute($sql, $params);
  }

  public function select() {
    $sql = 'SELECT pro_nombre,pro_descripcion, pro_fecha_inicio, pro_fecha_final,pro_tipo,pro_valor,pro_estado FROM proyectos';
    return $this->query($sql);
  }

  public function selectById($pro_codigo) {
    $sql = 'SELECT pro_nombre,pro_descripcion, pro_fecha_inicio, pro_fecha_final,pro_tipo,pro_valor,pro_estado FROM proyectos WHERE pro_codigo = :codigo';
    $params = array (
        ':codigo' => $pro_codigo
    );
    
    return $this->query($sql);
  }

  public function update(\proyectos $proyectos) {
    
  }

}
