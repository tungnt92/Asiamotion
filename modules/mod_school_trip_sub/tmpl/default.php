<?php

/**
* @copyright	Copyright (C) 2012 JoomSpirit. All rights reserved.
* Slideshow based on the JQuery script Flexslider
* @license		GNU General Public License version 2 or later
*/

defined('_JEXEC') or die;
$baseurl = JURI::base();

$categoryID=$_REQUEST['categoryID'];
$articleID=$_REQUEST['articleID'];

$db = JFactory::getDbo();     


// get articles from category id
$queryString = "SELECT id, title, state FROM #__content WHERE catid= ".$categoryID." AND state=1 ORDER BY ordering";      
$db->setQuery($queryString);     
$item = $db->loadObjectList();
$count=count($item);

// get first article
//$articleID = $item[0]->id;
//echo 'ardvasvad = ' . $articleID;
        
$queryStr = "SELECT id,title, images, introtext, state FROM #__content  WHERE catid= ".$categoryID." AND id=".$articleID." AND state=1 ORDER BY ordering";      
$db->setQuery($queryStr);     
$rows = $db->loadObjectList();

$image = json_decode($rows[0]->images);
$display = '';
if($categoryID == 26){
$display='inline';
}else{
$display= 'none';
}
?>
<div class="float-left main-l">
	<h3 style="display:none" class="ttl_5"><?php echo $rows[0]->title; ?></h3>
	<div class="document">
		<?php echo $rows[0]->introtext; ?>
               <?php if ( !empty($image->image_intro) ) {?> <p></p> <?php } // end if?>
	</div>
</div>
<div class="float-right main-r" style="display:<?php echo $display ?>">
	<h3 class="ttl_6">destinations</h3>
		<ul class="menuchild">
        <?php
		for($i=0; $i<$count; $i++)
		{
		?>
            <li><a href="index.php?option=com_content&view=featured&Itemid=161&categoryID=<?php echo $categoryID; ?>&articleID=<?php echo $item[$i]->id; ?>&title=<?php echo $item[$i]->title; ?>"><?php echo $item[$i]->title; ?></a></li>
		<?php
        }
        ?>
		</ul>
</div>