<?php

/**
* @copyright	Copyright (C) 2012 JoomSpirit. All rights reserved.
* Slideshow based on the JQuery script Flexslider
* @license		GNU General Public License version 2 or later
*/

defined('_JEXEC') or die;
jimport('joomla.filesystem.folder');


class mod_team_second_contentHelper{
public function getTeamContentId($id) {
                    $db = JFactory::getDbo();     
                        // $query = $db->getQuery(true);
                        $queryStr = "SELECT bcontent.introtext, bcontent.title, bcontent.images "
                                . " FROM #__content as bcontent"
                                . " WHERE bcontent.id= '$id' ";      
                        $db->setQuery($queryStr);     
                        $rows = $db->loadObjectList();

        //                var_dump($rows);
        //                var_dump($queryStr);

                        return $rows;
                }
}