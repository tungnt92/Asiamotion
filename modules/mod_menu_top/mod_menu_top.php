<?php

/**
* @copyright	Copyright (C) 2012 JoomSpirit. All rights reserved.
* Slideshow based on the JQuery script Flexslider
* @license		GNU General Public License version 2 or later
*/

defined('_JEXEC') or die;


require_once(dirname(__FILE__).'/helper.php');
$menuId = $params->get( 'category_id' );
$homeMenu = mod_menu_topHelper::getMenuId( $menuId );
require(JModuleHelper::getLayoutPath('mod_menu_top'));