# Installing and configuring the SilverStripe Slideshow Module

## Installation

1. Install DataObjectManager < http://silverstripe.org/dataobjectmanager-module/ > and Uploadify < http://silverstripe.org/uploadify-module/ >

1. Put the slideshow folder inside your project

2. To enable the slideshow on all pages, add the following to your mysite/_config.php file:

DataObject::add_extension('Page', 'Slideshow');

To enable the slideshow on specific pages, for example your home page, add the following to your mysite/_config.php file:

DataObject::add_extension('HomePage', 'Slideshow');


3. Build the database (e.g. http://localhost/mysite/dev/build)

4. Add <% include Slideshow %> to your template

## Configuration options

To override the default effects with your own, customize this and add it to your mysite/_config.php file:

Slideshow::set_custom_effects(
	array(
		'None' => 'data-cycle-fx="none"',
		'Fade' => 'data-cycle-fx="fade"',
		'Fade in / out' => 'data-cycle-fx="fade" data-cycle-sync="false"',
		'Scroll horizontal' => 'data-cycle-fx="scrollHorz" data-cycle-easing="easeOutQuart"',
		'Scroll horizontal with bounce' => 'data-cycle-fx="scrollHorz" data-cycle-easing="easeOutBounce"',
		'Scroll horizontal with elastic' => 'data-cycle-fx="scrollHorz" data-cycle-easing="easeOutElastic"'
	)
);

The syntax of the array fed to set_custom_effects() is as follows:
array( [title of effect] => [JQuery Cycle effect setting] );


