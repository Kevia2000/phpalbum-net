<?php
require_once("controller/paController.php");

class paFrontController extends paController{
    function __construct(){
        parent::$frontController = $this;
        echo "<br>constructor<br>";
    }
    function dispatch(){

        $controller_name = $_GET["controller"];

        $controller_name = "pa" . $controller_name . "Controller";
        $action = $_GET["action"];

        include_once("controller/{$controller_name}.php");

        if( class_exists($controller_name) && method_exists($controller_name,$action)){
            $controller = new $controller_name();
            $controller -> $action();
        }else{
            // no controller found
            // then execute default action
            include_once("controller/paAlbumController.php");
            $controller = new paAlbumController();
            $controller -> show();
        }
    }
}