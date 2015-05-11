<?php
/**
* @version 1.0.0
* @package RSMediaGallery! 1.0.0
* @copyright (C) 2012 www.rsjoomla.com
* @license GPL, http://www.gnu.org/licenses/gpl-3.0.html
*/

defined('_JEXEC') or die('Restricted access');

class RSMediaGalleryHelper
{
	function escape($text)
	{
		return htmlentities($text, ENT_COMPAT, 'utf-8');
	}
	
	function getItemsQuery($tags, $order='i.ordering', $direction='ASC')
	{
		$db =& JFactory::getDBO();
		
		// parse $order
		if ($order[1] != '.')
			$order = $order == 'tags' ? $order : 'i.'.$order;
		
		$where = array();
		if (!is_array($tags))
			$tags = explode(',', $tags);
		
		foreach ($tags as $tag)
		{
			if (trim($tag) == '')
				continue;
			$where[] = "t.tag='".$db->getEscaped(trim($tag))."'";
		}
		
		$query = "SELECT DISTINCT(i.id), i.filename, i.title, i.url, i.description, i.params FROM #__rsmediagallery_items i LEFT JOIN #__rsmediagallery_tags t ON (i.id=t.item_id) WHERE i.published='1' AND (".implode(' OR ', $where).") ORDER BY ".$db->getEscaped($order)." ".$db->getEscaped($direction);
		
		return $query;
	}
	
	function getItems($tags, $order='i.ordering', $direction='ASC', $limitstart=0, $limit=0)
	{
		$db =& JFactory::getDBO();
		$db->setQuery(RSMediaGalleryHelper::getItemsQuery($tags, $order, $direction), $limitstart, $limit);
		return $db->loadObjectList();
	}
	
	function getImage($mixed, $width=280, $height=210, $xhtml=true)
	{
		// cache
		static $cache;
		
		// object ?
		if (is_object($mixed) && isset($mixed->filename))
		{
			$image  = $mixed;
			$id    	= $image->filename;
			$params = $image->params;
		}
		// array ?
		elseif (is_array($mixed) && isset($mixed['filename']))
		{
			$image 	= $mixed;
			$id    	= $image['filename'];
			$params = $image['params'];
		}
		// numeric id ? load from database
		elseif ((int) $mixed > 0)
		{
			JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_rsmediagallery'.DS.'tables');
			$image =& JTable::getInstance('RSMediaGallery_Items', 'Table');
			if ($image->load($mixed))
			{
				$id 	= $image->filename;
				$params = $image->params;
			}
			else
				return false; // not found
		}
		// cannot continue
		else
		{
			return false;
		}
		
		if ((int) $width == 0)
			$width = 280;
		if ((int) $height == 0)
			$height = 210;
		
		$res = $width.'x'.$height;
		
		// check cache
		if (!isset($cache[$id][$res]))
		{
			$create_thumb = true;
			
			// admin thumb ?
			if ($width == 280 && $height == 210)
			{
				if (file_exists(JPATH_SITE.DS.'components'.DS.'com_rsmediagallery'.DS.'assets'.DS.'gallery'.DS.$id))
				{
					$cache[$id][$res] = JURI::root().'components/com_rsmediagallery/assets/gallery/'.$id;
					$create_thumb 	  = false;
				}
			}
			else
			{
				if (file_exists(JPATH_SITE.DS.'components'.DS.'com_rsmediagallery'.DS.'assets'.DS.'gallery'.DS.$res.DS.$id))
				{
					$cache[$id][$res] = JURI::root().'components/com_rsmediagallery/assets/gallery/'.$res.'/'.$id;
					$create_thumb 	  = false;
				}
			}
			
			if ($create_thumb)
			{
				$session =& JFactory::getSession();
				$hash	 = md5($width.'x'.$height.JPATH_SITE);
				$session->set('com_rsmediagallery.thumbs.'.$hash, 1);
				
				$_SESSION['com_rsmediagallery.thumbs.'.$hash] = 1;
				
				jimport('joomla.filesystem.file');
				$filepart = JFile::stripExt($id);
				$fileext  = JFile::getExt($id);
				
				// add this to the cache - it should be generated next time so it's ok to add the cached file
				$cache[$id][$res] = JURI::root().'components/com_rsmediagallery/assets/gallery/'.$res.'/'.$id;
				return JRoute::_('index.php?option=com_rsmediagallery&task=createthumb&resolution='.$width.'x'.$height.'&id='.$filepart.'&ext='.$fileext, $xhtml);
			}
		}
		
		return $cache[$id][$width.'x'.$height];
	}
}