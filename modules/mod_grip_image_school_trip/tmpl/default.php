<?php

/**
* @copyright	Copyright (C) 2012 JoomSpirit. All rights reserved.
* Slideshow based on the JQuery script Flexslider
* @license		GNU General Public License version 2 or later
*/

defined('_JEXEC') or die;
$baseurl = JURI::base();
$db = JFactory::getDbo();
?>


<?php

foreach ($schoolTripGirdImage as $schooltripgirdimage){                                          
	$image = json_decode($schooltripgirdimage->params);

	$queryStr = "SELECT id,title, state FROM #__content as b WHERE b.catid= ".$schooltripgirdimage->id." AND state=1 ORDER BY ordering";      
	$db->setQuery($queryStr);     
	$school= $db->loadObjectList();                                       
                                         ?>
<div class="widthgrid">
        <div class='itemglls'>
            <a href="index.php?option=com_content&view=featured&Itemid=161&categoryID=<?php echo $schooltripgirdimage->id; ?>&articleID=<?php echo $school[0]->id; ?>&title=<?php echo $school[0]->title;?>">
                <img style="width:300px; height:270px;" src="<?php echo $baseurl ?><?php echo $image->image ?>" alt=""/>
                                <span class="hover-bg"><p style="text-align: center; margin-top: 140px; padding: 0 10px;"><?php echo $schooltripgirdimage->note ?></p></span>
                            <h3>
                                <?php echo $schooltripgirdimage->title ?>
                            </h3>
                           
                        </a>
        </div>
  </div>
    
 <?php 
 	} // end foreach          
?>

                                            
