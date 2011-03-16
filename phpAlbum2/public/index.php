<?php

/*configuration block*/
$pa_data_path = "../../padata"; /*without trailing slash!!! */
$pa_photo_path = "../../paphotos"; /*without trailing slash!!! */ 
/*end of configuration*/


/* setup include paths */
$application_include_path = "../application";
$themes_include_path = "../themes";



set_include_path($application_include_path . ";" . get_include_path());

/* instantinate paFrontController and dispatch*/

require_once ("controller/paFrontController.php");

require_once ("data/paDataStorage.php");

require_once ("data/paDirectory.php");

paDataStorage::setDataPath($pa_data_path);

paDirectory::$photosPath = $pa_photo_path;

$fc = new paFrontController();

$fc -> dispatch();