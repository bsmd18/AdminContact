<?php

class empresaDAOExt extends empresaDAO {

  public function selectEnterprise() {

    $sql = "SELECT e.emp_correo, e.emp_direccion, e.emp_estado, e.emp_fecha_registro, e.emp_logo, e.emp_nit, e.emp_pagina, e.emp_razon_comercial, e.emp_razon_social, e.emp_telefono, t.emt_nombre, t.emt_descripcion from empresas as e inner join empresatipos as t on e.emt_codigo = t.emt_codigo where e.emp_estado = 'Activo'";

    return $this->query($sql);
  }

}
