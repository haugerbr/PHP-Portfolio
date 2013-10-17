function cancelButtonHandler(hiddenButton){
		$('#cancel').click(function(){
			$('#buttons').remove();
			$('textarea').remove();	
			hiddenButton.fadeIn(500);
		});
}

$(document).ready(function(){

	$(".table").hide();
	$("#root").show();
	$("#file").hide();

	$('td a').click(function(){
		//Check if last table was file table
		var showButton = $('.File').is(':visible')
		
		$(".table").fadeOut(500);
		
		//Find ID of new table to load.
		var tableID = '#'+$(this).text().replace('.','\\.');
		$(tableID).delay(500).fadeIn(500);
		
		//Build button fuctionality if needed
		if(showButton){
			var path = '<iframe src="https://subversion.ews.illinois.edu/svn/fa13-cs242/hauger3/'+$(this).attr('id')+'"></iframe>';
			$('#file').delay(500).fadeIn(500);
			$('#file').click(function(){
				$('#frame').append(path);
				$('#file').fadeOut(500);
			});
		}
			
	});
	
	var commentBoxAndButtons = '<textarea class="form-control" rows="3"></textarea>'+
		'<div id="buttons"><button id="submit" class="btn btn-primary pull-right">Submit</button>'+
		'<button id="cancel" class="btn btn-default pull-right">Cancel</button></div>';
		
	$('h3 a').click(function(){
		$('#buttons').remove();
		$('textarea').remove();
		$('#commentButton').fadeIn(500);
		$('h3 a').fadeIn(500);
		$(this).fadeOut(500);
		$parent = $(this).parents('.panel-default');
		$parent.after(commentBoxAndButtons);
		cancelButtonHandler($(this));
	});
	
	$('#commentButton').click(function(){
		$('#buttons').remove();
		$('textarea').remove();
		$('h3 a').fadeIn(500);
		$(this).fadeOut(500);
		$(this).after(commentBoxAndButtons);
		cancelButtonHandler($(this));
	});
	
	$('#submit').click(function(){
	
	
	});
	

	
});