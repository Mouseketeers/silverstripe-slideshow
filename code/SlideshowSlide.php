<?php
class SlideshowSlide extends DataObject
{
    public static $db = array(
        'Title' => 'Varchar(255)',
        'Content' => 'HTMLText'
    );
    public static $has_one = array(
        'Page' => 'Page',
        'SlideImage' => 'Image',
        'Link' => 'SiteTree'
    );
    public function canDelete()
    {
        return Permission::check('CMS_ACCESS_CMSMain');
    }
    public function getCMSFields_forPopup()
    {
        $fields = new FieldSet();
        $fields->push(new TextField('Title', _t('SlideshowSlide.TITLE', 'Title'), 'Title'));
        $fields->push(new ImageUploadField('SlideImage', _t('SlideshowSlide.IMAGE', 'Image')));
        if (Slideshow::$enableHTMLContentEditor) {
            $fields->push(new SimpleTinyMCEField('Content', _t('SlideshowSlide.CONTENT', 'Text'), 'Text'));
        } else {
            $fields->push(new TextareaField('Content', _t('SlideshowSlide.CONTENT', 'Text'), 'Text'));
        }
        $PageDropDown = new SimpleTreeDropdownField('LinkID', _t('SlideshowSlide.LINK', 'Link to page'));
        $PageDropDown->setEmptyString(_t('SlideshowSlide.EMPTYSTRING', '-- None --'));
        $fields->push($PageDropDown);
        $fields->push(new LiteralField('DOM-fix', '<div style="height:35px">&nbsp;</div>'));
        return $fields;
    }
}
