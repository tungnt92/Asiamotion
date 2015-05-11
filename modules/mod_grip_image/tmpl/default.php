<?php

/**
* @copyright	Copyright (C) 2012 JoomSpirit. All rights reserved.
* Slideshow based on the JQuery script Flexslider
* @license		GNU General Public License version 2 or later
*/

defined('_JEXEC') or die;
$baseurl = JURI::base();
$tmp = count($item);

//$articleId=$_GET['articleId'];

if(!empty($_GET['articleId']))
{
    $articleId=$_GET['articleId'];
}
else
{
$articleId = 0;
}

for($i=0;$i<$tmp;$i++)
{
	$image = json_decode($item[$i]->images);
	if($item[$i]->id==$articleId)
	{
		$active_span='style="display: block;"';
		$active_h3='style="bottom: 115px; background: none!important; z-index: 9999;"';
	}
	else{
		$active_h3="";
		$active_span="";
	}
	
?>
  <div class="widthgrid">
    <div class='itemglls'>
            <a href="index.php?option=com_content&view=featured&Itemid=<?php echo $menuId; ?>&articleId=<?php echo $item[$i]->id; ?>&title=<?php echo $item[$i]->title;?>"><img style="width:300px; height:270px;" src="<?php echo $baseurl ?><?php echo $image->image_intro ?>" alt=""/>
            <span <?php echo $active_span; ?> class="hover-bg"><p></p></span>
            <h3 <?php echo $active_h3; ?>><?php echo $item[$i]->title ?></h3></a>
     </div>
  </div>
 <?php 
 } 
 ?>