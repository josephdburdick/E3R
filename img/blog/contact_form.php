<? 
 // THIS IS THE BEGIINNING OF THE PHP CODE 

$name     = @$HTTP_POST_VARS['name'];
$Pname	  = @$HTTP_POST_VARS['Pname'];
$age	  = @$HTTP_POST_VARS['age'];
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
	$error_msg .= "Your Name \n";
}
if($name){
	$msg .= "Name: \t $name \n";
}
if(!$Pname){
	$error_msg .= "Your E3R ID \n";
}
if($Pname){
	$msg .= "Id: \t $Pname \n";
} 
if(!$age){
	$error_msg .= "Your Age \n";
}
if($age){
	$msg .= "Age: \t $age \n";
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
	$error_msg .= "Your Country \n";
}
if($country){
	$msg .= "Country: \t $country \n";
}

if(!$email){
	$error_msg .= "Your Email \n";
}
if($email){
	if(!eregi("^[a-z0-9_]+@[a-z0-9\-]+\.[a-z0-9\-\.]+$", $email)){
include "index_top.txt";
include "index_header.txt";
echo '<span class="TallRed">
WHoa, missing something!<br></span>
      <span class="white">Unable to create account due to missing information.<br><br>
	~/home/<a href="javascript:history.back()">application</a>/here </span></td>
	  <td width="460" valign="top" style="padding:10px 10px 10px 10px;">
	<table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" background="img/int/post_bg.gif">
      <tr>
        <td class="white">You neglected to fill in a legitimate email address. Without a real email address you will not be able to receive a confirmation email with your login information. Furthermore, if I or the Devlogik team feels that any of your information is bogus we will decline you the right to post with an E3R account.</span></td></tr></table>';
include "index_footer.txt";
echo '</td></tr></table>';
exit;
	}			
	$msg .= "Email: \t $email \n";
}

if($comments){
	$msg .= "Comments: \n $comments \n";
}
$sender_email="";

if(!isset($name)){
	if($name==""){
		$sender_name="Your real name";
	}
}else{
	$sender_name=$name;
}
if(!isset($email)){
	if($email==""){
	$sender_email="Legit email address";
	}
}else{
	$sender_email=$email;
}
if($error_msg != ""){
include "index_top.txt";
include "index_header.txt";
echo '<span class="TallRed">
WHoa, missing something!<br></span>
      <span class="white">Unable to create account due to missing information.<br><br>
    ~/home/<a href="javascript:history.back()">application</a>/here </span></td>
	  <td width="460" valign="top" style="padding:10px 10px 10px 10px;">
	<table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" background="img/int/post_bg.gif">
      <tr>
        <td class="white"><b>You neglected to fill in these required fields:</b><blockquote>';
	echo nl2br($error_msg) .'</blockquote>Please <a href="javascript:history.back()">  return </a> to the'
	  ." previous page and try again.</td></tr></table>";
include "index_footer.txt";
echo '</td></tr></table>';
exit;}
$mailheaders  = "MIME-Version: 1.0\r\n";
$mailheaders .= "Content-type: text/plain; charset=iso-8859-1\r\n";
$mailheaders .= "From: $sender_name <$sender_email>\r\n";
$mailheaders .= "Reply-To: $sender_email <$sender_email>\r\n"; 
mail("e3rjb@msn.com","# E3R APPLICATION -> $name",stripslashes($msg), $mailheaders);
include "index_top.txt";
include "index_header.txt";
echo '<span class="TallRed">
Application Sent Successfully!<br>
</span><span class="white">Congrats, you should hear from us soon.</font></td>
	  <td width="460" valign="top" style="padding:10px 10px 10px 10px;">
	<table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" background="img/int/post_bg.gif">
      <tr>
        <td class="white">
	  Devlogik will be reviewing your submission soon and we will email you your login and password if you are approved for an account. <br>
	  <br>';echo '<font color"red">This is the information you submitted:</font><blockquote>';echo nl2br(stripslashes($msg));echo '</blockquote>~/<a href="http://www.dform.org">home</a>/<a href="javascript:history.back()">application</a>/here</span></td></tr></table>';
include "index_footer.txt";
echo '</td></tr></table>';
//THIS IS THE END OF THE PHP CODE ?>