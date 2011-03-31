<?php
require_once("controller/paController.php");
require_once("object/paLayout.php");
require_once("object/paText.php");
require_once("data/paDirectory.php");
require_once("data/paDataStorage.php");

class paAlbumController extends paController{

    protected $data;

    public function show(){
        $layout = new paLayout("clearone");

        $layout->addObject("left",new paText("left"));
        $layout->addObject("left",new paText("left"));
        $layout->addObject("content",new paText("####"));
        $layout->addObject("right",new paText("right"));
        
        echo $layout->render();
    }
}