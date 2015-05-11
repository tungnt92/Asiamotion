<?php

/**
* @copyright	Copyright (C) 2012 JoomSpirit. All rights reserved.
* Slideshow based on the JQuery script Flexslider
* @license		GNU General Public License version 2 or later
*/

defined('_JEXEC') or die;
$baseurl = JURI::base();



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

<div class='banner-right float-right'>
   
    <div class="src">
    <form method="POST" id="sub-form">
    	<input type="text" name="email" id="email" placeholder="Enter your Email to subscribe" class="ipt3"/>
        <input type="button" id="btnsubmit" class="btn2" value="SEND" onclick="subsribe()"/>
    </form>
    </div>
</div>