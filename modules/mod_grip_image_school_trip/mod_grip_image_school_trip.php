<?php

/**
* @copyright	Copyright (C) 2012 JoomSpirit. All rights reserved.
* Slideshow based on the JQuery script Flexslider
* @license		GNU General Public License version 2 or later
*/

defined('_JEXEC') or die;


require_once(dirname(__FILE__).'/helper.php');

$categoryId = $params->get( 'category_id' );

$schoolTripGirdImage = mod_grip_image_school_tripHelper::getArticleById( $categoryId );


require(JModuleHelper::getLayoutPath('mod_grip_image_school_trip'));