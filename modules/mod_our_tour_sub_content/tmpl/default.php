<?php

/**
* @copyright	Copyright (C) 2012 JoomSpirit. All rights reserved.
* Slideshow based on the JQuery script Flexslider
* @license		GNU General Public License version 2 or later
*/

defined("_JEXEC") or die;
$baseurl = JURI::base();
$image = json_decode($item[0]->images);

?>
<div class="bg-tilte">
		<h3 class="widthgrid"><?php echo $item[0]->title ?></h3>
</div>
<div class="bg-gray">
    <div class="widthgrid cleafix">
        <div class="clearfix">
            <div class="float-left document inforight">
            <p><?php echo $item[0]->introtext ?></p>
    <p><a href="#"><?php echo $contactus; ?></a></p>
            </div>
            <div class="float-right imgleft">
            <img src="<?php echo $baseurl ?><?php echo $image->image_intro ?>" alt=""/>
            </div>
        </div>
    </div>
	
</div>