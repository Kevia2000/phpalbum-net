<?php

class paController {

    public static $frontController=null; // here should always be stored instance of the frontcontroller

    public function getRequestParameter($name){
        //$type will be used to do some checks on values
        $val = null;
        if ( isset($_GET[$name])){
            $val=$_GET[$name];
        }else if (isset($_POST[$name])){
            $val=$_GET[$name];
        }
        return $val;
    }
    
}
