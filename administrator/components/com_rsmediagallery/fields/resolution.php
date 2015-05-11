<?php
/**
* @version 1.0.0
* @package RSMediaGallery! 1.0.0
* @copyright (C) 2012 www.rsjoomla.com
* @license GPL, http://www.gnu.org/licenses/gpl-3.0.html
*/

defined('_JEXEC') or die('Restricted access');

class JFormFieldResolution extends JFormField
{
	/**
	* Element name
	*
	* @access       protected
	* @var          string
	*/
	var $type = 'Resolution';
	
	function __construct($parent = null) {
		parent::__construct($parent);
		
		$document =& JFactory::getDocument();
		$document->addScriptDeclaration("function rsmg_get(id) {
		switch (id)
		{
			default: return id;
			case 'RSMG_PARAM_TAGS_NO_RESULTS': 	return '".JText::_('RSMG_PARAM_TAGS_NO_RESULTS', true)."'; break;
			case 'RSMG_PLEASE_ADD_TAG': 		return '".JText::_('RSMG_PLEASE_ADD_TAG', true)."'; break;
		}
		}");
	}
	
	function getInput()
	{		
		$name  		= $this->name;
		$fieldname 	= $this->fieldname;
		$value 		= $this->value;
		$node  		= $this->element;
		
		$size = ( isset($this->element['size']) ? 'size="'.$this->element['size'].'"' : '' );
        /*
         * Required to avoid a cycle of encoding &
         * html_entity_decode was used in place of htmlspecialchars_decode because
         * htmlspecialchars_decode is not compatible with PHP 4
         */
		
		if (is_array($value))
		{
			$w = $value[0];
			$h = $value[1];
		}
		else
			@list($w, $h) = explode('x', $value, 2);
			
		return '
		<script type="text/javascript">
		function rsmg_keep_ratio_'.$fieldname.'(here, there, there_ratio)
		{
			there_ratio = there_ratio.split(\':\');
			
			here.value = here.value.replace(/[^0-9]/g, \'\');
			if (!isNaN(here.value))
				there.value = Math.round(there_ratio[1] * here.value / there_ratio[0]);
		}
		</script>
		<input style="text-align: center;" onkeyup="rsmg_keep_ratio_'.$fieldname.'(this, document.getElementById(\''.$fieldname.'h\'), \'4:3\')" onkeydown="rsmg_keep_ratio_'.$fieldname.'(this, document.getElementById(\''.$fieldname.'h\'), \'4:3\')" type="text" name="'.$name.'[]" id="'.$fieldname.'w" value="'.(int) $w.'" '.$size.' /> <div style="margin: 5px 5px 5px 0; float: left;">x</div> <input style="text-align: center;" onkeyup="rsmg_keep_ratio_'.$fieldname.'(this, document.getElementById(\''.$fieldname.'w\'), \'3:4\')" onkeydown="rsmg_keep_ratio_'.$fieldname.'(this, document.getElementById(\''.$fieldname.'w\'), \'3:4\')" type="text" name="'.$name.'[]" id="'.$fieldname.'h" value="'.(int) $h.'" '.$size.' />';
	}
}