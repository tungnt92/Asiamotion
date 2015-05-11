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

//No Permision
defined('_JEXEC') or die('Restricted access');
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	if(!empty($_REQUEST['newrow']))
	{
		$db = JFactory::getDbo();  
		$querystring="INSERT INTO ".$_REQUEST['ja_tbl_p']." (id,name) VALUES (NULL,'".$_REQUEST['newrow']."');";
		$db->setQuery( $querystring); 
		$db->execute();
	}
}

?>

<script language="javascript" type="text/javascript">
<!--
function changeQuery(thiz) {
	limit = 'LIMIT ' + document.getElementById('ja_lim_p').value;
	sel = document.getElementById('ja_sel_table_p').value;
	
	if (sel != 'SELECT * FROM ') {
		limit = '';
	}
	
	table = '';
   
	if (sel == 'SELECT * FROM table_name PROCEDURE ANALYSE()') {
		table = document.getElementById('ja_tbl_p').value;
		document.getElementById('ja_qry_p').value = 'SELECT * FROM '+table+' PROCEDURE ANALYSE()';
		return;
	}
   
	if (sel == 'SELECT * FROM ' ||
		sel == 'SHOW KEYS FROM ' ||
		sel == 'SHOW FIELDS FROM ' ||
		sel == 'REPAIR TABLE ' ||
		sel == 'OPTIMIZE TABLE ' ||
		sel == 'CHECK TABLE ' ||
		sel == 'SHOW FULL COLUMNS FROM ' ||
		sel == 'SHOW INDEX FROM ' ||
		sel == 'SHOW TABLE STATUS ' ||
		sel == 'SHOW CREATE TABLE ' ||
		sel == 'ANALYZE TABLE ') {
		table = document.getElementById('ja_tbl_p').value+' '+limit;
	}
	
	document.getElementById('ja_qry_p').value = sel + table;
}
//-->
</script>

<form id="adminForm" name="adminForm" action="index.php?option=com_acesql" method="post">
	<table width="100%" border="0" cellsppacing="0" cellpadding="5">
		<tr>
			<td>
				<?php echo JText::_('COM_ACESQL_COMMAND').': ';?>
				<select id="ja_sel_table_p" class="inputbox" style="width:250px;" onchange="changeQuery(this);">
					<optgroup label="SQL commands">
                    	<option value="" selected="selected">Choose your command</option>
						<option value="SELECT * FROM ">SELECT *</option>
						<option value="SHOW DATABASES ">SHOW DATABASES~</option>
                    </optgroup>
				</select>
				&nbsp; &nbsp;
				<?php echo JText::_('COM_ACESQL_TABLE').': ';?>
				<select class="text_area" id="ja_tbl_p" name="ja_tbl_p" onchange="changeQuery(this);">
					<option value="#__section">Section</option>
                    <option value="#__activity">Activity</option>
				</select>
                &nbsp; &nbsp;
				<?php echo JText::_('COM_ACESQL_RECORDS').': ';?>
				<input class="text_area" type="text" size="3" id="ja_lim_p" name="ja_lim_p" value="<?php echo JRequest::getInt('ja_lim_p', 10, 'post'); ?>" style="width:30px;" onchange="changeQuery(this);">
		   </td>
		</tr>
        <tr>
        	<td>
           		<?php echo JText::_('New row').': ';?>
           		<input type="text" name="newrow" value="" style="width:250px;"/>
                &nbsp; &nbsp;
                <input type="submit" name="btn-new" value="ADD" />
           	</td>
        </tr>
		<tr>
			<td>
                <?php
                $k = JFactory::getApplication()->input->get('k');
                if(!is_null($k)){
                    $query = base64_decode(JFactory::getSession()->get('acesql.query'.$k));
                }
                else{
                    $query = AcesqlHelper::getVar('qry');
                }
                ?>
			   <textarea hidden="" class="text_area" id="ja_qry_p" name="ja_qry_p" style="width:100%;height:70px;"><?php echo $query;?></textarea>
			</td>
		</tr>
	</table>
	<?php echo $this->data;?>
	
	<input type="hidden" name="option" value="com_acesql" />
	<input type="hidden" name="controller" value="acesql" />
	<input type="hidden" name="task" value="">
	
	<?php echo JHTML::_('form.token'); ?>
</form>