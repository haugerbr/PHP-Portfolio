var commentBoxAndButtons = '<textarea class="form-control" rows="3"></textarea>'+
	'<div id="buttons"><button id="submit" class="btn btn-primary pull-right">Submit</button>'+
	'<button id="cancel" class="btn btn-default pull-right">Cancel</button></div>';



function refreshComments(){		
		$.ajax({
		url: 'PHP/RetrieveComments.php'
		})
		.done(function(returndata){
			$('.panel').fadeOut(1000,$('#comments').empty());
			$('#comments').append(returndata);
			replyButtonHandler(commentBoxAndButtons);
		});
	
}

function cleanBadWords(message){
		var cleancontent;
		$.ajax({
		type: 'POST',
		url: 'PHP/CleanComment.php',
		data: {comment: message},
		async: false
		})
		.done(function(returndata){
			cleancontent =returndata;
		});
		return cleancontent;

}

function cancelButtonHandler(hiddenButton){
		$('#cancel').click(function(){
			$('#buttons').remove();
			$('textarea').remove();	
			hiddenButton.fadeIn(500);
		});
}

function submitButtonHandler(parent_id){
	
	$('#submit').click(function(){
		
		var content = $(this).parents('#buttons').siblings('textarea').val();
		var cleancontent = cleanBadWords(content);
		
		textareaClose($('textarea'));
		$('#commentButton').fadeIn(500);
		$('h3 a').fadeIn(500);

		$.ajax({
		type: 'POST',
		url: 'PHP/CreateComment.php',
		data: {comment: cleancontent, parent: parent_id }
		})
		.done(function(returndata){
			refreshComments();
		});
	
	});
}

function replyButtonHandler(content){
	$('h3 a').click(function(){
		textareaClose($(this));
		$('#commentButton').fadeIn(500);
		$parent = $(this).parents('.panel-default');
		$parent.after(content);
		var parent_id = $parent.attr('id');
		cancelButtonHandler($(this));
		submitButtonHandler(parent_id);
	});

}

function commentButtonHandler(content){
	$('#commentButton').click(function(){
		textareaClose($(this));
		$(this).after(content);
		cancelButtonHandler($(this));
		submitButtonHandler(0);
	});	

}

function textareaClose(element){
	$('#buttons').fadeOut(500).remove();
	$('textarea').fadeOut(500).remove();
	$('h3 a').fadeIn(500);
	element.fadeOut(500);
}


$(document).ready(function(){

	$('.table').hide();
	$('#root').show();
	$('#file').hide();

	$('td a').click(function(){
		//Check if last table was file table
		var showButton = $('.File').is(':visible')
		
		$('.table').fadeOut(500);
		
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

			
	replyButtonHandler(commentBoxAndButtons);
	commentButtonHandler(commentBoxAndButtons);
	
});