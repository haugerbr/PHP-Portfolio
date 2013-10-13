<?php

	$mysqli = new mysqli('engr-cpanel-mysql.engr.illinois.edu','hauger3_admin','Iag2tuoi4','hauger3_portfolio');

	if ($mysqli->connect_errno) {
    	echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
  
?>