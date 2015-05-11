<?php

/**
* @copyright	Copyright (C) 2012 JoomSpirit. All rights reserved.
* Slideshow based on the JQuery script Flexslider
* @license		GNU General Public License version 2 or later
*/

defined('_JEXEC') or die;
$baseurl = JURI::base();
$tmp=count($item);
?>
<h3 class="ttl_6">Recent posts</h3>
<ul class="menuchild listnew">
	<?php
	for($i=0; $i<$tmp; $i++)
	{    
    ?>
    <li><a href="index.php?option=com_content&view=featured&Itemid=157&articleId=<?php echo $item[$i]->id; ?>"><?php echo $item[$i]->title; ?></a></li>
    
    <?php
	}
	?>
</ul>