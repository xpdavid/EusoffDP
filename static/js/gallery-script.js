$(document).ready(function(){
	
	var slideShow = $('#slideShow'),
		ul = slideShow.find('ul'),
		li = ul.find('li'),
		cnt = li.length;

	// As the images are positioned absolutely, the last image will be shown on top.
	// This is why we force them in the correct order by assigning z-indexes:
	
	updateZindex();

	updateImageDimension($(ul.find('li')[0]).find("img"));
		
		// Fallback for Internet Explorer and older browsers
		
	slideShow.bind('showNext',function(){
		$('li:first').fadeOut(800, function(){
			$(this).remove().appendTo(ul).show();

			updateImageDimension($($(this).siblings()[0]).find("img"));

			updateZindex();
				
		});
	});
		
	slideShow.bind('showPrevious',function(){
		var liLast = $('li:last').hide().remove().prependTo(ul);

		updateImageDimension($($('li:last').siblings()[0]).find("img"));
		
		updateZindex();

		liLast.fadeIn(800);
	});
	// }
	
	// Listening for clicks on the arrows, and
	// triggering the appropriate event.
	
	$('#previousLink').click(function(){
		if(slideShow.is(':animated')){
			return false;
		}
		
		slideShow.trigger('showPrevious');
		return false;
	});
	
	$('#nextLink').click(function(){
		if(slideShow.is(':animated')){
			return false;
		}
		
		slideShow.trigger('showNext');
		return false;
	});
	
	// This function updates the z-index properties.
	function updateZindex(){
		
		// The CSS method can take a function as its second argument.
		// i is the zero-based index of the element.
		
		ul.find('li').css('z-index',function(i){
			return cnt-i;
		});
	}

	function updateImageDimension(screenImage){
		// constant
		var slideshow_width = 867

		var theImage = new Image();
		theImage.src = screenImage.attr("src");

		// Get accurate measurements from that.
		var imageWidth = theImage.width;
		var imageHeight = theImage.height;
		
		// caculate new image height according to the ratio
		var new_image_height = parseInt((imageHeight / imageWidth) * slideshow_width);

		slideShow.animate({
    		height: new_image_height + "px"
  		}, 800, function() {
    		// Animation complete.
  		});

		//slideShow.css("height", new_image_height + "px")

		$("#slideShowContainer").animate({
    		height: new_image_height + "px"
  		}, 800, function() {
    		// Animation complete.
  		});

		//$("#slideShowContainer").css("height", new_image_height  + "px")


	}

});