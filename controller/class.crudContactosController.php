<?php

class crudContactos extends controllerExtends {

    public function main(\request $request) {

        try {

            $this->loadTableContactos();

            try {

                if ($request->getParam('accion') === 'insert' || $request->getParam('accion') === 'update') {

                    $contacto = new contacto();
                    $contacto->setDocumento($request->getParam('documento'));
                    $contacto->setNombre($request->getParam('nombre'));
                    $contacto->setApellido($request->getParam('apellido'));
                    $contacto->setCorreo($request->getParam('correo'));
                    $contacto->setContacto($request->getParam('contacto'));
                    $contacto->setRasocial($request->getParam('rasocial'));
                    $contacto->setFechanac($request->getParam('fnacimiento1'));
                    $contacto->setDireccion($request->getParam('direccion'));
                    $contacto->setCiudad($request->getParam('ciudad'));
                    $contacto->setPais($request->getParam('pais'));
                    $contacto->setDepartamento($request->getParam('departamento'));
                    $contacto->setTelefono($request->getParam('telefono'));
                    $contacto->setPagweb($request->getParam('pagweb'));
                    $contacto->setFoto($request->getParam('foto'));
                    $contacto->setDescripcion($request->getParam('descripcion'));
                    $contacto->setEstado($request->getParam('estado'));
                    $contacto->setTipocodigo($request->getParam('tcodigo'));
                    $contacto->setRescodigo($request->getParam('rcodigo'));

                    if ($request->getParam('accion') === 'insert') {

                        $contactoDAO = new contactoDAO($this->getConfig());
                        $row = $contactoDAO->insert($contacto);
                    } else if ($request->getParam('accion') === 'update') {

                        $contacto->setCodigo($request->getParam('codigo'));

                        $contactoDAO = new contactoDAO($this->getConfig());
                        $row = $contactoDAO->update($contacto);
                    }

                    $answer = array(
                        'code' => ($row > 0) ? 200 : 500,
                        'row' => $row
                    );

                    $this->setParam('rsp', $answer);
                    $this->setView('imprimirJson');
                }
            } catch (Exception $ex) {
                echo $exc->getMessage();
            }
            try {

                if ($request->getParam('accion') === 'delete') {

                    $contactoDAO = new contactoDAO($this->getConfig());
                    $row = $contactoDAO->delete($request->getParam('codigo'));

                    $answer = array(
                        'code' => ($row > 0) ? 200 : 500,
                        'row' => $row
                    );

                    $this->setParam('rsp', $answer);
                    $this->setView('imprimirJson');
                }
            } catch (Exception $ex) {
                echo $exc->getMessage();
            }
            try {

                if ($request->getParam('accion') === 'cargarT') {

                    $contactoDAO = new contactoDAO($this->getConfig());
                    $datos = $contactoDAO->select();

                    $answer = array(
                        'code' => ($datos > 0) ? 200 : 500,
                        'datos' => $datos
                    );

                    $this->setParam('rsp', $answer);
                    $this->setView('imprimirJson');
                }
            } catch (Exception $ex) {
                echo $exc->getMessage();
            }

            try {
                
            } catch (Exception $ex) {
                
            }
        } catch (Exception $ex) {
            echo $exc->getMessage();
        }
    }

    private function loadTableContactos() {
        require $this->getConfig()->getPath() . 'model/table/table.contacto.php';
        require $this->getConfig()->getPath() . 'model/interface/interface.contacto.php';
        require $this->getConfig()->getPath() . 'model/DAO/class.contactoDAO.php';
        require $this->getConfig()->getPath() . 'model/extended/class.contactoDAOExt.php';
    }

}
