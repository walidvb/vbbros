$(document).ready(function(){
		
	/*
	$('.colorbox,').colorbox({
	    maxWidth: "95%",
	    current: "",
	    returnFocus: false,
	});
	*/
	
	$('h2.client').on('click', function(e){
		e.preventDefault();
		$(this).parent('.site').toggleClass('show-more');	
	});

	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
		$('#we').prependTo('.container');
	}

	//iframe stuff
	$('.coming-soon').on('click',function(e){e.preventDefault()}).avgrund({			
		height: 100, // max is 350px
		showClose: true, // switch to 'true' for enabling close button 
		showCloseText: 'OKAY', // type your text for close button
		holderClass: 'custom',
		closeByEscape: true, // enables closing popup by 'Esc'..
		closeByDocument: true, // ..and by clicking document itself
		enableStackAnimation: false, // another animation type
		onBlurContainer: '', // enables blur filter for specified block
		template: '<p>This site isn\'t online yet, do come back later!</p>' // or function() { ... }
	});
	
	$('.site-link:not(.coming-soon)').on('click', function(e){
		e.preventDefault();
		var href = this.href;
		var cont = $('#frame-container');
		if(cont.data('current') != href || cont.is('hidden'))
		{
			cont.data('current', href).slideDown(function(){
				$.scrollTo('#frame-container', 400);
			}).children('iframe').attr({	
				"src": href,
				//"height": $(window).height()*0.8,
				});
			$('.frame-title').text($('.client', $(this)).text());
		}
		else
		{
			cont.slideToggle();
		}
	});
	
	$('.back').on('click', function(){
		$.scrollTo(0, 400);
	})
});