// Image Flick
var imgWallLoop = "";
    $(window).load(function() {
        $(".nav_logo").addClass("logo_loaded");
        $("#logo_img_loader").hide();
        $(".nav_logo #img_wall img").show();
        $("#hero").live("mouseenter", function() {
            $(".nav_logo #img_wall").css("visibility", "visible");
            imgWallLoop = setInterval(imgWall, 75);
        });
        $("#hero").live("mouseleave", function() {
            clearInterval(imgWallLoop);
            imgWallLoop = "";
            $(".nav_logo #img_wall").css("visibility", "visible");
        });
    });
    
    function imgWall() {
        $(".nav_logo #img_wall .wall_img:first").show().next(".wall_img").hide().end().appendTo(".nav_logo #img_wall");
    }

$(document).ready(function(){
	// Validates contact form client side
	$("#contactForm, #screenerForm").validate();
	
	// FitVid for blog and portfolio items
	$(".post, .images").fitVids();	
	
	// Mobile navigation show/hide
	$("#nav-sub-link").click(function () {
		$("#nav-sub").fadeToggle(400);
	});
	
	// Content Switcher
	$(function(){
	 
	    function contentSwitcher(settings){
	        var settings = {
	           contentClass : '.home_content',
	           navigationId : '.icons'
	        };
	 
	        //Hide all of the content except the first one on the nav
	        $(settings.contentClass).not(':first').hide();
	        $(settings.navigationId).find('.icon:first').addClass('active');
	 
	        //onClick set the active state, 
	        //hide the content panels and show the correct one
	        $(settings.navigationId).find('a').click(function(e){
	            var contentToShow = $(this).attr('href');
	            contentToShow = $(contentToShow);
	 
	            //dissable normal link behaviour
	            e.preventDefault();
	 
	            //set the proper active class for active state css
	            $(settings.navigationId).find('.icon').removeClass('active');
	            $(this).parent('.icon').addClass('active');
	 
	            //hide the old content and show the new
	            $(settings.contentClass).hide();
	            contentToShow.fadeIn('slow');
	        });
	    }
	    contentSwitcher();
	});
});

// Screen-hover funtion
(function($) {
    $(function() {
        $('.p-item').hover(
            function(){
                $(this).find('.screen-hover').animate({
                    opacity: 1
                }, 200);
            },
            function(){
                $(this).find('.screen-hover').animate({
                    opacity: 0
                }, 200);
            }
        );
    })
})(jQuery)