<?php

/**
* @copyright	Copyright (C) 2012 JoomSpirit. All rights reserved.
* Slideshow based on the JQuery script Flexslider
* @license		GNU General Public License version 2 or later
*/

defined('_JEXEC') or die;
$baseurl = JURI::base();
$catId=$_GET['timetripID'];
$categoryIdOurProgram=$_GET['programID'];
?>
  <?php
            $idmenu = JFactory::getApplication();

        ?>
<div class="menuevent">
    <ul>
<?php
		  $uri =JURI::root();
		  foreach ($eventCatId as $event_cat){
			                                        
			   $activeClassHTML = '';
			   if ( $event_cat->id == $_GET['articleId'])
			   {
				   $activeClassHTML = 'class="acitve"';
			   }
			 ?>

	   <li>
		   <a <?php echo $activeClassHTML;  ?> href="index.php?option=com_content&view=featured&Itemid=150&articleId=<?php echo $event_cat->id ?>&timetripID=<?php echo $catId; ?>&programID=<?php echo $categoryIdOurProgram; ?>"><?php echo"$event_cat->title";?> </a>
	   </li>

		  <?php }//end foreach?>
    </ul>
</div>