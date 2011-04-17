<?php
class SlideshowSlide extends DataObject {
	static $db = array(
   		'Content' => 'HTMLText'
	);
	static $has_one = array (
		'Page' => 'Page',
		'SlideImage' => 'Image',
		'Link' => 'SiteTree'
	);
	function getCMSFields_forPopup() {
		$fields = new FieldSet();
		$fields->push(new ImageField('SlideImage', _t('SlideshowSlide.IMAGE','Image')));
		$fields->push(new SimpleTinyMCEField('Content', _t('SlideshowSlide.CONTENT','Text'), 'Text'));
		$PageDropDown = new SimpleTreeDropdownField('LinkID', 'Link to page');
		$PageDropDown->setEmptyString('-- None --');
		$fields->push($PageDropDown);
   		return $fields;
	}
}