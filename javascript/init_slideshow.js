;(function($) {
	$(document).ready(function() {
		$('#SlideshowSlides').cycle({
			$Settings
		});
	});
	function onAfter(curr, next, opts){
		$('#CurrentSlideNumber').html(opts.currSlide + 1);
	}
})(jQuery);