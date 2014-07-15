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
	
	
	//adding another image upload option
	$(document).on('click', '#add_img', function(){ 
		//getting child of image section
		var length = $('#gal_img').children().length;
		var next_child = parseInt(length) + 1;
		var appending_text = '<div class="form-group"><label class="col-md-6 control-label label-form">Gallary Pic </label><div class="col-md-6"><input type="file" name="file[]"><span class="delete_img_upload">(-)Delete</span></div></div>';
		$('#gal_img').append(appending_text);
	});
	
	//deleting image link
	$(document).on('click', '.delete_img_upload', function(){ 
		//deleting the form group
		$(this).parent().parent().replaceWith('');
	});
    
    
    
});
