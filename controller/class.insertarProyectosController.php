<?php

class insertarProyectos extends controllerExtends {

  public function main(\request $request) {

    $this->loadTableProyectos();
    $proyectos = new proyectos();

    $proyectos->setPro_nombre($request->getParam('nombre'));
    $proyectos->setPro_descripcion($request->getParam('descripcion'));
    $proyectos->setPro_fecha_inicio($request->getParam('fecha_inicio'));
    $proyectos->setPro_fecha_final($request->getParam('fecha_final'));
    $proyectos->setPro_tipo($request->getParam('tipo'));
    $proyectos->setPro_valor($request->getParam('valor'));
    $proyectos->setPro_estado($request->getParam('estado'));

    $proyectosDAOExt = proyectosDAO($this->getConfig());
    $row = $proyectosDAOExt->insert($proyectos);

    $answer = array(
        'code' => ($row > 0) ? 200 : 500,
        'row' => $row
    );
    $this->setParam('rsp', $answer);
    $this->setView('imprimirJson');
  }

  private function loadTableProyectos() {
    require $this->getConfig()->getPath() . 'model/table/table.proyectos.php';
    require $this->getConfig()->getPath() . 'model/interface/interface.registroContactos.php';
    require $this->getConfig()->getPath() . 'model/DAO/class.proyectosDAO.php';
    require $this->getConfig()->getPath() . 'model/extended/class.proyectosDAOExt.php';
  }

}
