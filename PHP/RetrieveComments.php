<?php
	include_once("DatabaseUtils.php");
	
	$statement = $mysqli->prepare("SELECT * FROM Comments WHERE parent_id IS NULL");
	$statement->execute();
	$parentcomments = $statement->get_result();
	$parentcomments = $parentcomments->fetch_all();
	
	$statement2 = $mysqli->prepare("SELECT * FROM Comments WHERE parent_id IS NOT NULL");
	$statement2->execute();
	$childcomments = $statement2->get_result();
	$childcomments = $childcomments->fetch_all();
	
	$mysqli->close();
	
	foreach ($parentcomments as $parentcomment){
	
	$comment =  '	<div id="'.$parentcomment[0].'" class="panel panel-default">
						<div class="panel-heading">
    		  				<h3 class="panel-title">'.$parentcomment[1].'<a class="pull-right">Reply</a></h3>
  		    			</div>
  		    			<div class="panel-body">
              				'.htmlspecialchars($parentcomment[2], ENT_QUOTES).'
            			</div>
            		</div>';
             
            foreach($childcomments as $childcomment){
            	if( $childcomment[3] == $parentcomment[0]){
            		$comment .= '<div class="child pull-right">
            						<div id="'.$childcomment[0].'" class="panel panel-default">
            							<div class="panel-heading">
    		  								<h3 class="panel-title">'.$childcomment[1].'<a class="pull-right">Reply</a></h3>
  		    							</div>
  		    							<div class="panel-body">
              							'.$childcomment[2].'
            							</div>
            						</div>		
            					</div>';
            			

            	}
            } 
  		  echo $comment;
	}
?>