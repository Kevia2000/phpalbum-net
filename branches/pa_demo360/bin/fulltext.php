<?php
if(!defined("PHPALBUM_APP")){
		die("Direct access not permitted!");
}
function pa_fulltext_rebuild(){
	global $data_dir,$pa_setup;
	//build stopwrods array
	$stopwords_text=strtolower($pa_setup["index_stopwords"]);
	$stopwords=array_flip(split(",",$stopwords_text));
	
	//remove fulltext index
	for($i=0;$i<256;$i++){
		$hex=str_pad(dechex($i), 2, "0", STR_PAD_LEFT);
		@unlink($data_dir."album_full_".$hex.".idx");
	}
	
	$word_dic= Array();// dictionary of all words but filenames
	
	$res=db_select_all("directory");
	$indices = Array();
	foreach($res as $dir){
		//loop over directories
		$seq_files=$dir[seq_files];
		$files=db_select_all("files_".$seq_files);
		foreach($files as $file){
			$text="";
			if($pa_setup["index_keywords"]=='true'){
				$text.=" ".implode(" ",$file["keywords"]);
			}
			if($pa_setup["index_short_desc"]=="true"){
				$text.=" ".$file["desc"];
			}
			if($pa_setup["index_long_desc"]=="true"){
				$text.=" ".$file["long_desc"];
			}
			if($pa_setup["index_filenames"]=="true"){
				$text.=" ".str_replace("_"," ",$file["file_name"]);
			}
			if($pa_setup["index_directory_names"]=="true"){
				$text.=" ".str_replace("\\"," ",str_replace("/"," ",str_replace("_"," ",$dir["path"])));
			}
			//echo $text."<br>";
			$text=trim($text);

			$words=array_unique(split(" ",strtolower($text))); // only lower case index
			
			if(is_array($words)){
				foreach ($words as $word){
					//if($word!=strtolower($file["file_name"]) && $word!=""){
					if($word!="" && !isset($stopwords[$word])){
						if(isset($word_dic[$word])){
							$word_dic[$word]++;
						}else{
							$word_dic[$word]=1;
						}
					}
					if(strlen($word)>0 && !isset($stopwords[$word])){
						// put the file in the index for the word
						// compute hash for the word
						$hash=substr(md5($word),1,2); // only two characters ... means 256 group hashing
						if(!isset($indices[$hash])){
							if(file_exists($data_dir."album_full_".$hash.".idx")){
								$indices[$hash]=unserialize(file_get_contents($data_dir."album_full_".$hash.".idx"));
							}else{
								$indices[$hash]=Array();
							}
						}				
						if(isset($indices[$hash][$word])){
							$indices[$hash][$word][]=$file["file_time"].":".$seq_files.":".$file["file_name"];
						}else{
							$indices[$hash][$word]=Array($file["file_time"].":".$seq_files.":".$file["file_name"]);
						}
					}
				}
			
			}
		}// loop over files

		// store all indices
		db_commit(true); // free memory
		
	}
	foreach($indices as $key => $idx){
		$filename=$data_dir."album_full_".$key.".idx";
		$data=serialize($idx);
		$fp=fopen($filename,"w");
		fwrite($fp,$data);
		fclose($fp);
	}
	// update word dictionary used when searching after similar words
	$fp=fopen($data_dir."album_full_dict.idx","w"); fwrite($fp,serialize($word_dic)); fclose($fp);
	
}
function pa_fulltext_find($keyword){
	global $data_dir;
	$hash=substr(md5($keyword),1,2);
	if(file_exists($data_dir."album_full_".$hash.".idx")){
		$index=unserialize(file_get_contents($data_dir."album_full_".$hash.".idx"));
		if(isset($index[$keyword])){
			return $index[$keyword];
		}else{
			return Array();
		}
	}else{
		return Array();
	}
}
function pa_fulltext_walk1(&$item1, $key)
{
    $item1 = substr($item1,11);
}
function get_search_photos($dir,$start,$count){
	global $pa_keywords,$pa_grants,$pa_user;

	//get results for every keyword and merge them.
	foreach($pa_keywords as $keyword){
		if(!isset($res)){
			$res=pa_fulltext_find($keyword);
		}else{
			//merge results	
			$res2=pa_fulltext_find($keyword);
			$res=array_intersect($res,$res2);
		}
	}
	sort($res); // sort 
	$res=array_reverse($res,true); // from newest to oldes
	$res=array_slice($res,$start,$count); // cut the needed count
	array_walk($res,'pa_fulltext_walk1');
	// prepare visible and accesible directories
	// group clause
	$where_groups="";
	if(!isset($pa_user["groups"]["superuser"])){
		$where_groups="(( (!is_array(groups) ||count(groups)==0 )&& (!is_array(inh_groups) || count(inh_groups)==0) )";
		foreach($pa_user["groups"] as $key => $val){
			$where_groups.=" || isset(groups['$key']) || isset(inh_groups['$key'])";
		}
		$where_groups.=")";
	}
	if($where_groups!=""){
		$where_groups .= " && visibility=='true'";
	}else{
		$where_groups .= "visibility=='true'";
	}
	
	$dirs=db_select_all("directory",$where_groups,"seq_files");
	foreach($dirs as $dir){
		$folders[$dir["seq_files"]]=$dir["path"];
	}
	unset($dirs); // free memory
	//now select all pictures and put them all to result set
	$return_res=Array();
	foreach($res as $file){
		$seq_files=substr($file,0,4);
		if(isset($folders[$seq_files])){
			if(!isset($prev_seq_files) ||$prev_seq_files!=$seq_files){
				// select all files in special array
				$prev_seq_files=$seq_files;
				$dbres=db_select_all("files_".$seq_files,"visible=='true'");
				foreach($dbres as $record){
					$files[$record["file_name"]]=$record;
				}
				add_column_to_array($files,"path",$folders[$seq_files]);//add path to the array
				unset($dbres); //free memory
				db_commit(true);
			}
			if(isset($files[substr($file,5)])){
				$return_res[]=$files[substr($file,5)]; // add record
			}
		}
	}
	// sort that the newest are first
	$func=db_create_order_by_function("file_time-,file_name-");
	usort($return_res,$func);
	return $return_res;		
}

function pa_fulltext_get_did_you_mean(){
	global $pa_keywords,$data_dir;
	$dict=unserialize(file_get_contents($data_dir."album_full_dict.idx"));
	$new_keywords="";
	foreach($pa_keywords as $keyword){
		if(isset($dict[$keyword])){
			//this keyword is there
			$new_keywords.=$keyword." ";
		}else{
			//else find similar keyword
			$best_lev=1000000;
			$best_keyword="";
			$best_count=0;
			foreach($dict as $word => $count){
				$lev=levenshtein($word,$keyword,2,3,1);
				if($lev<$best_lev || ($lev==$best_lev && $count> $best_count)){
					$best_lev=$lev;
					$best_keyword=$word;
					$best_count=$count;
				}
			}
			$new_keywords.=$best_keyword." ";
		}
	}
	return $new_keywords;
}
?>