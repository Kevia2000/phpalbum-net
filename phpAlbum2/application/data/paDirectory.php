<?php
require_once("data/paDataObject.php");
 
class paDirectory extends paDataObject{

    static $photosPath;

    protected $files;

    protected $directories;

    function __constructor($path){
        $this->path = paDirectory::$photosPath . "/" . $path;
        $this->files = Array();
        $this->directories = Array();
    }
    
    function getUniqueFileName(){
        return "paDirectory_" . md5( $this -> path );
    }

    function scan(){
        
    }

}
