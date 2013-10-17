<?php

	require_once("DatabaseUtils.php");
	$statement = $mysqli->prepare("SELECT * FROM BadWords");
	$statement->execute();
	$result = $statement->get_result();
	$result = $result->fetch_all();
	
	$message = $_POST['comment'];
	
	foreach($result as $wordpair){
		$message = str_ireplace($wordpair[0],$wordpair[1],$message);
	}
	
	echo $message;
	
?>