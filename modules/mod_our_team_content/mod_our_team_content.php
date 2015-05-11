<?php

/**
* @copyright	Copyright (C) 2012 JoomSpirit. All rights reserved.
* Slideshow based on the JQuery script Flexslider
* @license		GNU General Public License version 2 or later
*/

defined('_JEXEC') or die;


require_once(dirname(__FILE__).'/helper.php');
$categoryId = $params->get( 'category_id' );

//$ourTeamCategory = mod_our_team_contentHelper::getCategoriesId( $categoryId );
$ourTeamCategory= mod_our_team_contentHelper::getCategoriesId($categoryId);
require(JModuleHelper::getLayoutPath('mod_our_team_content'));