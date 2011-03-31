<?php
require_once("data/paDataObject.php");
require_once("data/paFile.php");

class paSetupMain extends paDataObject{

    public $theme_name;

    function __construct(){
        //default values
        $this->theme_name="clearone";
    }

    function getUniqueFileName() {
        return "paMainSetup";   
    }
}
