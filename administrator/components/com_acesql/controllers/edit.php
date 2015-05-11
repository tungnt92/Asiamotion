<?php
/**
* @version		1.0.0
* @package		AceSQL
* @subpackage	AceSQL
* @copyright	2009-2012 JoomAce LLC, www.joomace.net
* @license		GNU/GPL http://www.gnu.org/copyleft/gpl.html
*
* Based on EasySQL Component
* @copyright (C) 2008 - 2011 Serebro All rights reserved
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* @link http://www.lurm.net
*/

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

class AcesqlControllerEdit extends AcesqlController {

    public function __construct($default = array()) {
		parent::__construct($default);

        $this->_model = $this->getModel('edit');
	}
	
    public function add() {
   		// Check for request forgeries
   		JRequest::checkToken() or jexit('Invalid Token');

        if ($this->_model->add($this->_table, $this->_query)) {
            $msg = "Yes";
        }
        else {
            $msg = "No";
        }
		
		$vars = '&ja_tbl_g='.base64_encode($this->_table).'&ja_qry_g='.base64_encode($this->_query);

   		$this->setRedirect('index.php?option=com_acesql'.$vars, $msg);
   	}

    public function apply() {
   		// Check for request forgeries
   		JRequest::checkToken() or jexit('Invalid Token');

        if ($this->_model->save($this->_table, $this->_query)) {
            $msg = JText::_('COM_ACESQL_SAVE_TRUE');
        }
        else {
            $msg = JText::_('COM_ACESQL_SAVE_FALSE');
        }
		
		$id = JRequest::getInt('id', JRequest::getInt('id', null, 'post'), 'get');
		$key = JRequest::getCmd('key', JRequest::getCmd('key', null, 'post'), 'get');
		
		$vars = '&ja_tbl_g='.base64_encode($this->_table).'&ja_qry_g='.base64_encode($this->_query).'&key='.$key.'&id='.$id;

   		$this->setRedirect('index.php?option=com_acesql&task=edit'.$vars, $msg);
   	}

    public function save() {
   		// Check for request forgeries
   		JRequest::checkToken() or jexit('Invalid Token');

        if ($this->_model->save($this->_table, $this->_query)) {
            $msg = JText::_('COM_ACESQL_SAVE_TRUE');
        }
        else {
            $msg = JText::_('COM_ACESQL_SAVE_FALSE');
        }
		
		$vars = '&ja_tbl_g='.base64_encode($this->_table).'&ja_qry_g='.base64_encode($this->_query);

   		$this->setRedirect('index.php?option=com_acesql'.$vars, $msg);
   	}

    public function cancel() {
   		// Check for request forgeries
   		JRequest::checkToken() or jexit('Invalid Token');
		
		$vars = '&ja_tbl_g='.base64_encode($this->_table).'&ja_qry_g='.base64_encode($this->_query);

   		$this->setRedirect('index.php?option=com_acesql'.$vars, $msg);
   	}
}