<?php
require 'configuration.php';
$conf = new JConfig();
$conn = mysql_connect($conf->host, $conf->user,$conf->password);
mysql_select_db($conf->db, $conn);
function addEmailExclusives($sql){
	global $conn;
	$result = false;
	if(mysql_query($sql, $conn)){
		$result = true;
	}else {
		die(mysql_error($conn));
	}
	 
	return $result;
}
$email = $_POST['email'];
$myquery = "INSERT INTO  llnzu_contact_details(name) VALUES('$email')";
$result = addEmailExclusives($myquery);
if($result){
	echo 'Thank you!';
}
else{
	echo 'Please try again.';
}
?>