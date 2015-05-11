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
                                
                                for($i=0; $i<3; $i++){
                                    $str = $item[$i]->introtext;
                                    $str= strip_tags($str);
                                    if(strlen($str)>30){
                                        $cutString = substr($str,0,60);
//                                        $str= substr($cutString,0,  strrpos($cutString,'' ));
//                                        print_r($str);
                                    }
                                    ?>
                                     <div class="group1">
                                          <a href="index.php?option=com_content&view=featured&Itemid=151">
                                            <h3><?php echo $item[$i]->title ?></h3>
                                            <!--<p><?php echo $cutString; ?></p>--> 
                                       Read More...</a>
                                </div>
                              <?php  }//and for ?>