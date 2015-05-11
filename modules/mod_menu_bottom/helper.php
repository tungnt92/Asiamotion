<?php

/**
* @copyright	Copyright (C) 2012 JoomSpirit. All rights reserved.
* Slideshow based on the JQuery script Flexslider
* @license		GNU General Public License version 2 or later
*/

defined('_JEXEC') or die;
jimport('joomla.filesystem.folder');


class mod_menu_bottomHelper{
public function getMenuId($id){
		$db = JFactory::getDbo();     
                // $query = $db->getQuery(true);
                $queryStr = "SELECT params, link,note"
                            . " FROM #__menu"
                            . " WHERE parent_id= '$id'and state = '1' ORDER BY bcontent.ordering ";      
                $db->setQuery($queryStr);     
                $rows = $db->loadObjectList();
               
//               var_dump($rows);
//               var_dump($queryStr);
//                
		return $rows;
	}
}