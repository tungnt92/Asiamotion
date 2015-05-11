<?php
/**
* @version 1.0.0
* @package RSMediaGallery! 1.0.0
* @copyright (C) 2012 www.rsjoomla.com
* @license GPL, http://www.gnu.org/licenses/gpl-3.0.html
*/

defined('_JEXEC') or die('Restricted access');

class JElementResolution extends JElement
{
	/**
	* Element name
	*
	* @access       protected
	* @var          string
	*/
	var $_name = 'Resolution';
	
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
	
	function fetchElement($name, $value, &$node, $control_name)
	{
		$size = ( $node->attributes('size') ? 'size="'.$node->attributes('size').'"' : '' );
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
		function rsmg_keep_ratio_'.$name.'(here, there, there_ratio)
		{
			there_ratio = there_ratio.split(\':\');
			
			here.value = here.value.replace(/[^0-9]/g, \'\');
			if (!isNaN(here.value))
				there.value = Math.round(there_ratio[1] * here.value / there_ratio[0]);
		}
		</script>
		<input style="text-align: center;" onkeyup="rsmg_keep_ratio_'.$name.'(this, document.getElementById(\''.$control_name.$name.'h\'), \'4:3\')" onkeydown="rsmg_keep_ratio_'.$name.'(this, document.getElementById(\''.$control_name.$name.'h\'), \'4:3\')" type="text" name="'.$control_name.'['.$name.'][]" id="'.$control_name.$name.'w" value="'.(int) $w.'" '.$size.' /> x <input style="text-align: center;" onkeyup="rsmg_keep_ratio_'.$name.'(this, document.getElementById(\''.$control_name.$name.'w\'), \'3:4\')" onkeydown="rsmg_keep_ratio_'.$name.'(this, document.getElementById(\''.$control_name.$name.'w\'), \'3:4\')" type="text" name="'.$control_name.'['.$name.'][]" id="'.$control_name.$name.'h" value="'.(int) $h.'" '.$size.' />';
	}
}