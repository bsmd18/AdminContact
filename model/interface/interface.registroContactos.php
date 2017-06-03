<?php

/*
 * Interface para la tabla registro de personal.
 */
interface IregistroContactos {

  public function select();
  
  public function selectById($id);
 
  public function insert(registroContactos $reContactos);

  public function update(registroContactos $reContactos);

  public function delete($id);
}
