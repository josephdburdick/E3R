<? 
 // THIS IS THE BEGIINNING OF THE PHP CODE 

$name     = @$HTTP_POST_VARS['name'];
$Pname	  = @$HTTP_POST_VARS['Pname'];
$address  = @$HTTP_POST_VARS['address'];
$state    = @$HTTP_POST_VARS['state'];
$city     = @$HTTP_POST_VARS['city'];
$zip      = @$HTTP_POST_VARS['zip'];
$country  = @$HTTP_POST_VARS['country'];
$phone    = @$HTTP_POST_VARS['phone'];
$email    = @$HTTP_POST_VARS['email'];
$comments = @$HTTP_POST_VARS['comments'];
$fax      = @$HTTP_POST_VARS['fax'];
$error_msg="";
$msg="";

if(!$name){
	$error_msg .= "Your name \n";
}
if($name){
	$msg .= "Name: \t $name \n";
}
if(!$Pname){
	$error_msg .= "Your Posting Identity \n";
}
if($Pname){
	$msg .= "Id: \t $name \n";
} 
if(!$city){
	$error_msg .= "Your City \n";
}
if($city){
	$msg .= "City: \t $city \n";
}

if(!$state){
	$error_msg .= "Your State \n";
}
if($state){
	$msg .= "State: \t $state \n";
}
 
if(!$country){
	$error_msg .= "Your country \n";
}
if($country){
	$msg .= "Country: \t $country \n";
}

if(!$email){
	$error_msg .= "Your email \n";
}
if($email){
	if(!eregi("^[a-z0-9_]+@[a-z0-9\-]+\.[a-z0-9\-\.]+$", $email)){
		echo 'That is not a valid email address.  Please<a href="javascript:history.back()"> return </a>  to the previous page and try again.';
		exit;
	}			
	$msg .= "Email: \t $email \n";
}

if($comments){
	$msg .= "Comments: \t $comments \n";
}
$sender_email="";

if(!isset($name)){
	if($name==""){
		$sender_name="E3R Reader";
	}
}else{
	$sender_name=$name;
}
if(!isset($email)){
	if($email==""){
	$sender_email="ithrewpoo@yermom.com";
	}
}else{
	$sender_email=$email;
}
if($error_msg != ""){
	echo"You didn't fill in these required fields:<br>"
	. nl2br($error_msg) .'<br>Please <a href="javascript:history.back()">  return </a> to the'
         ." previous page and try again.";
exit;}
$mailheaders  = "MIME-Version: 1.0\r\n";
$mailheaders .= "Content-type: text/plain; charset=iso-8859-1\r\n";
$mailheaders .= "From: $sender_name <$sender_email>\r\n";
$mailheaders .= "Reply-To: $sender_email <$sender_email>\r\n"; 
mail("e3rjb@msn.com","# E3R APPLICATION -> $name",stripslashes($msg), $mailheaders);
 echo "<html>  <head> <title>Thanks For Your Submission
</title>
</head>
<body>  
<h2>Thank you for your feedback $name</h2>
";echo '<b>This is the information you submitted</b> <br>';echo nl2br(stripslashes($msg));echo '<br><br></body></html>';
//THIS IS THE END OF THE PHP CODE ?>