<?php

/**
* @copyright	Copyright (C) 2012 JoomSpirit. All rights reserved.
* Slideshow based on the JQuery script Flexslider
* @license		GNU General Public License version 2 or later
*/

defined('_JEXEC') or die;
$baseurl = JURI::base();

?>
    <script>
  /* when document is ready */
  $(function(){

    /* initiate the plugin */
    jQuery("div.holder").jPages({
      containerID  : "itemContainer",
      perPage      : 6,
      startPage    : 1,
      startRange   : 1,
      midRange     : 5,
      endRange     : 1
    });

  });
 
  </script>
  
  <script type="text/javascript">
		$(document).ready(function() {

			jQuery('.fancybox').fancybox();

		});
	</script>
<h3 class='ttl_3'>Gallery</h3>
<div class='gallery clearfix'>

      <!-- item container -->
      <ul id="itemContainer">
 	<?php   
	for($i = 0; $i<$tmp; $i++)
	{
	?>	
    	<li style="list-style:none">
        <div class='itemglls'>
        <a class="fancybox" href="<?php echo  $baseurl; ?>components/com_rsmediagallery/assets/gallery/original/<?php echo $rows[$i]->filename ;?>" data-fancybox-group="gallery">
        	<img style="width:300px; height:270px;" src="<?php echo  $baseurl; ?>components/com_rsmediagallery/assets/gallery/<?php echo $rows[$i]->filename ;?>" alt="image"/>
         </a>
        </div>
        </li>
	<?php
    }
    ?>
    </ul>

</div>
<div class='pagin clearfix'>
<!--    <a class='float-left' href='#'><< Previous</a>
    <a class='float-right' href='#'>Next >></a>-->
       <!-- navigation holder -->
      <div class="holder"></div>
</div>