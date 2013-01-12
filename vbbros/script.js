var sites = Array();
var count = 0;
$(document).ready(function(){

	//Filling the sites
	var total = $('.site').size()-1;
	var cont = $('#frame-container');	
	$('.frames').height($("#frame-container").innerHeight(false)*0.98-$('.frame-more').outerHeight(true)+"px");
	
	$('li.site:not(.coming-soon)').each(function(index, element){
		var $this = $(this);
		$this.bind('click',function(e){
			$('#frame-container').slideDown(function(){
				$.scrollTo('#frame-container', 400);
			});
			e.preventDefault();
			$('.frames').cycle(index);
			setTimeout(function(){$('.cycle-slideshow').cycle(index);}, 500);			
		});
	});
	
	//Attach trigger
	Mousetrap.bind('left', function() {
		$('.frame-prev').trigger('click');
    });
	Mousetrap.bind('right', function() {
		$('.frame-next').trigger('click');
    });
    
    
    // Load slide 
    $("body").bind('cycle-before', function(e, oH, inn, out, flag){
	    var out = $(out);
	    var src = out.data('src');
	    $.scrollTo('#frame-container', 400);
	    		
	    if(!out.data('loaded'))
	    {
			out.attr('src', src).data('loaded', true);
		}
		
		//Spin arrows on loop
		var next = oH.nextSlide;
		if( next == oH.slideCount-1 && !flag)
		{
			$('.nav').addClass('spin-prev').removeClass('spin-next');
		}
		else if( next == 0 && flag)
		{
			$('.nav').addClass('spin-next').removeClass('spin-prev');
		}
		else
		{
			$('.nav').removeClass('spin-prev spin-next')
		}
    });
    
    //Hack to delay second cycle
    $('.frame-next, .frame-prev').bind('click', function(e){
    	var parent = $(this).parent();
    	setTimeout(function(){parent.trigger('click');}, 500);
    	return false;
    });
    		
	$('.frame-close').on('click', function(){
		$.scrollTo('#we', 400, function(){
			cont.data('closed', true).slideToggle();
		});
	})
	
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
		$('#we').prependTo('.container');
	}

	//avgrund stuff
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

});