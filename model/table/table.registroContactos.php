<?php

/**
 * Manager Class de la tabla registro del personal
 */
class registroContactos {

  
  private $id;

  /**
   * Llave Principal y campo autoincrementable de la tabla Registro del Personal
   * @var Integer 
   */
  private $foto;

  /**
   * Registro de entrada segun la fecha y hora del momento.
   * @var string 
   */
  private $nombre;

  /**
   * Registro de salida segun la fecha y hora del momento.
   * @var string 
   */
  private $apellido;

  private $edad;
  /**
   * Obtiene el ID del registro
   * @return Integer
   */
  
  function getId(): Integer {
    return $this->id;
  }

  function getFoto(): string {
    return $this->foto;
  }

  function getNombre() {
    return $this->nombre;
  }

  function getApellido() {
    return $this->apellido;
  }

  function getEdad() {
    return $this->edad;
  }

  function setId(Integer $id) {
    $this->id = $id;
  }

  function setFoto(string $foto) {
    $this->foto = $foto;
  }

  function setNombre($nombre) {
    $this->nombre = $nombre;
  }

  function setApellido($apellido) {
    $this->apellido = $apellido;
  }

  function setEdad($edad) {
    $this->edad = $edad;
  }


  
}
