<?php

class obtenerEmpresa extends controllerExtends {

  public function main(\request $request) {

    try {
      $this->loadTableEmpresa();

      $empresaDAO = new empresaDAOExt($this->getConfig());
      $respuesta1 = $empresaDAO->selectEnterprise();



      $respuesta2 = array(
          'code' => (count($respuesta1) > 0) ? 200 : 500,
          'datos' => $respuesta1
      );

      $this->setParam('rsp', $respuesta2);
      $this->setView('imprimirJson');
    } catch (Exception $exc) {
      echo $exc->getMessage();
    }
  }

  private function loadTableEmpresa() {
    require $this->getConfig()->getPath() . 'model/table/table.empresa.php';
    require $this->getConfig()->getPath() . 'model/interface/interface.empresa.php';
    require $this->getConfig()->getPath() . 'model/DAO/class.empresaDAO.php';
    require $this->getConfig()->getPath() . 'model/extended/class.empresaDAOExt.php';
  }

}
