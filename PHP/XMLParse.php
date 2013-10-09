<?php

$xml = simplexml_load_file("./xml/svn_list.xml");
$directories = $xml->xpath("//entry[@kind='dir']");
foreach ($directories as $dir){
	$name = $dir->name->__toString();
	
	if (strrpos($name,"/") === false){
		$date = strtok($dir->commit->date->__toString(),"T");
		$version = $dir->commit->attributes()["revision"]->__toString();
		echo '<tr><td>'.$name.'</td><td>'.$date.'</td><td>'.$version.'</td></tr>';
		
	}
}


?>