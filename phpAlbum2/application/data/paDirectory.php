<?php
require_once("data/paDataObject.php");
 
class paDirectory extends paDataObject{

    static $photosPath;

    protected $files;

    protected $directories;

    protected $path;

    function __construct($path){
        if(isset($path) && strlen($path)>0){
            $this->path = paDirectory::$photosPath . "/" . $path;
        }else{
            $this->path = paDirectory::$photosPath;
        }
        $this->files = Array();
        $this->directories = Array();
    }
    
    function getUniqueFileName(){
        return "paDirectory_" . md5( $this -> path );
    }

    function scan(){
        $this->files = Array();
        $this->directories = Array();
        echo "<br> scanning". $this->path;
        if (is_dir($this->path)) {
            if ($handle = opendir($this->path)) {
                while (($file_name = readdir($handle)) !== false) {
                    $file_path = $this->path . "/" . $file_name;
                    if( filetype($file_path)=="dir" && $file_name!="." && $file_name !="..") {
                        /*it is directory*/
                        $this->directories[] = $file_name;
                    }else{
                        $this->files[] = $file_name;
                    }
                }
                closedir($handle);
            }
        }
    }

}
