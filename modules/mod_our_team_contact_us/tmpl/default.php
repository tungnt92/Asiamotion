<?php

/**
* @copyright	Copyright (C) 2012 JoomSpirit. All rights reserved.
* Slideshow based on the JQuery script Flexslider
* @license		GNU General Public License version 2 or later
*/

defined('_JEXEC') or die;
if(!empty($_GET['subject']))
{
	$subjectID=$_GET['subject'];
}else{
	$subjectID="";
}

$baseurl = JURI::base();
  
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	$company=$_REQUEST['company'];
	$fullname=$_REQUEST['fullname'];
	$email=$_REQUEST['email'];
	$phone=$_REQUEST['phone'];
	$subject=$_REQUEST['subject'];
	$message=$_REQUEST['message'];
	
	require_once 'phpmailer.php';
	require_once 'configuration.php';
	function email($from,$fromname,$to,$subject,$msg) {		

		$mail = new PHPMailer();
		$mail->IsMail();
		$mail->CharSet = "utf-8";
		$mail->AddReplyTo($from,$fromname);
		$mail->AddAddress($to);
		$mail->SetFrom($from,$fromname);
		$mail->Subject = $subject;
		$mail->MsgHTML($msg); 
								
		return $mail->Send();
	}
	$content=file_get_contents('./email.html'); 
	$content=str_replace('@name@',$fullname,$content);
	$content=str_replace('@company@',$company,$content);
	$content=str_replace('@fullname@',$fullname,$content);
	$content=str_replace('@email@',$email,$content);
	$content=str_replace('@phone@',$phone,$content);
	$content=str_replace('@subjec@',$subject,$content);
	$content=str_replace('@message@',$message,$content);

	
	$sent = email('toan.lucu@gmail.com','Admin','info@asia-motions.com','Contact Information',$content);
	?>
	
	<script>
      $(function( $ ) {
       $(function() {
        $("#wrapper").css({"display":"none"});
        alert("Registry succesfully");
        
       });
      })(jQuery);
    </script>
<?php
}
?>
<script>
$(function () {
  $("#subject").val("<?php echo $subjectID; ?>");
});

</script>
		<div id="contact_us_form" class='widthgrid'>
			<h3 class='ttl_3'>Get in touch<strong> with us</strong></h3>
            <div class="clearfix">
            	<div class="float-left">
                <form action="index.php?option=com_content&view=featured&Itemid=118" method="post">
                	<input name="company" type="text" value="" placeholder="Company" class="ipt1"/>
                    <input name="fullname" type="text" value="" placeholder="Full Name" class="ipt1"/>
                    <input name="email" type="text" value="" placeholder="Email" class="ipt1"/>
                    <input name="phone" type="text" value="" placeholder="Phone" class="ipt1"/>
                    <input id="subject" name="subject" type="text" value="" placeholder="Subject" class="ipt1"/>
                    <textarea id="message" name="message"  cols="1" rows="1" class="ipt2" placeholder="Message"></textarea>
                    <input type="submit" class="float-right btn1" value="send"/>
                 </form>
                 </div>
				<div class='float-right map' style="margin-right: 80px;">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.203765816105!2d106.73400000000002!3d10.795699999999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752605745d9077%3A0x6ef142ccddb405db!2zMjMgxJDGsOG7nW5nIFPhu5EgMywgS2h1IHBo4buRIDIsIELDrG5oIEFuLCBRdeG6rW4gMg!5e0!3m2!1svi!2s!4v1401416661456" width="570" height="424" frameborder="0" style="border:0"></iframe>
				</div>
			</div>
		</div>
