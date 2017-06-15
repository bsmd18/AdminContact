<?php

class crudUsuarios extends controllerExtends {

    public function main(\request $request) {

        try {

            $this->loadTablePersonal();

            try {

                if ($request->getParam('accion') === 'insert') {

                    $usuario = new usuario();
                    $usuario->setNombres($request->getParam('nombres'));
                    $usuario->setApellidos($request->getParam('apellidos'));
                    $usuario->setCorreo($request->getParam('correo'));
                    $usuario->setClave(hash($this->getConfig()->getHash(), $request->getParam('clave'), false));
                    $usuario->setRazon_social($request->getParam('razonsocial'));
                    $usuario->setCargo($request->getParam('cargo'));
                    $usuario->setDireccion($request->getParam('direccion'));
                    $usuario->setCiudad($request->getParam('ciudad'));
                    $usuario->setPais($request->getParam('pais'));
                    $usuario->setDepartamento($request->getParam('departamento'));
                    $usuario->setTelefono($request->getParam('telefono'));
                    $usuario->setPagina_web($request->getParam('paginaweb'));
                    $usuario->setDescripcion($request->getParam('descripcion'));
                    $usuario->setEstado($request->getParam('estado'));
                    $usuario->setRol($request->getParam('rol'));

                    $usuarioDAO = new usuarioDAO($this->getConfig());
                    $row = $usuarioDAO->insert($usuario);

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

                if ($request->getParam('accion') === 'update') {

                    $usuario = new usuario();
                    $usuario->setCodigo($request->getParam('codigo'));
                    $usuario->setNombres($request->getParam('nombres'));
                    $usuario->setApellidos($request->getParam('apellidos'));
                    $usuario->setCorreo($request->getParam('correo'));
                    $usuario->setClave(hash($this->getConfig()->getHash(), $request->getParam('clave'), false));
                    $usuario->setRazon_social($request->getParam('razonsocial'));
                    $usuario->setCargo($request->getParam('cargo'));
                    $usuario->setDireccion($request->getParam('direccion'));
                    $usuario->setCiudad($request->getParam('ciudad'));
                    $usuario->setPais($request->getParam('pais'));
                    $usuario->setDepartamento($request->getParam('departamento'));
                    $usuario->setTelefono($request->getParam('telefono'));
                    $usuario->setPagina_web($request->getParam('paginaweb'));
                    $usuario->setDescripcion($request->getParam('descripcion'));
                    $usuario->setEstado($request->getParam('estado'));
                    $usuario->setRol($request->getParam('rol'));

                    $usuarioDAO = new usuarioDAO($this->getConfig());
                    $row = $usuarioDAO->update($usuario);

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

                    $usuarioDAO = new usuarioDAO($this->getConfig());
                    $row = $usuarioDAO->delete($request->getParam('codigo'));

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

                    $usuarioDAO = new usuarioDAO($this->getConfig());
                    $datos = $usuarioDAO->select();

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
        } catch (Exception $ex) {
            echo $exc->getMessage();
        }
    }

    private function loadTablePersonal() {
        require $this->getConfig()->getPath() . 'model/table/table.usuario.php';
        require $this->getConfig()->getPath() . 'model/interface/interface.usuario.php';
        require $this->getConfig()->getPath() . 'model/DAO/class.usuarioDAO.php';
        require $this->getConfig()->getPath() . 'model/extended/class.usuarioDAOExt.php';
    }

}
