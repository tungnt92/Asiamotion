<?php

/**
* @copyright	Copyright (C) 2012 JoomSpirit. All rights reserved.
* Slideshow based on the JQuery script Flexslider
* @license		GNU General Public License version 2 or later
*/

defined('_JEXEC') or die;


require_once(dirname(__FILE__).'/helper.php');

$article_Id1 =  $params->get( 'article_id1' );

$campContent1 = mod_camp_content2Helper::getCampContentId( $article_Id1 );
require(JModuleHelper::getLayoutPath('mod_camp_content2'));