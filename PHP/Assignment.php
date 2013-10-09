<?php
	include_once("File.php");
	
	class Assignment{

		private $name = null;
		private $date = null;
		private $version = null;
		public $files = array();
	
		function __construct($name,$date,$version){
			$this->name = $name;
			$this->date = $date;
			$this->version = $version; 
		}
		
		function createTableRow(){
			echo '<tr><td>'.$this->name.'</td><td>'.$this->date.'</td><td>'.$this->version.'</td></tr>';
		}
		
		function createFileTable(){
			echo '<thead><tr><th>Name</th><th>Size</th><th>Path</th><th>Type</th></tr></thead><tbody>';
			
			foreach($files as $file){
				$file->createTableRow();
			}
			
			echo '</tbody>';
				
		}
	
	}

?>