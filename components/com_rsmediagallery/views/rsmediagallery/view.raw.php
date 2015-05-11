<?php
/**
* @version 1.0.0
* @package RSMediaGallery! 1.0.0
* @copyright (C) 2012 www.rsjoomla.com
* @license GPL, http://www.gnu.org/licenses/gpl-3.0.html
*/

defined('_JEXEC') or die('Restricted access');

jimport( 'joomla.application.component.view');

class RSMediaGalleryViewRSMediaGallery extends JView
{
	function display($tpl = null)
	{
		require_once JPATH_ADMINISTRATOR.DS.'components'.DS.'com_rsmediagallery'.DS.'helpers'.DS.'helper.php';
		
		if (!function_exists('json_encode'))
			require_once(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_rsmediagallery'.DS.'helpers'.DS.'jsonwrapper'.DS.'json.php');
		
		$mainframe =& JFactory::getApplication();
		$document  =& JFactory::getDocument();
		$params    = $mainframe->getParams('com_rsmediagallery');
		
		// set encoding
		$document->setMimeEncoding('application/json');
		
		// layout
		$layout = $this->getLayout();
		if ($layout == 'items')
		{			
			$items = $this->get('items');
			$show_description = $params->get('show_description_list', 1);
			$show_title 	  = $params->get('show_title_list', 1);
			if ($res = $params->get('thumb_resolution'))
			{
				$thumb_width  = $res[0];
				$thumb_height = $res[1];
			}
			
			$open_in = $params->get('open_in', 'slideshow');
			if ($items)
			{
				jimport('joomla.filesystem.file');
				foreach ($items as $i => $item)
				{
					$item->filepart = JFile::stripExt($item->filename);
					$item->fileext  = JFile::getExt($item->filename);
					
					if ($open_in == 'url')
						$item->href = JRoute::_($item->url, false);
					else
						$item->href = JRoute::_('index.php?option=com_rsmediagallery&view=rsmediagallery&layout=image&id='.$item->filepart.'&ext='.$item->fileext, false);
						
					$item->thumb = RSMediaGalleryHelper::getImage($item, $thumb_width, $thumb_height, false);
					
					// description
					if (!$show_description)
						unset($item->description);
					else
						$item->description = reset(explode('{readmore}', $item->description));
					
					// title
					if (!$show_title)
						unset($item->title);
					
					$items[$i] = $item;
				}
			}
			$this->assign('result', $this->_getResult($items, $this->get('total')));
		}
		else
		{
			JError::raiseError(500, JText::_('RSMG_NOT_FOUND'));
			return;
		}
		
		parent::display($tpl);
	}
	
	function _getResult($items, $total)
	{
		$result = new stdClass();
		
		$result->items = $items;
		$result->total = $total;
		
		return $result;
	}
}