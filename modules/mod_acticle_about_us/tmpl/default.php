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

			<h3 class='ttl_4'>What They Said About Us</h3>
<?php
                                      $uri =JURI::root();
                                      foreach ($categoryAboutUs as $article){                                          
                                         $image = json_decode($article->images);
//                                         $title= explode(" ", $home_content->title) ;   
//                                         $tag= explode(",", $image->image_intro_alt) ;                                       
                                         ?>
         		
                         <div class="clearfix dotleft document">
                                <p><?php echo"$article->introtext" ?></p>
				<p class='text-right'><strong><?php echo"$image->image_intro_alt" ?></strong></p>
<!--				<p class='text-right'><a href='#'>Read more</a></p>-->
                         </div>
                        
                        



    <?php } // end foreach           ?>
</div>