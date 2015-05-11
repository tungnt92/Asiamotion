<?php

/**
* @copyright	Copyright (C) 2012 JoomSpirit. All rights reserved.
* Slideshow based on the JQuery script Flexslider
* @license		GNU General Public License version 2 or later
*/

defined('_JEXEC') or die;
jimport('joomla.filesystem.folder');


class mod_our_team_contentHelper{
 public function getCategoriesId($id){
		
		$db = JFactory::getDbo();     
                // $query = $db->getQuery(true);
                $queryStr = "SELECT bcontent.title,bcontent.alias,bcontent.images,bcontent.introtext"
                        . " FROM #__content as bcontent"
                        . " WHERE bcontent.catid= '$id'and bcontent.state = '1' ORDER BY bcontent.ordering ";      
                $db->setQuery($queryStr);     
                $rows = $db->loadObjectList();

//                var_dump($rows);
//                var_dump($queryStr);
                
		return $rows;
	}


}