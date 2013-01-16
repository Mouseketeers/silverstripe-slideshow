<?php

/**
 * French (France) language pack
 * @package modules: slideshow
 * @subpackage i18n
 */

i18n::include_locale_file('modules: slideshow', 'en_US');

global $lang;

if(array_key_exists('fr_FR', $lang) && is_array($lang['fr_FR'])) {
	$lang['fr_FR'] = array_merge($lang['en_US'], $lang['fr_FR']);
} else {
	$lang['fr_FR'] = $lang['en_US'];
}
$lang['fr_FR']['Slideshow']['EFFECT'] = 'Effet de transition';
$lang['fr_FR']['Slideshow']['SLIDEDURATIOM'] = 'Durée de chaque image (en millisecondes)';
$lang['fr_FR']['Slideshow']['TRANSITIONDURATION'] = 'Durée de la transition (en millisecondes)';
$lang['fr_FR']['Slideshow']['TRANSITIONDURATIONONUSEREVENT'] = 'Durée de la transition quand declenchée par l&apos;utilisateur (en millisecondes)';
$lang['fr_FR']['Slideshow']['SLIDEBUTTONS'] = 'Afficher des liens vers les images';
$lang['fr_FR']['Slideshow']['SHOWTHUMBNAILS'] = 'Afficher des miniatures des images';
$lang['fr_FR']['Slideshow']['PAUSEONHOVER'] = 'Interrompre le défilement en survolant avec la souris';
$lang['fr_FR']['Slideshow']['NEXTPREVBUTTONS'] = 'Afficher les boutons Suivant/Précédent';
$lang['fr_FR']['Slideshow']['SLIDENUMBERDISPLAY'] = 'Afficher le numéro de l&apos;image';
$lang['fr_FR']['Slideshow']['LOOP'] = 'Faire défiler les images';
$lang['fr_FR']['Slideshow']['SLIDEHEIGHT'] = 'Hauteur des images';
$lang['fr_FR']['Slideshow']['SLIDEWIDTH'] = 'Largeur des images';
$lang['fr_FR']['Slideshow']['UPDATE'] = 'Mettre à jour les diaporamas';
$lang['fr_FR']['Slideshow']['UPDATEPAGEONLY'] = 'Dans cette page uniquement';
$lang['fr_FR']['Slideshow']['UPDATESECTION'] = 'Dans cette section';
$lang['fr_FR']['Slideshow']['UPDATEALL'] = 'Tous';
$lang['fr_FR']['Slideshow']['SLIDESHOWTABTITLE'] = 'Diaporama';
$lang['fr_FR']['Slideshow']['SETTINGSTABTITLE'] = 'Configuration';
$lang['fr_FR']['Slideshow']['SLIDESTABTITLE'] = 'Images';


$lang['fr_FR']['SlideshowSlide']['TITLE'] = 'Titre';
$lang['fr_FR']['SlideshowSlide']['CONTENT'] = 'Description';
$lang['fr_FR']['SlideshowSlide']['IMAGE'] = 'Image';
$lang['fr_FR']['SlideshowSlide']['LINK'] = 'Lien vers la page';

$lang['fr_FR']['SlideshowSlide']['EMPTYSTRING'] = '-- Aucune --';
$lang['fr_FR']['SlideshowSlide']['SLIDEHEIGHT'] = 'Hauteur des images';
$lang['fr_FR']['SlideshowSlide']['SLIDEWIDTH'] = 'Largeur des images';

?>