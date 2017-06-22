<?php

class contactoDAO extends dataSource implements IContacto {

    public function delete($codigo) {

//    if ($logico === true) {
//      $sql = 'UPDATE FROM usuario SET usu_deleted_at = now() WHERE usu_id = :id';
//    } else {
        $sql = 'DELETE FROM terceroscontactos WHERE ter_codigo = :codigo';
//    }

        $params = array(
            ':codigo' => $codigo
        );
        return $this->execute($sql, $params);
    }

    public function insert(\contacto $contacto) {
        $sql = 'INSERT INTO terceroscontactos (ter_documento, ter_nombres,'
                . ' ter_apellidos, ter_correo, ter_contacto, ter_rason_social,'
                . ' ter_fecha_nacimiento, ter_direccion, ter_ciudad, ter_pais,'
                . ' ter_departamento, ter_telefono, ter_fecha_registro, ter_pag_web,ter_foto,'
                . ' ter_descripcion, ter_estado, tet_codigo, res_codigo)'
                . ' VALUES (:documento, :nombre, :apellido,'
                . ' :correo, :contacto, :rsocial, :fnacimiento,:direccion,:ciudad,:pais,:departamento,:telefono, now(),'
                . ':pagweb,:foto,:descripcion,:estado,:tcodigo,:rcodigo)';
        $params = array(
            ':documento' => $contacto->getDocumento(),
            ':nombre' => $contacto->getNombre(),
            ':apellido' => $contacto->getApellido(),
            ':correo' => $contacto->getCorreo(),
            ':contacto' => $contacto->getContacto(),
            ':rsocial' => $contacto->getRasocial(),
            ':fnacimiento' => $contacto->getFechanac(),
            ':direccion' => $contacto->getDireccion(),
            ':ciudad' => $contacto->getCiudad(),
            ':pais' => $contacto->getPais(),
            ':departamento' => $contacto->getDepartamento(),
            ':telefono' => $contacto->getTelefono(),
            ':pagweb' => $contacto->getPagweb(),
            ':foto' => $contacto->getFoto(),
            ':descripcion' => $contacto->getDescripcion(),
            ':estado' => $contacto->getEstado(),
            ':tcodigo' => $contacto->getTipocodigo(),
            ':rcodigo' => $contacto->getRescodigo()
        );
        return $this->execute($sql, $params);
    }

    public function search($codigo) {
        $sql = 'SELECT ter_codigo, ter_documento, ter_nombres, ter_apellidos, ter_correo, ter_contacto, ter_rason_social, ter_fecha_nacimiento, ter_direccion, ter_ciudad, ter_pais, ter_departamento, ter_telefono, ter_fecha_registro, ter_pag_web,ter_foto, ter_descripcion, ter_estado, tet_codigo, res_codigo FROM terceroscontactos WHERE ter_codigo=:codigo';
        $params = array(
            ':codigo' => $codigo
        );
        return $this->query($sql, $params);
    }

    public function select() {
        $sql = 'SELECT ter_codigo, ter_documento, ter_nombres, ter_apellidos, ter_correo, ter_contacto, ter_rason_social, ter_fecha_nacimiento, ter_direccion, ter_ciudad, ter_pais, ter_departamento, ter_telefono, ter_fecha_registro, ter_pag_web,ter_foto, ter_descripcion, ter_estado, tet_codigo, res_codigo FROM terceroscontactos';
        return $this->query($sql);
    }

    public function selectById($codigo) {
        $sql = 'SELECT ter_codigo, ter_documento, ter_nombres, ter_apellidos, ter_correo, ter_contacto, ter_rason_social, ter_fecha_nacimiento, ter_direccion, ter_ciudad, ter_pais, ter_departamento, ter_telefono, ter_fecha_registro, ter_pag_web,ter_foto, ter_descripcion, ter_estado, tet_codigo, res_codigo FROM terceroscontactos WHERE ter_codigo=:codigo';
        $params = array(
            ':codigo' => $codigo
        );
        return $this->query($sql, $params);
    }

    public function update(\contacto $contacto) {
        $sql = 'UPDATE terceroscontactos set ter_documento = :documento, ter_nombres = :nombre,'
                . ' ter_apellidos = :apellido, ter_correo = :correo, ter_contacto = :contacto, ter_rason_social =:rsocial,'
                . ' ter_fecha_nacimiento = :fnacimiento, ter_direccion =:direccion, ter_ciudad=:ciudad, ter_pais=:pais,'
                . ' ter_departamento=:departamento, ter_telefono=:telefono, ter_pag_web=:pagweb,ter_foto=:foto,'
                . ' ter_descripcion=:descripcion, ter_estado=:estado, tet_codigo=:tcodigo, res_codigo=:rcodigo WHERE ter_codigo=:codigo';
        $params = array(
            ':documento' => $contacto->getDocumento(),
            ':nombre' => $contacto->getNombre(),
            ':apellido' => $contacto->getApellido(),
            ':correo' => $contacto->getCorreo(),
            ':contacto' => $contacto->getContacto(),
            ':rsocial' => $contacto->getRasocial(),
            ':fnacimiento' => $contacto->getFechanac(),
            ':direccion' => $contacto->getDireccion(),
            ':ciudad' => $contacto->getCiudad(),
            ':pais' => $contacto->getPais(),
            ':departamento' => $contacto->getDepartamento(),
            ':telefono' => $contacto->getTelefono(),
            ':pagweb' => $contacto->getPagweb(),
            ':foto' => $contacto->getFoto(),
            ':descripcion' => $contacto->getDescripcion(),
            ':estado' => $contacto->getEstado(),
            ':tcodigo' => $contacto->getTipocodigo(),
            ':rcodigo' => $contacto->getRescodigo(),
            ':codigo' => $contacto->getCodigo()
        );
        return $this->execute($sql, $params);
    }

}
