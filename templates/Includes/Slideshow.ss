<% if SlideshowSlides %>
<div id="SlideshowContainer">
	<div id="Slideshow">
		<div id="SlideshowSlides">
		<% control SlideshowSlides %>
			<% if Content %>
			<div id="Slide{$Pos}" class="slide">
			<% end_if %>
				<% control SlideImage.SetWidth(600) %>
				<img id="SlideImage{$Pos}" src="$URL" width="$Width" height="$Height" alt="$Content" 
				<% end_control %> 
				<% if Link %>onclick="location.href='$Link.URLSegment'" style="cursor:pointer" <% end_if %>
				/>
			<% if Content %>
				<div class="content typography"><span class="description">$Content</span></div>
			</div>
			<% end_if %>
		<% end_control %>
		</div>
		<% if MoreThanOneSlide %>
		<div id="SlideshowControls">
			<% if NextPrevButtons %>
			<span id="PrevButton"><span><</span></span>
			<% end_if %>
			<% if SlideButtons %>
			<span id="SlideButtons">
				<% control SlideshowSlides %>
				<span class="slideButton"><% if Top.ShowThumbnails %>$SlideImage.SetWidth(80)<% else %><span>$Pos</span><% end_if %></span>
				<% end_control %>
			</span>
			<% end_if %>
			<% if NextPrevButtons %>
			<span id="NextButton"><span>></span></span>
			<% end_if %>
		</div>
		<% end_if %>
	</div>
</div>
<% end_if %>