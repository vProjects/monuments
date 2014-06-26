$(document).ready(function(){
    $(".img-bx").hover(
        function(){
        	$(this).parent().children('.txt-bx').slideDown();
        },
        function(){
        	$(this).parent().children('.txt-bx').slideUp('fast');
    });
});

$(document).ready(function(){
    $(".img-abt").hover(
        function(){
        	$(this).parent().children('.sld-lnk').slideDown();
        },
        function(){
        	$(this).parent().children('.sld-lnk').slideUp('fast');
    });
    
    jQuery('.fade-in-right').addClass("hidden").viewportChecker({
	    classToAdd: 'visible animated fadeInRight', // Class to add to the elements when they are visible
	    offset: 60  
	   });
	      
   jQuery('.fade-in-left').addClass("hidden").viewportChecker({
    classToAdd: 'visible animated fadeInLeft', // Class to add to the elements when they are visible
    offset: 60    
   }); 
	
    
    
    
});
