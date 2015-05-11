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
		
		$mainframe =& JFactory::getApplication();
		$document  =& JFactory::getDocument();
		
		$params    = $this->get('params');
		$jversion  = new JVersion();
		
		// set full resolution params
		if ($res = $params->get('full_resolution'))
		{
			if (!is_array($res))
				$res = explode('x', $res);
				
			$params->set('full_width',  $res[0]);
			$params->set('full_height', $res[1]);
		}
		
		// set thumb params
		if ($res = $params->get('thumb_resolution'))
		{
			if (!is_array($res))
				$res = explode('x', $res);
				
			$params->set('thumb_width',  $res[0]);
			$params->set('thumb_height', $res[1]);
		}

		$src = JDEBUG ? '.src' : '';
		
		$document->addScript(JURI::root(true).'/components/com_rsmediagallery/assets/js/jquery'.$src.'.js');
		$document->addScriptDeclaration("jQuery.noConflict();");
		$document->addScriptDeclaration("function rsmg_get_root() { return '".addslashes(rtrim(JURI::root(), '/'))."'; }");
		$document->addScriptDeclaration("function rsmg_get_lang(id) {
			switch (id)
			{
				default: return id;
				case 'RSMG_LOAD_MORE': 		return '".JText::_('RSMG_LOAD_MORE', true)."'; break;
				case 'RSMG_LOAD_ALL': 		return '".JText::_('RSMG_LOAD_ALL', true)."'; break;
			}
		}");
		$document->addScript(JURI::root(true).'/components/com_rsmediagallery/assets/js/jquery.ui'.$src.'.js');
		$document->addScript(JURI::root(true).'/components/com_rsmediagallery/assets/js/jquery.script'.$src.'.js');
		$document->addStyleSheet(JURI::root(true).'/components/com_rsmediagallery/assets/css/style.css');
		
		$layout = $this->getLayout();
		if ($layout == 'image')
		{
			$this->assignRef('item', $this->get('item'));
			// not an item ?
			if (!$this->item)
			{
				JError::raiseError(500, JText::_('RSMG_NOT_FOUND'));
				return;
			}
			
			if ($params->get('use_original', 0))
				$this->item->src = JURI::root(true).'/components/com_rsmediagallery/assets/gallery/original/'.$this->item->filename;
			else
				$this->item->src = RSMediaGalleryHelper::getImage($this->item, $params->get('full_width', 800), $params->get('full_height', 600), true);			
			
			// set page title
			$document->setTitle($document->getTitle().' - '.$this->item->title);
			
			// set breadcrumbs
			$pathway =& $mainframe->getPathway();
			$pathway->addItem($this->item->title, '');
			
			// assign variables to the layout
			$this->assignRef('adjacent', $this->get('adjacentitems'));
			$this->assignRef('params', $params);
			$this->assign('isComponent', JRequest::getVar('tmpl') == 'component');
			$this->assign('isJ16',	$jversion->isCompatible('1.6.0'));
			
			// don't forget to increase the views
			$model = $this->getModel('rsmediagallery');
			$model->hitItem($this->item->id);
		}
		else
		{
			$document->addScript(JURI::root(true).'/components/com_rsmediagallery/assets/js/jquery.lightbox'.$src.'.js');
			$document->addScriptDeclaration("var rsmg_slideshow = '".($params->get('open_in', 'slideshow') == 'slideshow' ? 1 : 0)."'");
			
			$open_in = $params->get('open_in', 'slideshow');
			
			$items = $this->get('items');
			if ($items)
			{
				jimport('joomla.filesystem.file');
				foreach ($items as $i => $item)
				{
					$item->filepart = JFile::stripExt($item->filename);
					$item->fileext  = JFile::getExt($item->filename);
					
					if ($open_in == 'url')
						$item->href = JRoute::_($item->url);
					else
						$item->href = JRoute::_('index.php?option=com_rsmediagallery&view=rsmediagallery&layout=image&id='.$item->filepart.'&ext='.$item->fileext);
						
					$item->thumb = RSMediaGalleryHelper::getImage($item, $params->get('thumb_width', 280), $params->get('thumb_height', 210), true);
					$item->description = reset(explode('{readmore}', $item->description));
					
					$items[$i] = $item;
				}
			}
			
			// assign variables to the layout
			$this->assignRef('params', 		$params);
			$this->assignRef('items',  		$items);
			$this->assignRef('total',  		$this->get('total'));
			$this->assignRef('limitstart',  $this->get('limitstart'));
			$this->assignRef('limit', 		$this->get('limit'));
			$this->assign('more',   $this->limitstart + $this->limit < $this->total);
			$this->assign('prev',   $this->limitstart > 0);
			$this->assign('itemid', $this->get('itemid'));
			$this->assign('isJ16',	$jversion->isCompatible('1.6.0'));
		}
		
		parent::display($tpl);
	}
}