<?php

/**
* @copyright	Copyright (C) 2012 JoomSpirit. All rights reserved.
* Slideshow based on the JQuery script Flexslider
* @license		GNU General Public License version 2 or later
*/

defined('_JEXEC') or die;


require_once(dirname(__FILE__).'/helper.php');

$item = mod_new_recent_post_listHelper::getArticleById();

require(JModuleHelper::getLayoutPath('mod_new_recent_post_list'));