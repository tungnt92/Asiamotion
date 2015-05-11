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
                                      foreach ($campContent1 as $camp_content1){                                          
                                         $image = json_decode($camp_content1->images);
//                                         $title= explode(" ", $home_content->title) ;   
//                                         $tag= explode(",", $image->image_intro_alt) ;   
//                                         $introtext = explode("+", $camp_content1->introtext);
        

?>
                        <div class='widthgrid clearfix'>
			<?php echo"$camp_content1->introtext" ?>
                        </div>
                           
                                               
   <?php }//end foreach?>
<?php 
      $uri =JURI::root();
                                      foreach ($campContent2 as $camp_content2){                                          
                                         $image = json_decode($camp_content2->images);
                                         ?>
                        <div class='widthgrid cleafix content2'>
                            			<?php echo"$camp_content2->introtext" ?>

                            </div>
                                      <?php }?>