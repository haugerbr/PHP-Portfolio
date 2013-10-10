$(document).ready(function(){

	$(".table").hide();
	$("#root").show();
	$(".btn").hide();

	$('td a').click(function(){
		//Check if last table was file table
		var showButton = $('.File').is(':visible')
		
		$(".table").fadeOut(500);
		
		//Find ID of new table to load.
		var raw_ID = $(this).text().split(".");
		if (raw_ID.length > 1){
			var tableID = '#'+raw_ID[0]+"\\."+raw_ID[1];
		}
		else{
			var tableID = '#'+raw_ID[0];
		}
			
		$(tableID).delay(500).fadeIn(500);
		
		//Build button fuctionality if needed
		if(showButton){
			var path = $(this).attr("id");
			$('.btn').delay(500).fadeIn(500);
			$('.btn').click(function(){
				$('#frame').append('<iframe src="https://subversion.ews.illinois.edu/svn/fa13-cs242/hauger3/'+path+'"></iframe>')
				$('.btn').fadeOut(500);
			});
		}
			
	});

});