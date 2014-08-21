(function($){

	var event_type;
	var url = document.location.toString();
	
	if (Modernizr.touch){
	
	 event_type = 'touchstart';
	  
	} else {
	 
	 event_type = 'click';	
	 
	}

	var service_select = $('select#service-select');
	var service_area_select = $('select.service-area-select');
						
	service_select.easyDropDown({
	wrapperClass: 'dropdown service-dropdown',
	onChange: function(selected){
		var val = selected.value;
		var selected_id = "#"+selected.value.toLowerCase().split(' ').join('-')+"-select";
		selected_id.replace(/ /g, "-");
		//console.log(selected_id);
		
		if ( $("input[name='service']") ) {
			$("input[name='service']").val(val);
		}
		
		if ($('.service-area-dropdown').is(':visible')) {
			$('.service-area-dropdown').hide();
		}

		$(selected_id).closest('.service-area-dropdown').show();
	}
	});
	
	service_area_select.easyDropDown({
	wrapperClass: 'dropdown service-area-dropdown',
	onChange: function(selected){
		//console.log(selected);
		var val = selected.value;
		
		if ( $("input[name='service-area']") ) {
			$("input[name='service-area']").val(val);
		}
		
	}
	});
	
	$('.service-area-dropdown').hide();
	
	/* MAIN MENU HOVER */
	
	$('#main-nav').not('.nav-open').on('mouseover', 'li.with-sub-nav', function(){
   	 	$(this).addClass('sub-hover');
	});
	
	$('#main-nav').not('.nav-open').on('mouseout', 'li.with-sub-nav' , function(){
	    $(this).removeClass('sub-hover');
	});
	
	$('body').on(event_type,'button#nav-btn', function(e){
	
		if ( $('#main-nav').hasClass('nav-closed') ) {
			$(this).removeClass('in-active').addClass('active');
			$('.nav-closed').removeClass('nav-closed').addClass('nav-open');
		} else {
			$(this).removeClass('active').addClass('in-active');
			$('.nav-open').removeClass('nav-open').addClass('nav-closed');
		}
		
		return false;
		
	});
	
	var window_width = $(window).width(); 
	
	if (window_width > 760) {
	
	// Touch events
	$('#main-nav').not('.nav-open').on('touchend', 'li.with-sub-nav > a', function(e){
	  
	  $(this).parent().siblings().removeClass('sub-hover');
	  
	  if ( !$(this).parent().hasClass('sub-hover')) {
	  $(this).parent().toggleClass('sub-hover'); 
	  return false; 
	  }
	  
	  if ( $(this).parent().hasClass('not-link')) {
	  $(this).parent().toggleClass('sub-hover'); 
	  return false; 
	  } 	   
	   
	});
	
	}
	
	$('body').on(event_type,'button#user-btn', function(e){
	
		if ( $(this).parent().hasClass('closed') ) {
			$(this).parent().removeClass('closed').addClass('open');
		} else {
			$(this).parent().removeClass('open').addClass('closed');
		}
		
		return false;
		
	});
	
	$('body').on('click', "li.services > a", function(){
	return false;	
	});
	
	if (event_type == "touchstart") {
		$('ul.tab-links a[data-toggle="tab"]').on("touchend", function (e) {
			
			 $('html,body').animate({scrollTop: $(".tab-content").offset().top},'slow');
			
			$(this).tab('show');
		});
	} else {
		
		$('ul.tab-links a[data-toggle="tab"]').on("click", function (e) {
			
			 $('html,body').animate({scrollTop: $(".tab-content").offset().top},'slow');
			
			$(this).tab('show');
		});
	}
	
	 /* FEED SCROLLER 
	   
	Adds new styled scroll bars to media feeds   
   */
   	
	$('.feed-wrap').slimScroll({
        height: '300px'
    });
    
    $('#directions-panel').slimScroll({
        height: '300px',
       alwaysVisible: true
    });
    
    /* ACCESSABILITY FUNCTIONS 
	    
	    Button actions to control the text size
    */
    
    $('body').on(event_type,'button.access-btn', function(e){
    
    	var txt_size = $(this).attr('data-role');
    	
    	$(this).siblings().removeClass('active');
    	$(this).addClass('active');
    	
    	 $('body').removeClass('txt-md txt-lg txt-sm').addClass(txt_size);
    	 $.cookie('font_size', txt_size, { path: '/' } );  
	     	     			
		return false;
		
	});


	
	$(document).ready(function (){
	
	$('#feedback-carousel').carousel({
		pause: false,
		interval: 7000
	});
	
		if ($('#enqiry-start-form')) {
		
		$('#enqiry-start-form').show();	
			
		}
	
	});
	
	$(window).on("resize", function(e){
	
	if ($('#main-nav').hasClass('nav-open')) {
		$('button#nav-btn').trigger(event_type);
	}

	});
	
	
})(window.jQuery);