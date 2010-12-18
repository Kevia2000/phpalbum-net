<?php

/* setup include paths */
$application_include_path = "../application";
$themes_include_path = "../themes";

set_include_path($application_include_path . ";" . get_include_path());

/*instantinate paFronController and dispatch*/
require_once ("controller/paFrontController.php");

$fc = new paFrontController();
$fc -> dispatch();

