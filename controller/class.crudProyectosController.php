<?php

class crudProyectos extends controllerExtends {

  public function main(\request $request) {

    try {
      $this->loadTableProyectos();

      try {

        if ($request->getParam('accion') === 'insertar') {
          $proyectos = new proyectos();
          $proyectos->setPro_nombre($request->getParam('nombre'));
          $proyectos->setPro_descripcion($request->getParam('descripcion'));
          $proyectos->setPro_fecha_inicio($request->getParam('fecha_inicio'));
          $proyectos->setPro_fecha_final($request->getParam('fecha_final'));
          $proyectos->setPro_tipo($request->getParam('tipo'));
          $proyectos->setPro_valor($request->getParam('valor'));
          $proyectos->setPro_estado($request->getParam('estado'));

          $proyectosDAO = new proyectosDAO($this->getConfig());

          $respuesta1 = $proyectosDAO->insert($proyectos);
          $respuesta2 = array(
              'code' => ($respuesta1 > 0) ? 200 : 500,
              'datos' => $respuesta1
          );
          $this->setParam('rsp', $respuesta2);
          $this->setView('imprimirJson');
        }
      } catch (Exception $exc) {
        echo $exc->getMessage();
      }

      try {

        if ($request->getParam('accion') === 'cargarT') {

          $proyectosDAO = new proyectosDAO($this->getConfig());
          $respuesta1 = $proyectosDAO->select();

          $respuesta2 = array(
              'code' => ($respuesta1 > 0) ? 200 : 500,
              'datos' => $respuesta1
          );

          $this->setParam('rsp', $respuesta2);
          $this->setView('imprimirJson');
        }
      } catch (Exception $exc) {
        echo $exc->getMessage();
      }
      try{
        
        if ($request->getParam('accion') === 'eliminar') {
           $proyectosDAO = new proyectosDAO($this->getConfig());
          $respuesta1 = $proyectosDAO->delete($request->getParam('codigo'));

          $respuesta2 = array(
              'code' => ($respuesta1 > 0) ? 200 : 500,
              'datos' => $respuesta1
          );

          $this->setParam('rsp', $respuesta2);
          $this->setView('imprimirJson');
        }
        
      } catch (Exception $exc) {

      }
      
      try{
        
         if ($request->getParam('accion') === 'editar') {
          $proyectos = new proyectos();
          $proyectos->setPro_codigo($request->getParam('codigo'));
          $proyectos->setPro_nombre($request->getParam('nombre'));
          $proyectos->setPro_descripcion($request->getParam('descripcion'));
          $proyectos->setPro_fecha_inicio($request->getParam('fecha_inicio'));
          $proyectos->setPro_fecha_final($request->getParam('fecha_final'));
          $proyectos->setPro_tipo($request->getParam('tipo'));
          $proyectos->setPro_valor($request->getParam('valor'));
          $proyectos->setPro_estado($request->getParam('estado'));

          $proyectosDAO = new proyectosDAO($this->getConfig());

          $respuesta1 = $proyectosDAO->update($proyectos);
          $respuesta2 = array(
              'code' => ($respuesta1 > 0) ? 200 : 500,
              'datos' => $respuesta1
          );
          $this->setParam('rsp', $respuesta2);
          $this->setView('imprimirJson');
        }
      } catch (Exception $exc) {

      }
      
    } catch (Exception $exc) {
       echo $exc->getMessage();
    }
  }

  private function loadTableProyectos() {
    require $this->getConfig()->getPath() . 'model/table/table.proyectos.php';
    require $this->getConfig()->getPath() . 'model/interface/interface.proyectos.php';
    require $this->getConfig()->getPath() . 'model/DAO/class.proyectosDAO.php';
    require $this->getConfig()->getPath() . 'model/extended/class.proyectosDAOExt.php';
  }

}
