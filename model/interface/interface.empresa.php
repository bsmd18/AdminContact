<?php

interface Iempresa{
    
    public function select();

    public function selectById($nit);

    public function insert(empresa $empresa);

    public function update(empresa $empresa);

    public function delete($nit);

    public function search($nit);
}