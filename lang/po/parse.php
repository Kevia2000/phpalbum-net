<?php
	parse("de.po","../de_utf8.php","UTF-8");
	parse("de.po","../de_iso8859_1.php","ISO-8859-1");
	
	parse("es.po","../es_utf8.php","UTF-8");
	
	parse("hu.po","../hu_utf8.php","UTF-8");
	
	parse("es.po","../es_utf8.php","UTF-8");
	
	parse("lt.po","../lt_utf8.php","UTF-8");
	
	parse("ru.po","../ru_utf8.php","UTF-8");
	parse("ru.po","../ru_cp1251.php","CP1251");
	
	parse("nl.po","../nl_utf8.php","UTF-8");
	parse("nl.po","../nl_iso8859_1.php","ISO-8859-1");
	
	parse("fr.po","../fr_utf8.php","UTF-8");		
	parse("fr.po","../fr_iso8859_1.php","ISO-8859-1");		
	
	function parse( $input,$output,$charset){
		include_once "../en_utf8.php";
		
		$front=pa_get_frontend_lang();
		$back=pa_get_backend_lang();
		
		$fo=fopen($output,"w");
		
		$lines=file($input);
		//var_dump($lines);
		
		$pos=0;
		$msgid="";
		$texts=Array();
		foreach($lines as $key=> $line){
			$line=trim($line);
			//echo $line;
			if(substr($line,0,1)=="#"){
				//comentar
				continue;
			}
			if(substr($line,0,5)=="msgid"){
				$id= strstr($line,'"');
				$id= substr($id,1,strlen($id)-2);
				$msgid=$id;							
			}
			if(substr($line,0,6)=="msgstr"){
				$str= strstr($line,'"');
				$str= substr($str,1,strlen($str)-2);
				$str=mb_convert_encoding($str,$charset,"UTF-8");
				$texts[$msgid]=$str;
			}
		}
		var_dump($texts);
		
		fwrite($fo,"<?php\n");
		fwrite($fo,"function pa_get_frontend_lang(){\n");
		fwrite($fo,"\$pa_texts=Array(\n");
		
		foreach($front as $key =>$value){
			if(isset($texts[$key]) && strlen($texts[$key])>0){
				fwrite($fo,"\t\"".$key."\" => \"".$texts[$key]."\",\n");
			}else{
				fwrite($fo,"\t\"".$key."\" => \"".$value."\",\n");
			}
		}
			
		fwrite($fo,'); return $pa_texts; }');
		
		fwrite($fo,"\n\nfunction pa_get_backend_lang(){\n");
		fwrite($fo,"\$pa_texts=Array(\n");
		
		foreach($back as $key =>$value){
			if(isset($texts[$key]) && strlen($texts[$key])>0){
				fwrite($fo,"\t\"".$key."\" => \"".$texts[$key]."\",\n");
			}else{
				fwrite($fo,"\t\"".$key."\" => \"".$value."\",\n");
			}
		}
		fwrite($fo,'); return $pa_texts; }');
		fclose($fo);
	}
	?>