<?php

/**
* @copyright	Copyright (C) 2012 JoomSpirit. All rights reserved.
* Slideshow based on the JQuery script Flexslider
* @license		GNU General Public License version 2 or later
*/

defined('_JEXEC') or die;
jimport('joomla.filesystem.folder');


class mod_new_recent_post_listHelper{
	
		public function getArticleById(){
		
		$db = JFactory::getDbo();     
		$queryStr = "SELECT id, title, created, state FROM #__content WHERE catid= 20 AND state=1 ORDER BY created DESC LIMIT 5";      
		$db->setQuery($queryStr);     
		$rows = $db->loadObjectList();
		
		return $rows;
	}

}