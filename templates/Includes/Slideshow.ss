<% if SlideshowSlides %>
<div id="SlideshowContainer">
	<div id="Slideshow">
		<div id="SlideshowSlides">
		<% control SlideshowSlides %>
			<% if Content %>
			<div class="slide" <% if First != 1 %>style="display:none"<% end_if %>>
			<% end_if %>
				<% control SlideImage.SetWidth(700) %>
				<img src="$URL" width="$Width" height="$Height" alt="" <% if PageLink %> onclick="location.href='$PageLink.URLSegment'" style="cursor:pointer"<% end_if %> />
				<% end_control %> 
			<% if Content %>
				<div class="content"><span class="description">$Content</span></div>
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