<?php
require_once("data/Utils.php");
 
class paFile {

    public $file_name;

    public $file_time;

    public $visible;

    public $view_count;

    public $vote_count;

    public $vote_avg;

    public $type; /*I-Image*/

    function __construct($file_name,$file_time){

        $this->file_name = $file_name;

        $this->file_time = $file_time;

        $this->view_count = 0;

        $this->vote_count = 0;

        $this->vote_avg = 0;

        $this->visible = true;

        if(Utils::endsWith(strtolower($file_name),".jpg")
           ||Utils::endsWith(strtolower($file_name),".jpeg")
           ||Utils::endsWith(strtolower($file_name),".gif")
           ||Utils::endsWith(strtolower($file_name),".png")
          ){
            $this->type="I";
        }

    }
}
