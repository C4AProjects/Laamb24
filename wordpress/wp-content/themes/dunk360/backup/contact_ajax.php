<?php
//if(!defined("REL")) { exit(); }
define('ADMIN', 'info@angiogroup.com');

// Function to validate email
function spamcheck($field){
  //filter_var() sanitizes the e-mail
  //address using FILTER_SANITIZE_EMAIL
  $field=filter_var($field, FILTER_SANITIZE_EMAIL);

  //filter_var() validates the e-mail
  //address using FILTER_VALIDATE_EMAIL
  if(filter_var($field, FILTER_VALIDATE_EMAIL))
    {
    return TRUE;
    }
  else
    {
    return FALSE;
    }
  
}


$post = (!empty($_POST)) ? true : false;
$msg = '';
if($post && stripslashes($_POST['form_name']) == 'contactusform'){



$name = stripslashes($_POST['name']);
$name2 = stripslashes($_POST['name2']);
$email = trim($_POST['email']);
$phone = stripslashes($_POST['phone']);
$message = strip_tags(htmlspecialchars($_POST['comments']));
$answer = stripslashes($_POST['answer']);
$lang = stripslashes($_POST['form_language']);
$error = '';

//if($_method){exit();} // check against spambots

if(!$name)
{
	$error .= 'Please First Name is required.<br />';
}
if(!$name2)
{
	$error .= 'Please Last Name is required.<br />';
}
if(!$email)
{
$error .= 'Please Email Address is required.<br />';
}
if($email!="" && spamcheck($email)==FALSE){
	$error .= 'Please Email Address must be a valid email address.<br />';
}
if(!$message)
{
$error .= 'Please Comments is required.<br />';
}
// Check message (length)
if($message && strlen($message) < 10)
{
$error .= "Please enter Comments. It should have at least 10 characters.<br />";
}

if(!$answer)
{
$error .= 'Please provide an answer to the question.<br />';
}
// Check message (length)
if($answer && strtolower($answer) != 'angio')
{
$error .= "Please enter \"angio\" as the answer.<br />";
}

if(!$error)
{
	$name = $name .' '.$name2;
	$subject = 'DataOne Contact from: '.$name;
	$message = 'A contact has been received. 
From: '.$name. '  
IP Address: '.$_SERVER['REMOTE_ADDR'] . ' 
Phone Number: '.$phone.' 
The message below was sent with it: 
	 
	 '.$message;
	$mail = mail(ADMIN, $subject, $message,
     "From: ".$name." <".$email.">\r\n"
    ."Reply-To: ".$name."<".$email.">\r\n");

if($mail)
{
	//header("Location: ".BASE.Menu::seoUrl('?ui=contact-success'));
// $msg = 'Thank you for your feedback, we will be in touch as soon as we can!';
 $_POST=array(); //$type = 'success';
echo '<div class="success">Thank you for your message, we will be in touch shortly!</div>';
}

}
else
{
 //$msg = $error;
 //$type = 'error';
 echo $error;
}

}
?>