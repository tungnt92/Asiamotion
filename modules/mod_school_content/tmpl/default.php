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
                                      foreach ($schoolTripContent as $school_trip_content){                                          
                                         $image = json_decode($school_trip_content->images);
//                                         $title= explode(" ", $home_content->title) ;   
//                                         $tag= explode(",", $image->image_intro_alt) ;                                       

                                         ?>
                                 <div class='widthgrid cleafix'>

                                            <div class='clearfix'>
                                                      <div class='float-left document inforight'>
                                                         <?php
                                                            echo"$school_trip_content->introtext";
                                                        ?>

                                                      </div>
                                                      <div class="float-right imgleft">
                                                          <h3 class='text-center'><?php echo"$image->image_intro_alt"?></h3>
                                                          <img style="margin-top: 15px;"src="<?php echo"$uri/$image->image_intro"?>" alt=""/>
                                                      </div>

                                         </div>
                            </div>

    <?php } // end foreach           ?>