<?php
require_once("controller/paController.php");
require_once("data/paDataStorage.php");
require_once("data/paDirectory.php");

class paDirectoryScanController extends paController{

    /*actions*/

    function scan(){

        $dir = $_GET["dir"]; /*security check*/

        $directory = paDataStorage::get_paDirectory($dir);

        list($added,$deleted) = $directory->scan();

        return $added . "/" . $deleted;

    }
}
