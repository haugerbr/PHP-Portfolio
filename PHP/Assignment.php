<?php
	include_once("File.php");
	
	class Assignment{

		private $name = null;
		private $date = null;
		private $version = null;
		public $files = array();
		
		//Constructor
		function __construct($name,$date,$version){
			$this->name = $name;
			$this->date = $date;
			$this->version = $version; 
		}
		
		//Creates a table row for the assignment table
		function createTableRow(){
			echo '<tr><td><a href="#">'.$this->name.'</a></td><td>'.$this->date.'</td><td>'.$this->version.'</td></tr>';
		}
		
		function createFileTable(){
			echo '<table id="'.$this->name.'" class="table"><thead><tr><th>Name</th><th>Size</th><th>Path</th><th>Type</th></tr></thead><tbody>';
			
			foreach($this->files as $file){
				$file->createTableRow();
			}
			
			echo '</tbody></table>';
				
		}
	
	}

?>