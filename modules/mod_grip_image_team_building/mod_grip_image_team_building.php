<?php

/**
* @copyright	Copyright (C) 2012 JoomSpirit. All rights reserved.
* Slideshow based on the JQuery script Flexslider
* @license		GNU General Public License version 2 or later
*/

defined('_JEXEC') or die;


require_once(dirname(__FILE__).'/helper.php');

$articleId = $params->get( 'category_id' );

$item = mod_grip_image_team_buildingHelper::getArticleById( $articleId );


require(JModuleHelper::getLayoutPath('mod_grip_image_team_building'));