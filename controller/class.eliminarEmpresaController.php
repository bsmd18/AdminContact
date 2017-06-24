<?php

class eliminarEmpresa extends controllerExtends {

  public function main(\request $request) {

    try {
      $this->loadTableEmpresas();

      $empresaDAO = new empresaDAOExt($this->getConfig());
      $respuesta1 = $empresaDAO->delete($request->getParam('nit'));

      $respuesta2 = array(
          'code' => ($respuesta1 > 0) ? 200 : 500,
          'datos' => $respuesta1
      );

      $this->setParam('rsp', $respuesta2);
      $this->setView('imprimirJson');
    } catch (Exception $exc) {
      echo $exc->getMessage();
    }
  }

  private function loadTableEmpresas() {
    require $this->getConfig()->getPath() . 'model/table/table.empresa.php';
    require $this->getConfig()->getPath() . 'model/interface/interface.empresa.php';
    require $this->getConfig()->getPath() . 'model/DAO/class.empresaDAO.php';
    require $this->getConfig()->getPath() . 'model/extended/class.empresaDAOExt.php';
  }

}
