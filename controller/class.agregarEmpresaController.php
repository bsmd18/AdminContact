<?php

class agregarEmpresa extends controllerExtends {

  public function main(\request $request) {

    $this->loadTableEmpresas();

    try {

      $logo = $request->getFile('logo');
      $ext = '';
      switch ($logo['type']) {
        case 'image/jpeg':
          $ext = '.jpg';
          break;
        case 'image/gif':
          $ext = '.gif';
          break;
        case 'image/png':
          $ext = '.png';
          break;
      }

      $nameFile = hash('crc32b', $logo['name'] . date('d-m-Y H:i:s:u')) . $ext;
      $dirFile = $this->getConfig()->getDirUploads() . $nameFile;

      if (move_uploaded_file($logo['tmp_name'], $dirFile)) {

        $empresa = new empresa();
        $empresa->setLogo($nameFile);
        $empresa->setCorreo($request->getParam('correo'));
        $empresa->setDireccion($request->getParam('direccion'));
        $empresa->setNit($request->getParam('nit'));
        $empresa->setPaginaWeb($request->getParam('paginaWeb'));
        $empresa->setRazonComercial($request->getParam('razonComercial'));
        $empresa->setRazonSocial($request->getParam('razonSocial'));
        $empresa->setTelefono($request->getParam('telefono'));
        $empresa->setEmt_codigo($request->getParam('tipoE'));

        $registroEmpresaDao = new empresaDAO($this->getConfig());
        $row = $registroEmpresaDao->insert($empresa);

        $answer = array(
            'code' => ($row > 0) ? 200 : 500,
            'row' => $row
        );
      } else {
        $answer = array(
            'code' => 500,
            'datos' => 'No se pudo guardar la imagen'
        );
      }
      $this->setParam('rsp', $answer);
      $this->setView('imprimirJson');
    } catch (Exception $ex) {
      echo $ex->getMessage();
    }
  }

  private function loadTableEmpresas() {
    require $this->getConfig()->getPath() . 'model/table/table.empresa.php';
    require $this->getConfig()->getPath() . 'model/interface/interface.empresa.php';
    require $this->getConfig()->getPath() . 'model/DAO/class.empresaDAO.php';
    require $this->getConfig()->getPath() . 'model/extended/class.empresaDAOExt.php';
  }

}
