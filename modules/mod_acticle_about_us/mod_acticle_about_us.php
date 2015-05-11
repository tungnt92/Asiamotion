<?php

/**
* @copyright	Copyright (C) 2012 JoomSpirit. All rights reserved.
* Slideshow based on the JQuery script Flexslider
* @license		GNU General Public License version 2 or later
*/

defined('_JEXEC') or die;


require_once(dirname(__FILE__).'/helper.php');

$category_Id =  $params->get( 'categories_id' );
$categoryAboutUs = mod_acticle_about_usHelper::articleId( $category_Id );
require(JModuleHelper::getLayoutPath('mod_acticle_about_us'));