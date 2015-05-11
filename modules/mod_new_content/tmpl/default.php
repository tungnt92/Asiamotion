<?php

/**
* @copyright	Copyright (C) 2012 JoomSpirit. All rights reserved.
* Slideshow based on the JQuery script Flexslider
* @license		GNU General Public License version 2 or later
*/

defined('_JEXEC') or die;
$baseurl = JURI::base();
$url = JURI::current();
$flag=count($item);
//xac dinh bao nhieu dong
	$display = 2;
	$start = (isset($_GET['start']) && (int)$_GET['start']>=0) ? $_GET['start'] : 0;
	if($flag > $display) {
			$page = ceil($flag/$display);
		} else {
			$page = 1;
		}
	$db = JFactory::getDbo();     
	$queryStr = "SELECT title, images, introtext, created, state FROM #__content as b WHERE b.catid= ".$articleId." AND state=1 ORDER BY ordering LIMIT $start,$display";
	$db->setQuery($queryStr);     
	$row = $db->loadObjectList();
	$tmp = count($row);  

for($i=0;$i<$tmp;$i++)
{
	$image = json_decode($row[$i]->images);
?>

<div class='new-items'>
    <h3><?php echo $row[$i]->title ?></h3>
    <p class='date'><?php echo $row[$i]->created ?></p>
    <p class='sub-c'><a class="modalLink" href="#modal1"> <img src="images/icon-sub.png" alt=""/>Subscribe</a></p>
    <p><img src="<?php echo $baseurl ?><?php echo $image->image_intro ?>" alt=""/></p>
    <?php echo $row[$i]->introtext ?>
</div>
<?php
}
?>
	<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery("#email").keypress(function(e){
            if (e.which == 13) { 
                subsribe();
                return false;
            }
         });
        });
     function subsribe()
      {
            var email = $('#email').val();
            if(email!="") 
            {          
            jQuery.ajax({
                url: '/wn-am/subsribe.php',
                type: 'POST',
                data: jQuery('#sub-form').serializeArray(),
                success: function (response) {
                    alert(response);
                },
                error: function () { 
                    alert("Error");
                }
            }); 
            }else{
                alert("Please check your email correctly!");
            }
      }
    </script>
    <div class="overlay"></div>
    <div id="modal1" class="modal">
    <p class="closeBtn">Close</p><br />

    <form method="POST" id="sub-form">
    	<input type="text" name="email" id="email" placeholder="Enter your Email to subscribe" class="ipt3"/>
        <input type="button" id="btnsubmit" class="btn2" value="SEND" onclick="subsribe()"/>
    </form>
    </div>
    
    <div class='pagination'>
        <ul class='nav' style="display:flex">
     <?php
        if($page > 1) {
            
            $next = $start + $display;
            $prev = $start - $display;
            $current = ($start/$display)+1;
            if($current !=1) 
            {
            ?>
            <div style='position:relative'>
            <a id='a_pagination' href='<?php echo $url ?>?view=featured&start=<?php echo $prev ?>&page=<?php echo $page ?>'>
            <p id='chosen'><?php echo "<" ?></p>
            </a>
            </div>
            <?php
            }
            //Hien thi so link
            for($i=1;$i<=$page;$i++) 
            {
                if($current != $i) 
                {
                ?>
                <div style='position:relative'>
                    <a id='a_pagination' href='<?php echo $url ?>?view=featured&start=<?php echo $display*($i-1);?>&page=<?php echo $i ?>'>
                        <p id='chosen'><?php echo $i ?></p>
                    </a>
                </div>
                <?php
                } else {
                ?>
                <div style='position:relative'>
                    <a id='a_pagination'>
                        <p id='chosen'><?php echo $i?></p>
                    </a>
                </div>
                <?php
                }
            }
            if($current != $page) 
            {
            ?>
            <div style='position:relative'>
            <a id='a_pagination' href='<?php echo $baseurl ?>index.php?start=<?php echo $next ?>&page=<?php echo $page ?>'>			
            <p id='chosen'><?php echo ">" ?></p>
            </a>
            </div>
        <?php
            }    
        }
        ?>
        </ul>
    </div>