<?php

/**
* @copyright	Copyright (C) 2012 JoomSpirit. All rights reserved.
* Slideshow based on the JQuery script Flexslider
* @license		GNU General Public License version 2 or later
*/

defined('_JEXEC') or die;
$baseurl = JURI::base();

?>
<?php 
      $uri =JURI::root();
                                      foreach ($teamContent1 as $team_content1){                                          
                                         $image = json_decode($team_content1->images);
//                                         $title= explode(" ", $home_content->title) ;   
//                                         $tag= explode(",", $image->image_intro_alt) ;   
//                                         $introtext = explode("+", $camp_content1->introtext);
        

?>
<div class='widthgrid clearfix'>
			
			<?php echo"$team_content1->introtext"; ?>
			</div>
		<?php }//end foreach?>