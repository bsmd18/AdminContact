<?php

class identificar extends controllerExtends {

  public function main(\request $request) {
    try {
      $this->loadTableUsuario();

      $correo = $request->getParam('correo');     
      $password = hash($this->getConfig()->getHash(), $request->getParam('clave'), false);

      $usuarioDAO = new usuarioDAOExt($this->getConfig());
      $respuesta = $usuarioDAO->search($correo, $password);     
      
      $respuesta1 = array(
          'codigo' => (count($respuesta) > 0) ? 200 : 500,
          'usuario' => $respuesta
      );

      $this->setParam('rsp', $respuesta1);
      $this->setView('imprimirJson');
    } catch (Exception $exc) {
      echo $exc->getMessage();
    }
  }

  private function loadTableUsuario() {
    require $this->getConfig()->getPath() . 'model/table/table.usuario.php';
    require $this->getConfig()->getPath() . 'model/interface/interface.usuario.php';
    require $this->getConfig()->getPath() . 'model/DAO/class.usuarioDAO.php';
    require $this->getConfig()->getPath() . 'model/extended/class.usuarioDAOExt.php';
  }

}
