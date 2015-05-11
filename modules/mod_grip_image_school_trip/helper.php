<?php

/**
* @copyright	Copyright (C) 2012 JoomSpirit. All rights reserved.
* Slideshow based on the JQuery script Flexslider
* @license		GNU General Public License version 2 or later
*/

defined('_JEXEC') or die;
jimport('joomla.filesystem.folder');


class mod_grip_image_school_tripHelper{
	public function getArticleById($id){		
		$db = JFactory::getDbo();     
		$queryStr = "SELECT id,title,note, params "
                            . "FROM #__categories "
                            . "WHERE parent_id= $id and published = 1 ORDER BY rgt";      
		$db->setQuery($queryStr);     
		$rows = $db->loadObjectList(); 
		//print_r($rows);
		return $rows;
	}
}