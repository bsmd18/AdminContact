<?php

class proyectos{
  private $pro_codigo;
  private $pro_nombre;
  private $pro_descripcion;
  private $pro_fecha_inicio;
  private $pro_fecha_final;
  private $pro_tipo;
  private $pro_valor;
  private $pro_estado;
  function getPro_codigo() {
    return $this->pro_codigo;
  }

  function getPro_nombre() {
    return $this->pro_nombre;
  }

  function getPro_descripcion() {
    return $this->pro_descripcion;
  }

  function getPro_fecha_inicio() {
    return $this->pro_fecha_inicio;
  }

  function getPro_fecha_final() {
    return $this->pro_fecha_final;
  }

  function getPro_tipo() {
    return $this->pro_tipo;
  }

  function getPro_valor() {
    return $this->pro_valor;
  }

  function getPro_estado() {
    return $this->pro_estado;
  }

  function setPro_codigo($pro_codigo) {
    $this->pro_codigo = $pro_codigo;
  }

  function setPro_nombre($pro_nombre) {
    $this->pro_nombre = $pro_nombre;
  }

  function setPro_descripcion($pro_descripcion) {
    $this->pro_descripcion = $pro_descripcion;
  }

  function setPro_fecha_inicio($pro_fecha_inicio) {
    $this->pro_fecha_inicio = $pro_fecha_inicio;
  }

  function setPro_fecha_final($pro_fecha_final) {
    $this->pro_fecha_final = $pro_fecha_final;
  }

  function setPro_tipo($pro_tipo) {
    $this->pro_tipo = $pro_tipo;
  }

  function setPro_valor($pro_valor) {
    $this->pro_valor = $pro_valor;
  }

  function setPro_estado($pro_estado) {
    $this->pro_estado = $pro_estado;
  }


}

