var sites = Array();
var count = 0;
$(document).ready(function(){

	//Filling the sites
	var total = $('.site').size()-1;
	$('li.site:not(.coming-soon)').each(function(index, element){
		var $this = $(element);
		$this.data('target', count);
		site = {
			index: count,
			next: (count + 1 == total) ? 0 : count + 1,
			prev: (count == 0) ? total - 1 : count - 1,
			id: $this.data('id'),
			title: $this.find('.client').text(),
			href: $this.find('a.site-link').attr('href'),
			date: $this.data('date'),
			type: $this.data('type'),
			location: $this.data('location'),
		};
		count++;
		sites.push(site);
	});
	var cont = $('#frame-container');
	
	function openSite(site)
	{
		cont.data('closed', false).slideDown(function(){
			$.scrollTo('#frame-container', 400);
		});
		
		if(cont.data('current') != site.href || true)
		{
			var link = '<a href=\"' + site.href + '\" target=\"_blank\">' + site.title + '</a>';
			cont.data('current', site.href).children('iframe').attr({	
				"src": site.href,
				"height": $(window).height()-$('.frame-more').outerHeight(true)+"px",
				});
			$('.frame-desc').fadeOut('fast', function(){
				$('.frame-title').html(link);
				$('.frame-type').text(site.type);
				$('.frame-location').text(site.location + ", " + site.date);
				$(this).fadeIn();
			})
			
			$('.frame-next').data('target', site.next);
			$('.frame-prev').data('target', site.prev);
		}
	}
	//Small hack to avoid new variables for the mousetrap thingy
	Mousetrap.bind('left', function() {
		if(!cont.data('closed'))
		{
	    	var target = $('.frame-prev').data('target');
	    	openSite(sites[target]);
	    	
	    	if( target == total-1 )
			{
				$('.nav').addClass('spin-next').removeClass('spin-prev');
			}
			else
			{
				$('.nav').removeClass('spin-prev spin-next')
			}
		}
    });
	Mousetrap.bind('right', function() {
		if(!cont.data('closed'))
		{
	    	var target = $('.frame-next').data('target');
	    	openSite(sites[target]);
	    	
	    	if(target == 0)
			{
				$('.nav').addClass('spin-prev').removeClass('spin-next');
			}
			else
			{
				$('.nav').removeClass('spin-prev spin-next')
			}
		}
    });
    
	$('li.item:not(.coming-soon, #we), .frame-prev, .frame-next').on('click', function(e){
		e.preventDefault();
		var target = $(this).data('target');
		console.log(target);
		if( $(this).hasClass('frame-next') && target == 0)
		{
			$('.nav').addClass('spin-prev').removeClass('spin-next');
		}
		else if( $(this).hasClass('frame-prev') && target == total-1 )
		{
			$('.nav').addClass('spin-next').removeClass('spin-prev');
		}
		else
		{
			$('.nav').removeClass('spin-prev spin-next')
		}
		openSite(sites[target]);
	});
	
		
	$('.frame-close').on('click', function(){
		$.scrollTo(0, 400, function(){
			cont.data('closed', true).slideToggle();
		});
	})
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