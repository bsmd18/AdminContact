<?php

class empresa{
    
    private $codigo;
    private $nit;
    private $nombre;
    private $descripcion;
    private $razonSocial;
    private $razonComercial;
    private $direccion;
    private $telefono;
    private $correo;
    private $fechaRegistro;
    private $logo;
    private $paginaWeb;
    private $estado;
    private $emt_codigo;
    
   
    function getCodigo() {
        return $this->codigo;
    }

    function getNit() {
        return $this->nit;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getRazonSocial() {
        return $this->razonSocial;
    }

    function getRazonComercial() {
        return $this->razonComercial;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getFechaRegistro() {
        return $this->fechaRegistro;
    }

    function getLogo() {
        return $this->logo;
    }

    function getPaginaWeb() {
        return $this->paginaWeb;
    }

    function getEstado() {
        return $this->estado;
    }

    function getEmt_codigo() {
        return $this->emt_codigo;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setNit($nit) {
        $this->nit = $nit;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setRazonSocial($razonSocial) {
        $this->razonSocial = $razonSocial;
    }

    function setRazonComercial($razonComercial) {
        $this->razonComercial = $razonComercial;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setFechaRegistro($fechaRegistro) {
        $this->fechaRegistro = $fechaRegistro;
    }

    function setLogo($logo) {
        $this->logo = $logo;
    }

    function setPaginaWeb($paginaWeb) {
        $this->paginaWeb = $paginaWeb;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setEmt_codigo($emt_codigo) {
        $this->emt_codigo = $emt_codigo;
    }


}
