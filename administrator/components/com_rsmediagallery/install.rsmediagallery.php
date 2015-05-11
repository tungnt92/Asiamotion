<?php
/**
* @version 1.0.0
* @package RSMediaGallery! 1.0.0
* @copyright (C) 2012 www.rsjoomla.com
* @license GPL, http://www.gnu.org/licenses/gpl-3.0.html
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

$lang =& JFactory::getLanguage();
$lang->load('com_rsmediagallery.sys', JPATH_ADMINISTRATOR);
?>
<table class="adminlist">
	<thead>
		<tr>
			<th class="title" colspan="2"><?php echo JText::_('RSMG_INSTALLER_EXTENSION'); ?></th>
			<th width="30%"><?php echo JText::_('RSMG_INSTALLER_STATUS'); ?></th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<td colspan="3"></td>
		</tr>
	</tfoot>
	<tbody>
		<tr class="row0">
			<td class="key" colspan="2"><?php echo JText::sprintf('RSMG_INSTALLER_COMPONENT', 'RSMediaGallery'); ?></td>
			<td><strong><?php echo JText::_('RSMG_INSTALLER_INSTALLED'); ?></strong></td>
		</tr>
	</tbody>
</table>
<table>
<tr>
	<td width="1%"><img src="components/com_rsmediagallery/assets/images/rsmediagallery-box.png" alt="RSMediaGallery! Box" /></td>
	<td align="left">
	<div id="rsmediagallery_message">
	<p>Thank you for choosing RSMediaGallery!.</p>
	<p>New in this version:</p>
	<ul id="rsmediagallery_changelog">
		<li>Image tagging</li>
		<li>Adjust thumbnail position &amp; resolution</li>
		<li>Completely AJAX driven</li>
	</ul>
	<a href="http://www.rsjoomla.com/support/documentation/view-knowledgebase/168-changelog.html" target="_blank">Full Changelog</a>
	<ul id="rsmediagallery_links">
		<li>
			<div class="button2-left">
				<div class="next">
					<a href="index.php?option=com_rsmediagallery"><?php echo JText::sprintf('RSMG_INSTALLER_START_USING', 'RSMediaGallery'); ?></a>
				</div>
			</div>
		</li>
		<li>
			<div class="button2-left">
				<div class="readmore">
					<a href="http://www.rsjoomla.com/support/documentation/view-knowledgebase/162-rsmediagallery.html" target="_blank"><?php echo JText::sprintf('RSMG_INSTALLER_READ_GUIDE', 'RSMediaGallery'); ?></a>
				</div>
			</div>
		</li>
		<li>
			<div class="button2-left">
				<div class="blank">
					<a href="http://www.rsjoomla.com/customer-support/tickets.html" target="_blank"><?php echo JText::_('RSMG_INSTALLER_GET_SUPPORT'); ?></a>
				</div>
			</div>
		</li>
	</ul>
	</div>
	</td>
</tr>

</table><br/>

<br/>
<?php
$your_php 	 = phpversion();
$correct_php = version_compare($your_php, '5.0');

$db->setQuery("SELECT VERSION()");
$your_sql 	 = $db->loadResult();
$correct_sql = version_compare($your_sql, '5.0');
?>
<style type="text/css">
.green { color: #009E28; }
.red { color: #B8002E; }
.greenbg { background: #B8FFC9 !important; }
.redbg { background: #FFB8C9 !important; }

#rsmediagallery_changelog
{
	list-style-type: none;
	padding: 0;
}

#rsmediagallery_changelog li
{
	background: url(components/com_rsmediagallery/assets/images/tick.png) no-repeat center left;
	padding-left: 24px;
}

#rsmediagallery_links
{
	list-style-type: none;
	padding: 0;
}
</style>
<table class="adminlist">
	<thead>
		<tr>
			<th width="30%" nowrap="nowrap"><?php echo JText::_('RSMG_INSTALLER_SOFTWARE'); ?></th>
			<th width="30%" nowrap="nowrap"><?php echo JText::_('RSMG_INSTALLER_YOUR_VERSION'); ?></th>
			<th width="30%" nowrap="nowrap"><?php echo JText::_('RSMG_INSTALLER_MIN'); ?></th>
			<th width="30%" nowrap="nowrap"><?php echo JText::_('RSMG_INSTALLER_REC'); ?></th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<td colspan="4"></td>
		</tr>
	</tfoot>
	<tbody>
		<tr class="row0">
			<td class="key">PHP</td>
			<td class="<?php echo $correct_php >= 0 ? 'greenbg' : 'redbg'; ?>"><strong class="<?php echo $correct_php >= 0 ? 'green' : 'red'; ?>"><?php echo $your_php; ?></strong> <img src="components/com_rsmediagallery/assets/images/<?php echo $correct_php >= 0 ? 'success' : 'error'; ?>.gif" alt="" /></td>
			<td><strong>5.x</strong></td>
			<td><strong>5.x</strong></td>
		</tr>
		<tr class="row1">
			<td class="key">MySQL</td>
			<td class="<?php echo $correct_sql >= 0 ? 'greenbg' : 'redbg'; ?>"><strong class="<?php echo $correct_sql >= 0 ? 'green' : 'red'; ?>"><?php echo $your_sql; ?></strong> <img src="components/com_rsmediagallery/assets/images/<?php echo $correct_sql >= 0 ? 'success' : 'error'; ?>.gif" alt="" /></td>
			<td><strong>5.x</strong></td>
			<td><strong>5.x</strong></td>
		</tr>
	</tbody>
</table>