<?php
	require_once('DatabaseUtils.php');

	if ($_POST['parent'] == 0){
		$preparedstatement = $mysqli->prepare("INSERT INTO Comments(comment) Values (?)");
		$preparedstatement->bind_param("s",$_POST['comment']);
	}

	else{
		$preparedstatement = $mysqli->prepare("INSERT INTO Comments(comment,parent_id) Values (?,?)");
		$preparedstatement->bind_param("si",$_POST['comment'],$_POST['parent']);
	}

	$preparedstatement->execute();
	
	$preparedstatement->close();
	$mysqli->close();
?>