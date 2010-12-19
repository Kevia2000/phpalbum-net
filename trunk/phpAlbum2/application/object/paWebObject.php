<?php
 
abstract class paWebObject {

    protected $controller; // controller which created this object

    public function _construct($controller,$view){
        $this->controller = $controller;
    }

    abstract function render();
}

