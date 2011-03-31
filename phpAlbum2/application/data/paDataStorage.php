<?php
/**
 * Created by PhpStorm.
 * User: Patrik
 * Date: 16.03.2011
 * Time: 08:21:30
 * To change this template use File | Settings | File Templates.
 */
require_once("data/paDirectory.php");
require_once("data/paSetupMain.php");

class paDataStorage {

   static $objects = Array();

   private static $dataPath;

   static $last_load_hash;

   static function setDataPath($path){
         paDataStorage::$dataPath = $path;
   }
   static function getDataPath(){
         return paDataStorage::$dataPath;
   }

   static function addToBeCommitted($obj){
       paDataStorage::$objects[paDataStorage::$last_load_hash] = $obj;
   }

   static function commit(){
       foreach(paDataStorage::$objects as $key => $value){
           $value->storeObject($key); // key ist here the hash value of the serialized object. 
       }
   }

   static function get_paDirectory($path){

       $obj = new paDirectory($path);

       if(file_exists($obj->getFullPath())){
           $obj = $obj->loadObject();
           paDataStorage::addToBeCommitted($obj);
           return $obj;
       }else{
           paDataStorage::addToBeCommitted($obj);
           return $obj;
       }
   }
   static function get_paSetupMain(){

       $obj = new paSetupMain();

       if(file_exists($obj->getFullPath())){
           $obj = $obj->loadObject();
           paDataStorage::addToBeCommitted($obj);
           return $obj;
       }else{
           paDataStorage::addToBeCommitted($obj);
           return $obj;
       }
   }

    
}
