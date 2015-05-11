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
                      <div class='widthgrid cleafix content2'>
                      <h3><?php echo"$camp_content1->title"; ?></h3>
                      <div class='clearfix'>
                            <div class="float-left imgleft">
                            <img src="<?php echo"$uri/$image->image_intro";?>" alt=""/>
                            </div>
                            <div class='float-right document inforight'>
                            <?php echo"$camp_content1->introtext";?>
                            </div>
                    </div>
                    
                                      <?php }//end foreach?>