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
                                      foreach ($homeContentCategory as $home_content){
                                          
                                         $image = json_decode($home_content->images);
                                         $title= explode(" ", $home_content->title) ;   
                                         $tag= explode(",", $image->image_intro_alt) ;                                       

                                         ?>
 <div id='<?php echo "$tag[0]";?>' class="">
		<div class="<?php echo "$tag[1]";?>">
			<div class="<?php echo "$tag[2]";?>">
			 <?php echo $home_content->introtext;?>
			
			</div>
			<img  src="<?php echo "$uri/$image->image_intro"?>" alt=""/>
		</div>
                <div class="infobanner">
                                        <img src="<?php echo "$uri/$image->image_fulltext"?>" alt=""/>
                                        <div class='widthgrid linkbanner'>
                                                <div class='<?php echo "$tag[3]";?> '>
                                                <a href="<?php echo "$tag[4]";?>" class='link-check'>Check it out</a>
                                                <br/>
                                                <h3><?php echo" $title[0]";?> <span><?php echo "$title[1]";?></span></h3>
                                        </div>
                                </div>
                </div>
</div>
                                              <?php } // end foreach           ?>

                                            

