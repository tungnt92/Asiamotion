<?php

/**
* @copyright	Copyright (C) 2012 JoomSpirit. All rights reserved.
* Slideshow based on the JQuery script Flexslider
* @license		GNU General Public License version 2 or later
*/

defined('_JEXEC') or die;


require_once(dirname(__FILE__).'/helper.php');

$article_Id1 =  $params->get( 'article_id1' );

$ourTourContent1 = mod_our_tour_contentHelper::getOurTourContentId( $article_Id1 );

require(JModuleHelper::getLayoutPath('mod_our_tour_content'));