//Bootsshop-----------------------//
$(document).ready(function(){	
	$('.subMenu > a').click(function(e)
	{
		e.preventDefault();
		var subMenu = $(this).siblings('ul');
		var li = $(this).parents('li');
		var subMenus = $('#sidebar li.subMenu ul');
		var subMenus_parents = $('#sidebar li.subMenu');
		if(li.hasClass('open'))
		{
			if(($(window).width() > 768) || ($(window).width() < 479)) {
				subMenu.slideUp();
			} else {
				subMenu.fadeOut(250);
			}
			li.removeClass('open');
		} else 
		{
			if(($(window).width() > 768) || ($(window).width() < 479)) {
				subMenus.slideUp();			
				subMenu.slideDown();
			} else {
				subMenus.fadeOut(250);			
				subMenu.fadeIn(250);
			}
			subMenus_parents.removeClass('open');		
			li.addClass('open');	
		}
	});
	var ul = $('#sidebar > ul');
	$('#sidebar > a').click(function(e)
	{
		e.preventDefault();
		var sidebar = $('#sidebar');
		if(sidebar.hasClass('open'))
		{
			sidebar.removeClass('open');
			ul.slideUp(250);
		} else 
		{
			sidebar.addClass('open');
			ul.slideDown(250);
		}
	});
// On load on window of size < 220px >  --------------------- //
	if($(window).width() < 220)
	{
		ul.css({'display':'none'});
	   $('.header .btn').css({'display':'none'});
		fix_position();
	}
	if($(window).width() > 220)
	{
		ul.css({'display':'block'});
	}
// On load on window of size < 420px > --------------------- //

	if($(window).width() > 978){	
			$('#logoM').css({'display':'none'});
			$('#header').css({'display':'block'});
		}
	if($(window).width() < 977){	
			$('#logoM').css({'display':'block'});
			$('#header').css({'display':'none'});
		}
		
	if($(window).width() > 420){	
		$('#spcialBtn').css({'display':'block'});
	}
	if($(window).width() < 420){	
			$('#spcialBtn').css({'display':'none'});
			}
			
// Resize window related --------------------- //
	$(window).resize(function()
	{	if($(window).width() > 978){	
			$('#logoM').css({'display':'none'});
			$('#header').css({'display':'block'});
		}
		if($(window).width() < 977){	
			$('#logoM').css({'display':'block'});
			$('#header').css({'display':'none'});
		}
		
		if($(window).width() > 420){	
			ul.css({'display':'block'});
			$('#spcialBtn').css({'display':'block'});
			}
		if($(window).width() > 200){
			$('#spcialBtn').css({'display':'none'});
			ul.css({'display':'block'});			
		}
		if($(window).width() < 200){
			$('#spcialBtn').css({'display':'none'});
			ul.css({'display':'none'});
			fix_position();
		}
	});

});
