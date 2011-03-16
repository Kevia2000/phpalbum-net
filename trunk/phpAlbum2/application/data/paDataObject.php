<?php
require_once("data/paDataStorage.php");
 
abstract class paDataObject {

    abstract function getUniqueFileName();

    function getFullPath(){

        return paDataStorage::getDataPath() . "/" .$this -> getUniqueFileName();
        
    }


    function loadObject(){

        $filename = $this->getFullPath();

        $data = file_get_contents($filename);

        paDataStorage::$last_load_hash = md5($data);

        return  unserialize($data);
    }

    function storeObject($hash){

        $filename = $this->getFullPath();

        $data = serialize($this);

        /*object will be automatically stored if it has been changed
         * otherwise it is not needed to be stored on file system*/
        if(!isset($hash) || md5($data) != $hash){
            echo "<br>storing ". $filename;
            file_put_contents($filename,$data);
        }

    }
}
