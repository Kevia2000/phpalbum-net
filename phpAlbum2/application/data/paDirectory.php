<?php
require_once("data/paDataObject.php");
require_once("data/paFile.php");
 
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
        $scanned_files = Array(); /*used to detect if any files were deleted*/
        if (is_dir($this->path)) {
            if ($handle = opendir($this->path)) {
                while (($file_name = readdir($handle)) !== false) {
                    $file_path = $this->path . "/" . $file_name;
                    if( filetype($file_path)=="dir" && $file_name!="." && $file_name !="..") {
                        /*it is directory*/
                        $this->directories[$file_name] = $file_path;
                    }else{
                        $file_time=filectime($file_path);
                        if(isset($this->files[$file_name]) && $this->files[$file_name]->file_time == $file_time){
                            /*do nothing, this file is already imported*/
                        }else{
                            /*import niew file*/
                            $this->files[$file_name] = new paFile($file_path,filectime($file_path));
                        }
                    }
                    $scanned_files[$file_name]="1";
                }
                closedir($handle);
            }
        }
        /*if any files were deleted then delete them from aray too*/
        /*first scan directories*/
        foreach($this->directories as $key => $value){
            if(!isset($scanned_files[$key])){
                unset($this->directories[$key]);
            }
        }
        /*second scan files*/
        foreach($this->files as $key => $value){
            if(!isset($scanned_files[$key])){
                unset($this->files[$key]);
            }
        }
        unset($scanned_files);
        var_dump($this->files);
    }

}
