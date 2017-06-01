<?php

class usuario {

  /**
   * Llave Principal y campo autoincrementable de la tabla Usuario	
   * @var integer 
   */
  private $id;

  /**
   * Nombre del usuario con el cual se hara el ingreso al aplicativo
   * @var string 
   */
  private $usuario;

  /**
   * Se utliza para el ingreso a la aplicación y verificar el usuario		
   * @var string
   */
  private $contrasena;

  /**
   * se divide en 2 (admin-Invitado) el admin puede agregar los invitados y controlar la base de datos, el invitado solo puede controlar la aplicación	
   * @var integer
   */
  private $rol_id;

  /**
   * se utiliza para saber cuando se creo el usuario	
   * @var string 
   */
  private $created_at;

  /**
   * se utiliza para saber cuando se hace un update en el usuario	
   * @var string 
   */
  private $updated_at;

  /**
   * se utiliza para saber cuando se elimina el usuario	
   * @var string
   */
  private $deleted_at;

  function getId() {
    return $this->id;
  }

  function getUsuario() {
    return $this->usuario;
  }

  function getContrasena() {
    return $this->contrasena;
  }

  function getRol_id() {
    return $this->rol_id;
  }

  function getCreated_at() {
    return $this->created_at;
  }

  function getUpdated_at() {
    return $this->updated_at;
  }

  function getDeleted_at() {
    return $this->deleted_at;
  }

  function setId($id) {
    $this->id = $id;
  }

  function setUsuario($usuario) {
    $this->usuario = $usuario;
  }

  function setContrasena($contrasena) {
    $this->contrasena = $contrasena;
  }

  function setRol_id($rol_id) {
    $this->rol_id = $rol_id;
  }

  function setCreated_at($created_at) {
    $this->created_at = $created_at;
  }

  function setUpdated_at($updated_at) {
    $this->updated_at = $updated_at;
  }

  function setDeleted_at($deleted_at) {
    $this->deleted_at = $deleted_at;
  }


  
}
