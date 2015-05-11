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
                                      foreach ($ourTourContent1 as $our_tour_content1){                                          
                                         $image = json_decode($our_tour_content1->images);
//                                         $title= explode(" ", $home_content->title) ;   
//                                         $tag= explode(",", $image->image_intro_alt) ;   
//                                         $introtext = explode("+", $camp_content1->introtext);
        

?>
<div class='widthgrid cleafix'>
       <?php echo "$our_tour_content1->introtext"; ?>
		</div>
<?php }//end foreach?>