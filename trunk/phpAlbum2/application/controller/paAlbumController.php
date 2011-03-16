<?php
require_once("controller/paController.php");
require_once("object/paAlbum.php");
require_once("data/paDirectory.php");
require_once("data/paDataStorage.php");

class paAlbumController extends paController{

    protected $data;

    public function show(){
        $dir = paDataStorage::get_paDirectory("patrik");
        echo $dir->scan();
        paDataStorage::commit();
    }
}