<?php 
	//include configuration file
	require "config.php";
	
	$phpalbum_version="0.4.1.15";
	
	define("PHPALBUM_APP","OK");  // if this is setted to DEMO then only superuser can change something in setup.
								  // should be used only for demos i.e. on phpAlbum.net demo page. for normal access use some other value.

	require "bin/core.php";       // include core functions of phpAlbum

	if(!pa_initialize()){
		pa_terminate_with_errors();
	}
	
	if(!pa_start_database()){
		pa_terminate_with_errors();
	}
	
	pa_get_parameters();
	
	pa_read_settings();
	
	pa_check_cookies();
	
	pa_check_username();
	
	pa_check_access();
	
	pa_update_view_stats();

	if(pa_is_cachable()){
		if(!pa_load_from_cache()){
			ob_start();
			pa_execute_command();
			pa_write_chache_and_flush();
		}
	}else{
		pa_execute_command();
	}
	
	pa_clean_up_and_scan_dir();
	
	db_commit(); // to be sure all changes are written in db
?>