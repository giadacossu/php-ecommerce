<?php

class ProductsManager extends DBManager{


    public function __construct(){
        parent::__construct();///richiamo il costruttore del padre
        $this->columns =array('id', 'name','description','price');//preferibilmente tenere tutto minuscolo per case sensitive
        $this->tableNames='products';
    }
}

?>