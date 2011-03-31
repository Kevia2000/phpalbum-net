<?php
require_once("object/paWebObject.php");
 
class paText extends paWebObject{

    public $text;
    
    function __construct($text){
        $this->text = $text;
    }
    function render() {
        return $this->text;
    }
}
