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
$uri =JURI::root();
foreach ($eventCategory as $event_category_program) {
      
?>
<li><a href="index.php?option=com_content&view=featured&Itemid=150&articleId=<?php echo $event_category_program->id ?>&timetripID=<?php echo $catId; ?>&programID=<?php echo $categoryIdOurProgram; ?>">
    <?php echo $event_category_program->title; ?>
    </a></li>
        
<?php
    
}//end  foreach
?>


