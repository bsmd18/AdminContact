<?php

interface IContacto {

    public function select();

    public function selectById($codigo);

    public function insert(contacto $contacto);

    public function update(contacto $contacto);

    public function delete($codigo);

    public function search($codigo);
}