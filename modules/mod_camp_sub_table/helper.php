<?php

/**
* @copyright	Copyright (C) 2012 JoomSpirit. All rights reserved.
* Slideshow based on the JQuery script Flexslider
* @license		GNU General Public License version 2 or later
*/

defined('_JEXEC') or die;
jimport('joomla.filesystem.folder');


class mod_camp_sub_tableHelper{

	public function getArticleById($id){
		
		$db = JFactory::getDbo();     
		$queryStr = "SELECT title, introtext, state FROM #__content WHERE id= $id AND state=1";      
		$db->setQuery($queryStr);     
		$rows = $db->loadObjectList();
		
		return $rows;
	}

}