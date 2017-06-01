<?php

class insertarContacto extends controllerExtends {

  public function main(\request $request) {
    $this->loadTablePersonal();
    
    $contacto = new registroContactos();
    $contacto->setFoto($request->getParam('foto'));
    $contacto->setNombre($request->getParam('nombre'));
    $contacto->setApellido($request->getParam('apellido'));
    $contacto->setEdad($request->getParam('edad'));

    $registroContantosDaoExt = new registroContactosDAO($this->getConfig());
    $row = $registroContantosDaoExt->insert($contacto);

    $answer = array(
        'code' => ($row > 0) ? 200 : 500,
        'row' => $row
    );
    
    $this->setParam('rsp', $answer);
    $this->setView('imprimirJson');
  }

  private function loadTablePersonal() {
    require $this->getConfig()->getPath() . 'model/table/table.registroContactos.php';
    require $this->getConfig()->getPath() . 'model/interface/interface.registroContactos.php';
    require $this->getConfig()->getPath() . 'model/DAO/class.registroContactoslDAO.php';
    require $this->getConfig()->getPath() . 'model/extended/class.registroContactosDAOExt.php';
  }

}
