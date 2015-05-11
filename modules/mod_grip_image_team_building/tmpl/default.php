<?php

/**
* @copyright	Copyright (C) 2012 JoomSpirit. All rights reserved.
* Slideshow based on the JQuery script Flexslider
* @license		GNU General Public License version 2 or later
*/

defined('_JEXEC') or die;
$baseurl = JURI::base();
$tmp = count($item);

for($i=0;$i<$tmp;$i++)
{
	$image = json_decode($item[$i]->images);

?>
  <div class="widthgrid">
<div class='itemglls'>
	<a href="index.php?option=com_content&view=featured&Itemid=159&articleId=<?php echo $item[$i]->id ?>">
            <img style="width:300px; height:270px;" src="<?php echo $baseurl ?><?php echo $image->image_intro ?>" alt=""/>
		<span class="hover-bg"></span>
	<h3><?php echo $item[$i]->title ?></h3></a>
 </div>
  </div>
 <?php 
 } 
 ?>