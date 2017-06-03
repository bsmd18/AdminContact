<?php

interface IProyectos{
   public function select();
  
  public function selectById($pro_codigo);
 
  public function insert(proyectos $proyectos);

  public function update(proyectos $proyectos);

  public function delete($pro_codigo);
}
