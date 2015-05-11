<?php

/**
* @copyright	Copyright (C) 2012 JoomSpirit. All rights reserved.
* Slideshow based on the JQuery script Flexslider
* @license		GNU General Public License version 2 or later
*/

defined('_JEXEC') or die;


require_once(dirname(__FILE__).'/helper.php');

$type =  $params->get( 'type' );

$db = JFactory::getDbo();     
$queryStr = "SELECT filename from  #__rsmediagallery_items WHERE description LIKE '".$type."' AND published = 1";      
$db->setQuery($queryStr);        
$rows = $db->loadObjectList();

$tmp = count($rows);


require(JModuleHelper::getLayoutPath('mod_gallery'));