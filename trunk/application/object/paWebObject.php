<?php
 
abstract class paWebObject {
    protected $view; // associated view to this object
    protected $controller; // controller which created this object

    public function _construct($controller,$view){
        $this->controller = $controller;
        $this->view = $view;
    }

    abstract function render();
}

