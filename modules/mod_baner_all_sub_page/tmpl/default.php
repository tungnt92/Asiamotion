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
   
      foreach ($banerSubPage as $baner){
             $image = json_decode($baner->images);
?>
                                    
                                   <img id ="baner"src="<?php echo "$image->image_intro"; ?>" alt=""/>

                                    
      <?php }	?>
	
	


