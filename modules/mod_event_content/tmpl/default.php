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
                                      foreach ($eventArticleId as $event_article){
                                          
//                                         $image = json_decode($home_content->images);
//                                         $title= explode(" ", $home_content->title) ;   
//                                         $tag= explode(",", $image->image_intro_alt) ;                                       

                                         ?>

                                  <?php echo"$event_article->introtext "; ?>

                                      <?php }//end foreach?>