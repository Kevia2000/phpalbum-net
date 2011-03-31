<?php

require_once("object/paWebObject.php");

class paLayout extends paWebObject {

    public $containers = Array();

    public $theme;

    function __construct($theme){
        $this->theme=$theme;
    }

    public function addObject($container,$object){
        if(!isset($this->containers[$container])){
            $this->containers[$container] = Array();
        }
        $this->containers[$container][]=$object;
    }

    function render() {
        foreach($this->containers as $container => $objects){
            foreach($objects as $object){
                $$container .= $object->render();
            }
        }

        /*including the theme/page.php*/

        ob_start();

        include("themes/$this->theme/page.php");

        $content = ob_get_clean();

        return $content;
    }
}


