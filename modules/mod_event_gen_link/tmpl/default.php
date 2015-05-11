<?php

/**
* @copyright	Copyright (C) 2012 JoomSpirit. All rights reserved.
* Slideshow based on the JQuery script Flexslider
* @license		GNU General Public License version 2 or later
*/

defined('_JEXEC') or die;
$baseurl = JURI::base();

$db = JFactory::getDbo();     
$queryStr = "SELECT id, title FROM #__categories WHERE parent_id=22";      
$db->setQuery($queryStr);     
$desc = $db->loadObjectList();
$tmp=count($desc);
   
$queryStrAr = "SELECT id FROM #__content WHERE catid IN (SELECT id FROM #__categories WHERE parent_id=22) LIMIT 1";      
$db->setQuery($queryStrAr);     
$descAr = $db->loadObjectList();

$queryString = "SELECT id, title FROM #__categories WHERE parent_id=33";      
$db->setQuery($queryString);     
$program = $db->loadObjectList();
$tmpp=count($program);
?>
<script>
	function getvalue()
	{
		var currentURL = "<?php echo JURI::base();?>"+"index.php/event?view=featured"+jQuery("#desc").val()+"&programID="+jQuery("#prog").val();
		
		jQuery("#link_result").val(currentURL);
	};

</script>


<div style="display:inline-block;">
<h2 style="padding: 20px;">Generate link of event page:</h2>
<table width="850" border="0" style="margin-left: 20px;">
  <tr>
    <td><h3>Choose your Desciption: </h3></td>
    <td>
    <select style="cursor:pointer" id="desc">
	<?php
    for($i=0;$i<$tmp; $i++)
    {
    ?>
        <option value="&articleId=<?php echo $descAr[$i]->id ?>&timetripID=<?php echo $desc[$i]->id ?>"><?php echo $desc[$i]->title ?></option>
    <?php
    }
    ?>
    </select>
    </td>
  </tr>
  <tr>
    <td><h3>Choose your Program: </h3></td>
    <td>
    <select style="cursor:pointer" id="prog">
	<?php
    for($j=0;$j<$tmpp; $j++)
    {
    ?>
        <option value="<?php echo $program[$j]->id ?>"><?php echo $program[$j]->title ?></option>
    <?php
    }
    ?>
    </select>
    </td>
  </tr>
    <tr>
    <td><button style="cursor:pointer" name="submit" onclick="getvalue()">GET LINK</button></td>
    <td><input style="width:600px" type="text" id="link_result" value="" /></td>
  </tr>
</table>

</div>