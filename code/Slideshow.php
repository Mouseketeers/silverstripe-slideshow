<?php
class Slideshow extends DataObjectDecorator {
	// A few default effects. Can be overridden through set_custom_effects()
	private static $effects = array(
		'None' => "fx:'none'",
		'Fade over' => "fx:'fade'",
		'Fade in / out' => "sync:0,fx:'fade'",
		'Scroll horizontal' => "fx:'scrollHorz',easing:'easeOutQuart'",
		'Scroll vertical' => "fx:'scrollVert',easing:'easeOutQuart'",
		'Scroll horizontal with bounce' => "fx:'scrollHorz',easing:'easeOutBounce'",
		'Scroll vertical with bounce' => "fx:'scrollVert',easing:'easeOutBounce'",
		'Scroll horizontal elastic' => "fx:'scrollHorz',easing:'easeOutElastic'",
		'Scroll vertical elastic' => "fx:'scrollVert',easing:'easeOutElastic'"
	);
	public static $enableHTMLContentEditor = true;
	public static $slideshow_js_file = 'slideshow/javascript/init_slideshow.js';
	public function index() {
		Requirements::themedCSS('slideshow');
		//include js only if there is more than one slide 
		if($this->owner->MoreThanOneSlide()) {
			Requirements::javascript(SAPPHIRE_DIR.'/jquery/jquery-packed.js'); // for backward compality with SilverStripe 2.3 versions
			Requirements::javascript(SAPPHIRE_DIR.'/thirdparty/jquery/jquery-packed.js'); // for backward compality with SilverStripe 2.4 prior to 2.4.4
			Requirements::javascript(SAPPHIRE_DIR.'/thirdparty/jquery/jquery.min.js');
			Requirements::javascript('slideshow/javascript/jquery.cycle.all.min.js');
			Requirements::javascript('slideshow/javascript/jquery.easing.1.2.js');
			Requirements::javascript('slideshow/javascript/jquery.touchwipe.min.js');
			Requirements::javascriptTemplate(self::$slideshow_js_file, array(
				'Settings' => $this->owner->Settings(),
				'ClassName' => $this->owner->ClassName
			));
		}
		return array();
	}
	function extraStatics() {
		return array(
			'has_many' => array(
				'SlideshowSlides' => 'SlideshowSlide'
			),
			'has_one' => array(
			),
			'db' => array(
				'SlideEffect' => 'Text',
				'SlideDuration' => 'Float',
				'TransitionDuration' => 'Float',
				'TransitionDurationOnUserEvent' => 'Float',
				'AutoPlay' => 'Boolean',
				'Loop' => 'Boolean',
				'PauseOnHover' => 'Boolean',
				'NextPrevButtons' => 'Boolean',
				'SlideButtons' => 'Boolean',
				'ShowThumbnails' => 'Boolean'
			),
			'defaults' => array (
				'SlideEffect' => 'None',
				'SlideDuration' => 5000,
				'TransitionDuration' => 1000,
				'AutoPlay' => true,
				'PauseOnHover' => false,
				'Loop' => true,
				'TransitionDurationOnUserEvent' => 400,
				'NextPrevButtons' => true,
				'SlideButtons' => true
			)
		);
	}
	function updateCMSFields(&$fields){
		/*
		 * if this is a new page set defaults 
		 */
		if($this->owner->Version == 1) {
			$this->set_defaults();
		}
		
		$tabSlides = new Tab('Slides');
		$tabSlides->setTitle(_t('Slideshow.SLIDESTABTITLE','Slides'));
		$tabSettings = new Tab('Settings');
		$tabSettings->setTitle(_t('Slideshow.SETTINGSTABTITLE','Settings'));
		$tabSlideShow = new TabSet('SlideshowTabs', $tabSlides, $tabSettings);
		$tabSlideShow->setTitle(_t('Slideshow.SLIDESHOWTABTITLE','Slideshow'));
		
		$fields->addFieldToTab('Root.Content', $tabSlideShow);
		//$fields->addFieldToTab('Root.Content.Slideshow', new TabSet('SlideshowTabs', $tabSlides, $tabSettings));
		$image_manager = new ImageDataObjectManager (
			$this->owner,
			'SlideshowSlides',
			'SlideshowSlide',
			'SlideImage',
			array(),
			'getCMSFields_forPopup'
		);
		$image_manager->copyOnImport = false;
		$fields->addFieldToTab('Root.Content.SlideshowTabs.Slides',$image_manager);
		
		/*
		 * settings
		 */
		if (count(self::$effects) > 1) {
			$fields->addFieldToTab(
				'Root.Content.SlideshowTabs.Settings', new DropdownField(
					$name = 'SlideEffect',
					$title = _t('Slideshow.EFFECT', 'Slide effect'),
					$source = array_combine(
						array_keys(self::$effects),
						array_keys(self::$effects)
					)
				)
			);
		}
		else {
			$fields->addFieldToTab(
				'Root.Content.SlideshowTabs.Settings', new HiddenField(
					$name = 'SlideEffect',
					$title = 'Slide Effect',
					$value = key(self::$effects)
				)
			);
		}
		$fields->addFieldsToTab('Root.Content.SlideshowTabs.Settings', 
			array(
				new TextField(
		  			$name = 'SlideDuration',
		  			$title = _t('Slideshow.SLIDEDURATIOM', 'Duration of Each Slide (milliseconds)')
				),
				new TextField(
		  			$name = 'TransitionDuration',
		  			$title =  _t('Slideshow.TRANSITIONDURATION', 'Duration of Transition Between Slides (milliseconds)')
				),
				new TextField(
		  			$name = 'TransitionDurationOnUserEvent',
		  			$title = _t('Slideshow.TRANSITIONDURATIONONUSEREVENT', 'Duration of transition when invoked by users (milliseconds)')
				),
				new CheckboxField(
		  			$name = 'AutoPlay',
		  			$title = _t('Slideshow.AUTOPLAY', 'Start slideshow automatically')
				),
				new CheckboxField(
		  			$name = 'Loop',
		  			$title = _t('Slideshow.LOOP', 'Loop slides')
				),
				new CheckboxField(
		  			$name = 'PauseOnHover',
		  			$title = _t('Slideshow.PAUSEONHOVER', 'Pause the slideshow when the mouse hovers over it')
				),
				new CheckboxField(
		  			$name = 'NextPrevButtons',
		  			$title = _t('Slideshow.NEXTPREVBUTTONS', 'Show Next and Previous Buttons')
				),
				new CheckboxField(
		  			$name = 'SlideButtons',
		  			$title = _t('Slideshow.SLIDEBUTTONS', 'Show Links to Slides')
				),
				new CheckboxField(
		  			$name = 'ShowThumbnails',
		  			$title = _t('Slideshow.SHOWTHUMBNAILS', 'Show thumbnails of slide images')
				),
				new OptionsetField(
		  			$name = 'UpdateSlideshows',
		  			$title = _t('Slideshow.UPDATE','Update slideshows'),
		  			$source = array(
		  				'page' => _t('Slideshow.UPDATEPAGEONLY','Apply to this page only'),
		  				'section' => _t('Slideshow.UPDATESECTION','Apply to all slideshows in this section'),
		  				'site' => _t('Slideshow.UPDATEALL','Apply to all slideshows on this site')
		  			),
		  			$value = 'page'
				)
			)
		);
	}
	/*
	 * set slideshow settings to equal the latest saved of the same type
	 */
	public function set_defaults() {
		$page = DataObject::get_one(
			$caller_class = $this->owner->ClassName,
			$where = '`'.$this->owner->ClassName.'`.`ID` <> '.$this->owner->ID,
			$cache = '',
			$sort = 'LastEdited DESC'
		);
		$slideshow_statics = $this->extraStatics();
		$sildeshow_db_fields = $slideshow_statics['db'];
		if($page) {
			foreach($sildeshow_db_fields as $key => $value) {
				$this->owner->{$key} = $page->{$key};
			}
		}
	}
	static $has_written = false;
	function onAfterWrite() {
		if(!self::$has_written) {
			self::$has_written = true;
			if(isset($_POST['UpdateSlideshows']) && $_POST['UpdateSlideshows'] != 'page') {
				$this->update_other_slideshows($_POST);
			}
		}
	}

