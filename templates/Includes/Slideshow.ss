<% if SlideshowSlides %>
<%-- require javascript(sapphire/thirdparty/jquery/jquery-packed.js) --%>
<% require javascript(slideshow/javascript/jquery.cycle2.min.js) %>
<% require javascript(slideshow/javascript/jquery.cycle2.caption2.min.js) %>
<% require javascript(slideshow/javascript/jquery.cycle2.swipe.min.js) %>
<% require javascript(slideshow/javascript/jquery.easing.1.3.js) %>
<div class="cycle-slideshow" 
	$Settings
	data-cycle-slides=".slide"
	data-cycle-prev=".prev"
	data-cycle-next=".next"
	data-cycle-caption-plugin=caption2
	data-cycle-pager=".pager"
	data-cycle-pager-template="<a href=#> {{slideNum}} </a>"
	data-cycle-overlay-template="<h3>{{title}}</h3><p>{{desc}}</p>"
	data-cycle-pager-active-class="active"
	data-cycle-swipe="true"
	>
	<div class="cycle-overlay"></div>
	<% control SlideshowSlides %>
		<% control SlideImage %>
		<img id="slide-image-{$Pos}" class="slide" src="$URL"
		<% end_control %>
			<% if Title %>data-title="$Title.XML"<% end_if %>
			<% if Content %>data-cycle-desc="$Content.XML"<% end_if %>
			<% if Link %>onclick="location.href='$Link.URLSegment'" style="cursor:pointer" <% end_if %>
		/>
	<% end_control %>
	<% if MoreThanOneSlide %>
	<div style="text-align:center"><a href=# class="prev"><</a><span class="pager"></span><a href=# class="next">></a></div>
	<% end_if %>
</div>
<% end_if %>