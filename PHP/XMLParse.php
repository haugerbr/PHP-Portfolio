<?php

	//Parses the xml using Xpath queries and puts the information into Assignment objects
	include_once("Assignment.php");
	
	$xml = simplexml_load_file("./xml/svn_list.xml");
	$directories = $xml->xpath("//entry[@kind='dir']");
	$files = $xml->xpath("//entry[@kind='file']");

	$assignment_array = array();

	foreach ($directories as $dir){
	
		$name = $dir->name->__toString();
		
	//Find the root directories by only choosing names without "/"
		if (strrpos($name,"/") === false){
			$date = strtok($dir->commit->date->__toString(),"T");
			$version = $dir->commit->attributes()["revision"]->__toString();
			$assignment_array[$name] = new Assignment($name,$date,$version);
			$assignment_array[$name]->createTableRow();		
		}
	}
	
	foreach ($files as $file){
		$raw_name = $file->name->__toString();
		$assignment = strtok($raw_name,"/");
		$file_name = substr($raw_name,strrpos($raw_name,"/"));
		$type = substr($raw_name,strrpos($raw_name, "."));
		$path = $file->name->__toString();
		$size = $file->size->__toString();
		$assignment_array[$assignment]->files[$file_name] = new File($file_name,$size,$type,$path);	
	
	}


?>