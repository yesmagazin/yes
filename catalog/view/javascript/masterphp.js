(function($) {
	$(document).ready(function(){
		var anchors = [];
		var currentAnchor = 1;
		var first = 1;
		var max = 5;
		var isAnimating  = true;
		$('body').animate({
		   scrollTop: 1
		}, function(){
		   var isAnimating  = false;
        $('body').on('wheel', function(e){
          if($('#openModal').hasClass('open')) {
          } else {
            if( isAnimating ) {
                return false;
            }
            isAnimating  = true;
            // Increase or reset current anchor
            if( e.originalEvent.wheelDelta >= 1 ) {
                currentAnchor--;
            } else{
                currentAnchor++;
            }
            if ( currentAnchor > max) {
                currentAnchor = max;
            }
            if ( currentAnchor < 1) {
                currentAnchor = 1;
            }
            console.log('CURRENT', currentAnchor);
            isAnimating  = true;

          $(document).scrollTo('[data-anchor="'+currentAnchor+'"]', 1000, {
          onAfter: function() {
            isAnimating  = false; 
          }});
        }  
      });
		});
	});

})(jQuery);

