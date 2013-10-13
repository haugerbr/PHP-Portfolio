<?php 
	include_once("Revision.php");
	
	class File {

		public $name = null;
		private $size = null;
		private $type = null;
		private $path = null;
		public $revisions = array();
		
		function __construct($name,$size,$type,$path){
			$this->name = $name;
			$this->size = $size;
			$this->type = $type;
			$this->path = $path;
		}
		
		function createTableRow(){
			echo '<tr><td><a class="File" id="'.$this->path.'">'.$this->name.'</a></td><td>'.$this->size.'</td><td>'.$this->path.
				'</td><td>'.$this->type.'</td></tr>';
		}
		
		function createRevisionTable(){
			echo '<table id="'.$this->name.'" class="table"><thead><tr><th>Revision #</th><th>Author</th><th>Info</th><th>Date</th></tr></thead><tbody>';
			
			foreach($this->revisions as $revision){
				$revision->createTableRow();
			}
			
			echo '</tbody></table>';

		}

	}

?>