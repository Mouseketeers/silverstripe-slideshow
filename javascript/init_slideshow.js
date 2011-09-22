;(function($) {
	$(document).ready(function() {
		slideshowSettings = { $Settings };
		slideshow = $('#SlideshowSlides').cycle(slideshowSettings);
		$("#SlideshowSlides").touchwipe({
		     wipeLeft: function() { 
		     	$('#SlideshowSlides').cycle('next');
		     },
		     wipeRight: function() {
		     	$('#SlideshowSlides').cycle('prev'); 
		     },
		     wipeDown: function() { 
		     	$('#SlideshowSlides').cycle('next');
		     },
		     wipeUp: function() {
		     	$('#SlideshowSlides').cycle('prev'); 
		     },
		     min_move_x: 70,
		     min_move_y: 70,
		     preventDefaultEvents: true   
		});
	});
	function onAfter(curr, next, opts){
		$('#CurrentSlideNumber').html(opts.currSlide + 1);
	}
})(jQuery);

