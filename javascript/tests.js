test("filter test",function(){
	notEqual("fuck ass",cleanBadWords("fuck ass"),"Filter passed");
	notEqual("bitch",cleanBadWords("fuck ass"),"Filter passed");
	notEqual("shit",cleanBadWords("fuck ass"),"Filter passed");

});

