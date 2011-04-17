<?php

/**
 * Danish (Denmark) language pack
 * @package modules: slideshow
 * @subpackage i18n
 */

i18n::include_locale_file('modules: slideshow', 'en_US');

global $lang;

if(array_key_exists('da_DK', $lang) && is_array($lang['da_DK'])) {
	$lang['da_DK'] = array_merge($lang['en_US'], $lang['da_DK']);
} else {
	$lang['da_DK'] = $lang['en_US'];
}
$lang['da_DK']['Slideshow']['EFFECT'] = 'Effekt';
$lang['da_DK']['Slideshow']['SLIDEDURATIOM'] = 'Varighed som slides bliver vist (millisekunder)';
$lang['da_DK']['Slideshow']['TRANSITIONDURATION'] = 'Varighed af effekt (millisekunder)';
$lang['da_DK']['Slideshow']['TRANSITIONDURATIONONUSEREVENT'] = 'Varighed af effekt ved brugerinteraktion (millisekunder)';
$lang['da_DK']['Slideshow']['SLIDEBUTTONS'] = 'Vis links til slides';
$lang['da_DK']['Slideshow']['SHOWTHUMBNAILS'] = 'Vis små billeder i sted for tal som links til slides';
$lang['da_DK']['Slideshow']['PAUSEONHOVER'] = 'Stop når cursor er over slideshowet';
$lang['da_DK']['Slideshow']['NEXTPREVBUTTONS'] = 'Vis næste/forrige-links';
$lang['da_DK']['Slideshow']['SLIDENUMBERDISPLAY'] = 'Vis slidenumre';
$lang['da_DK']['Slideshow']['LOOP'] = 'Gentag slideshow';
$lang['da_DK']['Slideshow']['SLIDEHEIGHT'] = 'Højde på slides';
$lang['da_DK']['Slideshow']['SLIDEWIDTH'] = 'Bredde på slides';


$lang['da_DK']['SlideshowSlide']['TITLE'] = 'Titel';
$lang['da_DK']['SlideshowSlide']['CONTENT'] = 'Tekst';
$lang['da_DK']['SlideshowSlide']['IMAGE'] = 'Billede';
$lang['da_DK']['SlideshowSlide']['LINK'] = 'Link til side';

$lang['da_DK']['SlideshowSlide']['CONTENT'] = 'Indhold';
$lang['da_DK']['SlideshowSlide']['SLIDEWIDTH'] = 'Bredde på slides';
$lang['da_DK']['SlideshowSlide']['SLIDEWIDTH'] = 'Bredde på slides';
$lang['da_DK']['SlideshowSlide']['SLIDEWIDTH'] = 'Bredde på slides';

?>