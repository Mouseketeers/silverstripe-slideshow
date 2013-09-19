<%-- require javascript(sapphire/thirdparty/jquery/jquery-packed.js) --%>
<% require javascript(slideshow/javascript/jquery.cycle2.min.js) %>
<% require javascript(slideshow/javascript/jquery.cycle2.caption2.min.js) %>
<% require javascript(slideshow/javascript/jquery.easing.1.3.js) %>
<div class="cycle-slideshow" 
	$Settings
	data-cycle-prev=".prev"
	data-cycle-next=".next"
	data-cycle-caption-plugin=caption2
	data-cycle-pager=".pager > .cycle-pager"
	data-cycle-pager-template="<a href=#> {{slideNum}} </a>"
	data-cycle-pager-active-class="active"
	>
	<% control SlideshowSlides %>
		<% control SlideImage %>
		<img id="slide-image-{$Pos}" src="$URL"
		<% end_control %>
			<% if Title %>data-cycle-title="$Title"<% end_if %>
			<% if Content %>data-cycle-desc="$Content.XML"<% end_if %>
		/>
	<% end_control %>
	<div class="cycle-overlay"></div>
	<div class="large-12 columns pager" style="text-align:center"><a href=# class="prev"><</a><span class="cycle-pager"></span><a href=# class="next">></a></div>
</div>