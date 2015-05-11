<?php

/**
* @copyright	Copyright (C) 2012 JoomSpirit. All rights reserved.
* Slideshow based on the JQuery script Flexslider
* @license		GNU General Public License version 2 or later
*/

defined('_JEXEC') or die;
$baseurl = JURI::base();
$idmenu = JFactory::getApplication();
$menu = $idmenu->getMenu()->getActive()->id;
if($menu==114)
{
	$active114="activemenutop";
}else{
	$active114="";
}
if($menu==115)
{
	$active115="activemenutop";
}else{
	$active115="";
}
if($menu==116)
{
	$active116="activemenutop";
}else{
	$active116="";
}
if($menu==117)
{
	$active117="activemenutop";
}else{
	$active117="";
}
if($menu==118)
{
	$active118="activemenutop";
}else{
	$active118="";
}
if($menu==151)
{
	$active151="activemenutop";
}else{
	$active151="";
}
?>

<!--                <li class='menu1'><a href="index.php?option=com_content&view=featured&Itemid=114"> <img src="images/menu1.png" alt=""/><main class="text" >Home</main></a></li>
                <li class='menu2'><a href="index.php?option=com_content&view=featured&Itemid=115"> <img src="images/menu2.png" alt=""/></a></li>
                <li class='menu3'><a href="index.php?option=com_content&view=featured&Itemid=116"> <img src="images/menu3.png" alt=""/></a></li>
                <li class='menu4'><a href="index.php?option=com_content&view=featured&Itemid=117"> <img src="images/menu4.png" alt=""/></a></li>
                <li class='menu5'><a href="index.php?option=com_content&view=featured&Itemid=118"> <img src="images/menu5.png" alt=""/></a></li>
                <li class='menu6'><a href="index.php?option=com_content&view=featured&Itemid=151"> <img src="images/menu6.png" alt=""/></a></li>-->
                
                <li class='menuhome'><a href="index.php"><img src="images/Home.png" alt=""/><h3 style="color:#FFF;" class="text" ><br />Home</h3></a></li>	
                        
                <li class='menu1'><a href="index.php?option=com_content&view=featured&Itemid=114"><img src="images/Schooltrip.png" alt=""/><h3 class="text <?php echo $active114; ?>" >School<br />Trips</h3></a></li>
                <li class='menu2'><a href="index.php?option=com_content&view=featured&Itemid=115"><img src="images/Camp.png" alt=""/><h3 class="text <?php echo $active115; ?>" >Holiday<br />Camps</h3></a></li>
                <li class='menu3'><a href="index.php?option=com_content&view=featured&Itemid=116"><img src="images/Team.png" alt=""/><h3 class="text <?php echo $active116; ?>" >Team<br />Building</h3></a></li>
                <li class='menu4'><a href="index.php?option=com_content&view=featured&Itemid=117"><img src="images/Tours.png" alt=""/><h3 class="text <?php echo $active117; ?>" >Our<br />Tours</h3></a></li>
                <li class='menu5'><a href="index.php?option=com_content&view=featured&Itemid=118"><img src="images/About.png" alt=""/><h3 class="text <?php echo $active118; ?>" >About<br />Us</h3></a></li>
                <li class='menu6'><a href="index.php?option=com_content&view=featured&Itemid=151"><img src="images/News.png" alt=""/><h3 class="text <?php echo $active151; ?>" >Our<br />Blog</h3></a></li>
					

<?php
//                                      $uri =JURI::root();
//                                      foreach ($homeMenu as $home_menu_all_page){                                          
//                                         $image = json_decode($home_menu_all_page->params);
////                                         $title= explode(" ", $home_content->title) ;   
////                                         $tag= explode(",", $image->image_intro_alt) ;                                       
//
//                                         ?>
<!--                                        <li class="//<?php echo"$home_menu_all_page->note"?>"><a href="<?php echo"$home_menu_all_page->link"?>">
                                                <img src="//<?php echo "$uri/$image->menu_image"?>" alt=""/></a>
                                        </li>
                            </ul-->
