<?php

/**
* @copyright	Copyright (C) 2012 JoomSpirit. All rights reserved.
* Slideshow based on the JQuery script Flexslider
* @license		GNU General Public License version 2 or later
*/

defined('_JEXEC') or die;
$baseurl = JURI::base();

?>

                    <div class='widthgrid'>
                                            <h3 class='ttl_1'>Our Team</h3>
                                <div class="ourteam clearfix">
                                    <?php 
                                      $uri =JURI::root();
                                      foreach ($ourTeamCategory as $our_team_content){                                          
                                         $image = json_decode($our_team_content->images);
//                                         $title= explode(" ", $home_content->title) ;   
//                                         $tag= explode(",", $image->image_intro_alt) ;   
                                         $introtext = explode(",", $our_team_content->introtext);
      										$mails .= "mailto:".$introtext[1];
?>
                                    <div class="itemteam">
                                        <img src="<?php echo"$uri/$image->image_intro";?>" alt=""/>
                                        <?php echo"$our_team_content->title" ;?>
                                        <?php echo"$introtext[0]";?><br />

                                        <a href="<?php print_r($mails); ?>"><?php echo $introtext[1]; ?></a>
                                    </div>
                                    <?php 
									$mails="";
									}//end foreach
									?>
                                </div>
                    </div>
	
