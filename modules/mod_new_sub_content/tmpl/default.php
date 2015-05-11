<?php

/**
* @copyright	Copyright (C) 2012 JoomSpirit. All rights reserved.
* Slideshow based on the JQuery script Flexslider
* @license		GNU General Public License version 2 or later
*/

defined('_JEXEC') or die;
$baseurl = JURI::base();
$db = JFactory::getDbo(); 

$articleId=$_REQUEST['articleId'];


$sql="UPDATE #__content SET hits = hits+1 WHERE id=".$articleId;
$db->setQuery($sql);
$db->execute();
    
$queryStr = "SELECT title, images, introtext, created, state FROM #__content WHERE id= ".$articleId;
$db->setQuery($queryStr);     
$row = $db->loadObjectList();

$image = json_decode($row[0]->images);
?>
<div class='new-items'>
    <h3><?php echo $row[0]->title ?></h3>
    <p class='date'><?php echo $row[0]->created ?></p>
    <p class='sub-c'><a href='#'> <img src="images/icon-sub.png" alt=""/>Subscribe</a></p>
    <p><img src="<?php echo $baseurl ?><?php echo $image->image_intro ?>" alt=""/></p>
    <?php echo $row[0]->introtext ?>
</div>