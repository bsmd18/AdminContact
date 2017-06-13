<?php

interface IUsuario {

  public function select();

  public function selectById($codigo);

  public function insert(usuario $usuario);

  public function update(usuario $usuario);

  public function delete($codigo);
  
}
