<?php

class usuario {

    /**
     * Llave Principal y campo autoincrementable de la tabla Usuario	
     * @var integer 
     */
    private $codigo;

    /**
     * Nombre del usuario con el cual se hara el ingreso al aplicativo
     * @var string 
     */
    private $nombres;

    /**
     * Se utliza para el ingreso a la aplicación y verificar el usuario		
     * @var string
     */
    private $apellidos;
    private $correo;
    private $clave;
    private $razon_social;
    private $cargo;
    private $direccion;
    private $ciudad;
    private $pais;
    private $departamento;
    private $telefono;
    private $fecha_registro;
    private $pagina_web;
    private $descripcion;
    private $estado;
    private $rol;
    
    function getCodigo() {
        return $this->codigo;
    }

    function getNombres() {
        return $this->nombres;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getClave() {
        return $this->clave;
    }

    function getRazon_social() {
        return $this->razon_social;
    }

    function getCargo() {
        return $this->cargo;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getCiudad() {
        return $this->ciudad;
    }

    function getPais() {
        return $this->pais;
    }

    function getDepartamento() {
        return $this->departamento;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getFecha_registro() {
        return $this->fecha_registro;
    }

    function getPagina_web() {
        return $this->pagina_web;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getEstado() {
        return $this->estado;
    }

    function getRol() {
        return $this->rol;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setClave($clave) {
        $this->clave = $clave;
    }

    function setRazon_social($razon_social) {
        $this->razon_social = $razon_social;
    }

    function setCargo($cargo) {
        $this->cargo = $cargo;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setCiudad($ciudad) {
        $this->ciudad = $ciudad;
    }

    function setPais($pais) {
        $this->pais = $pais;
    }

    function setDepartamento($departamento) {
        $this->departamento = $departamento;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setFecha_registro($fecha_registro) {
        $this->fecha_registro = $fecha_registro;
    }

    function setPagina_web($pagina_web) {
        $this->pagina_web = $pagina_web;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setRol($rol) {
        $this->rol = $rol;
    }

}
