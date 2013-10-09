<?php

	class Revision{
	
		private $revision_number = null;
		private $author = null;
		private $info = null;
		private $date = null;
	
		function __construct($revision_number,$author,$info,$date){
			$this->revision_number = $revision_number;
			$this->author = $author;
			$this->info = $info;
			$this->date = $date;
		}
		
		function createTableRow(){
			echo '<tr><td>'.$this->revision_number.'</td><td>'.$this->author.'</td><td>'.$this->info.'</td><td>'.$this->date.'</td></tr>';
		}
	
	}


?>