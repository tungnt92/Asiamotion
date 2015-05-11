<?php

/**
* @copyright	Copyright (C) 2012 JoomSpirit. All rights reserved.
* Slideshow based on the JQuery script Flexslider
* @license		GNU General Public License version 2 or later
*/

defined('_JEXEC') or die;


require_once(dirname(__FILE__).'/helper.php');

$catId=$_GET['timetripID'];
/*$catId = $params->get( 'category_id' );*/
$eventCatId = mod_event_time_trip_listHelper::getCatId( $catId );


require(JModuleHelper::getLayoutPath('mod_event_time_trip_list'));