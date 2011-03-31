<?php
require_once("data/paDataObject.php");
require_once("data/paFile.php");

class paSetupTheme extends paDataObject{

    public $theme_name;

    function __construct($theme_name){
        $this->theme_name = $theme_name;
    }

    function getUniqueFileName() {
        return "paSetupTheme_" . md5( $this -> path );
    }

    public function getThemePath(){
        return "theme/".$this->theme_name;
    }


}
