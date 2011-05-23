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
	function canDelete() {
		return Permission::check('CMS_ACCESS_CMSMain');
	}
	function getCMSFields_forPopup() {
		$fields = new FieldSet();
		$fields->push(new ImageUploadField('SlideImage', _t('SlideshowSlide.IMAGE','Image')));
		if (Slideshow::$enableHTMLContentEditor) {
			$fields->push(new SimpleTinyMCEField('Content', _t('SlideshowSlide.CONTENT','Text'), 'Text'));
		}
		else {
			$fields->push(new TextareaField('Content', _t('SlideshowSlide.CONTENT','Text'), 'Text'));
		}
		$PageDropDown = new SimpleTreeDropdownField('LinkID', 'Link to page');
		$PageDropDown->setEmptyString('-- None --');
		$fields->push($PageDropDown);
   		return $fields;
	}
}