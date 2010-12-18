<?php

class paFrontController {

    function dispatch(){
        $controller_name = $_GET["controller"];
        $controller_name = "pa" . $controller_name . "Controller";
        $action = $_GET["action"];

        include_once("controller/{$controller_name}.php");

        if( class_exists($controller_name)){
            if( method_exists($controller_name,$action)){
                $controller = new $controller_name();
                $controller -> $action();
            }
        }else{
            // no controller found
        }
    }
}