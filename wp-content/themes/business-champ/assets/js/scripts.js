jQuery(document).ready(function($){


	//Mobile menu accordian
	var winWidth = $(window).width();

	if(winWidth < 1021){
		$('.menu-main').addClass('is_mobile--menu');
		$('.menu-item-has-children a').off().on('click', function(e){
			e.preventDefault();
			$(this).siblings('.sub-menu').slideToggle(400);
		})
	}
	else{
		$('.menu-main').removeClass('is_mobile--menu');
	}

homeHeight();


    $(".do-scrol").click(function(e){
        e.preventDefault();
        var target = $(this).attr('href');
        var scrolltop = $(target).offset().top;
        $('html, body').animate({scrollTop: scrolltop }, 1500 );
    });

 

//Fixed footer
function fixFooter(){
    if($('#footer').hasClass('fixed-footer')){
        var spaceBtm = $('.fixed-footer').outerHeight();
        $('.bc-body-wrapp').addClass('keepSpace');
        $('.keepSpace').css({
            'margin-bottom': spaceBtm - 24 + 'px'
        })
    }
}

fixFooter();


//===================================================

//Menu trigger====================
$('.mobile-menu').on('click', function(){
    $(this).toggleClass('collapse-menu')
    $('.menu-main').slideToggle(400);
});

//If no banner

if($('.bc-body-wrapp').hasClass('no-banner')){
    var hdrHeight = $('.business-champ-header').outerHeight() + 'px';
    $('.business-champ-header + section, .business-champ-header + div').css({
        'paddingTop': hdrHeight
    });
}

//full width youtube video
$(function(){
    $('.bc-site-static-banner iframe').css({ width: $(window).innerWidth() + 'px', height: $(window).innerHeight() + 'px' });
  
    $(window).resize(function(){
      $('.bc-site-static-banner iframe').css({ width: $(window).innerWidth() + 'px', height: $(window).innerHeight() + 'px' });
    });
  });




$(window).resize(function(){
    homeHeight();
    $(window).trigger('resize.px.parallax');
    

});


/*-----------------------------------------------------------------------------------*/
/*  MENU
/*-----------------------------------------------------------------------------------*/
function calculateScroll() {
    var contentTop      =   [];
    var contentBottom   =   [];
    var winTop      =   $(window).scrollTop();
    var rangeTop    =   200;
    var rangeBottom =   500;
    $('.navmenu').find('.scroll_btn a').each(function(){
        contentTop.push( $( $(this).attr('href') ).offset().top );
        contentBottom.push( $( $(this).attr('href') ).offset().top + $( $(this).attr('href') ).height() );
    })
    $.each( contentTop, function(i){
        if ( winTop > contentTop[i] - rangeTop && winTop < contentBottom[i] - rangeBottom ){
            $('.navmenu li.scroll_btn')
            .removeClass('active')
            .eq(i).addClass('active');
        }
    })
};

jQuery(document).ready(function() {
    //MobileMenu
    if ($(window).width() < 768){
        jQuery('.menu_block .container').prepend('<a href="javascript:void(0)" class="menu_toggler"><span class="fa fa-align-justify"></span></a>');
        jQuery('header .navmenu').hide();
        jQuery('.menu_toggler, .navmenu ul li a').click(function(){
            jQuery('header .navmenu').slideToggle(300);
        });
    }

    // if single_page
    if (jQuery("#page").hasClass("single_page")) {
    }
    else {
        $(window).scroll(function(event) {
            calculateScroll();
        });
        $('.navmenu ul li a, .mobile_menu ul li a, .btn_down').click(function() {
            $('html, body').animate({scrollTop: $(this.hash).offset().top - 80}, 1000);
            return false;
        });
    };
});



// utility functions 
function homeHeight(){
    var wh = jQuery(window).height() - 0;
    var ww = jQuery(window).width();
    var hh = jQuery('#siteHeader').height();
    hh = hh-25;
    if( ww > 767 ){
         jQuery('.top_slider, .top_slider .slides li').css('height', wh);
     }else{
        jQuery('.top_slider, .top_slider .slides li').css({'height':'350px' , 'margin-top':hh+'px'});
     }
   
}

});