	/*
	 *  Updates other slideshows with the current settings
	 */
	private function update_other_slideshows($data) {
		$filter = '`SiteTree`.`ID` <> '.$this->owner->ID;
		if($data['UpdateSlideshows'] == 'section') $filter .=  ' AND ParentID = '.$this->owner->ParentID;
		$pages_to_be_updated = DataObject::get('SiteTree',$filter);
		
		$slideshow_statics = $this->extraStatics();
		$sildeshow_db_fields = $slideshow_statics['db'];
		foreach($pages_to_be_updated as $page) {
			if($page->hasExtension('Slideshow')) {
				foreach($sildeshow_db_fields as $key => $value) {
					if(isset($_POST[$key])) {
						$page->{$key} = $data[$key];
					}
				}
				$page->writeToStage('Stage');
				if($page->Status == 'Published') $page->Publish('Stage', 'Live');
			}
		}
	}
	/*
	 * function for adding custom effects
	 */
	public function set_effects($effects) {
		self::$effects = $effects;
	}
	public function set_custom_effects($effects) {
		self::$effects = $effects;
	}
	/*
	 * returns jquery cycle settings outputted in init_slideshow.js
	 */
	public function Settings() {
		$settings[] = ($this->owner->AutoPlay && $this->owner->SlideDuration) ? 'timeout: '.$this->owner->SlideDuration : 'timeout:0';
		$settings[] = ($this->owner->TransitionDuration) ? 'speed:'.$this->owner->TransitionDuration : 'speed:0';
		if ($this->owner->TransitionDurationOnUserEvent) $settings[] = 'fastOnEvent:'.$this->owner->TransitionDurationOnUserEvent;				
		if ($this->owner->PauseOnHover) $settings[] = 'pauseOnPagerHover:1';
		if (!$this->owner->Loop) $settings[] = 'nowrap:1';
		if($this->owner->NextPrevButtons || $this->owner->SlideButtons) $settings[] = 'pagerAnchorBuilder: function(idx, slide) { return \'.slideButton:eq(\' + idx + \')\' }';
		if ($this->owner->NextPrevButtons) $settings[] = 'prev:\'#PrevButton\',next:\'#NextButton\',pager:\'#SlideButtons\'';
		if ($this->owner->SlideButtons) $settings[] = 'pager:\'#SlideButtons\'';		
		if ($this->owner->SlideEffect) $settings[] = self::$effects[$this->owner->SlideEffect];
		$settings_string =  implode(',', $settings);
		return $settings_string;
	}
	public function MoreThanOneSlide() {
		return ($this->owner->SlideshowSlides()->Count() > 1);
	}
	public function FirstSlide() {
		return DataObject::get_one('SlideshowSlide','PageID ='.$this->owner->ID,'SortOrder');
	}
}