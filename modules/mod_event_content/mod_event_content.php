<?php

/**
* @copyright	Copyright (C) 2012 JoomSpirit. All rights reserved.
* Slideshow based on the JQuery script Flexslider
* @license		GNU General Public License version 2 or later
*/

defined('_JEXEC') or die;


require_once(dirname(__FILE__).'/helper.php');

$articleId = $_REQUEST['articleId'];
$eventArticleId = mod_event_contentHelper::getArticleId( $articleId );

require(JModuleHelper::getLayoutPath('mod_event_content'));