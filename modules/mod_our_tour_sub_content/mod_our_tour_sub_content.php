<?php

/**
* @copyright	Copyright (C) 2012 JoomSpirit. All rights reserved.
* Slideshow based on the JQuery script Flexslider
* @license		GNU General Public License version 2 or later
*/

defined('_JEXEC') or die;


require_once(dirname(__FILE__).'/helper.php');


$item = mod_our_tour_sub_contentHelper::getArticleById( 9 );

$contactus = $params->get( 'contact' );

require(JModuleHelper::getLayoutPath('mod_our_tour_sub_content'));