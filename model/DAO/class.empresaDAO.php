<?php

class empresaDAO extends dataSource implements Iempresa{
    
    public function delete($nit) {
        
    }

    public function insert(\empresa $empresa) {
        
         $sql = 'INSERT INTO empresas (emp_correo,emp_direccion, emp_estado, emp_fecha_registro, emp_logo,emp_nit, emp_pagina, emp_razon_comercial, emp_razon_social, emp_telefono, emt_codigo) VALUES (:correo, :direccion, "Activo", now(), :logo, :nit, :paginaWeb, :razonSocial, :razonComercial, :telefono, :tipoE )';
        $params = array(
            ':correo'=> $empresa->getCorreo(),
            ':direccion'=> $empresa->getDireccion(),
            ':logo'=> $empresa->getLogo(),
            ':nit'=> $empresa->getNit(),
            ':paginaWeb'=> $empresa->getPaginaWeb(),
            ':razonSocial'=> $empresa->getRazonSocial(),
            ':razonComercial'=> $empresa->getRazonComercial(),
            ':telefono'=> $empresa->getTelefono(),
            ':tipoE'=> $empresa->getEmt_codigo()
        );
    }

    public function search($nit) {
       
    }

    public function select() {
        
    }

    public function selectById($nit) {
        
    }

    public function update(\empresa $empresa) {
        
    }

}

