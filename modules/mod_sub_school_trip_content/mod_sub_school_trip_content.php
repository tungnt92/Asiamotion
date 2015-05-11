<?php

/**
* @copyright	Copyright (C) 2012 JoomSpirit. All rights reserved.
* Slideshow based on the JQuery script Flexslider
* @license		GNU General Public License version 2 or later
*/

defined('_JEXEC') or die;


require_once(dirname(__FILE__).'/helper.php');

$article_Id1 =  $_GET['articleId'];

$subSchoolTripContent1 = mod_sub_school_trip_contentHelper::getOurTourContentId( $article_Id1 );

require(JModuleHelper::getLayoutPath('mod_sub_school_trip_content'));