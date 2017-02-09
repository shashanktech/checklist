<?php
require("class.PHPMailer.php");
$mail = new PHPMailer();
$mail->IsSMTP();                                      // set mailer to use SMTP
$mail->Host = "smtp1.example.com;smtp2.example.com";  // specify main and backup server
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->Username = "jswan";  // SMTP username
$mail->Password = "secret"; // SMTP password
$mail->From = "from@example.com";
$mail->FromName = "Mailer";
$mail->AddAddress("josh@example.net", "Josh Adams");
$mail->AddAddress("ellen@example.com");                  // name is optional
$mail->AddReplyTo("info@example.com", "Information");
$mail->WordWrap = 50;                                 // set word wrap to 50 characters
$mail->AddAttachment("/var/tmp/file.tar.gz");         // add attachments
$mail->AddAttachment("/tmp/image.jpg", "new.jpg");    // optional name
$mail->IsHTML(true);                                  // set email format to HTML
$mail->Subject = "Here is the subject";
$mail->Body    = "This is the HTML message body <b>in bold!</b>";
$mail->AltBody = "This is the body in plain text for non-HTML mail clients";
if(!$mail->Send()){
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;}
echo "Message has been sent";


// posted to this page from our html contact form
$email = $_REQUEST['email'] ;
$message = $_REQUEST['message'] ;
// When we unzipped PHPMailer, it unzipped to
// public_html/PHPMailer_5.2.0
require("lib/PHPMailer/PHPMailerAutoload.php");
$email = new PHPMailer();
// set mailer to use SMTP
$email->IsSMTP();
// As this email.php script lives on the same server as our email server
// we are setting the HOST to localhost
$email->Host = "localhost";  // specify main and backup server
$email->SMTPAuth = true;     // turn on SMTP authentication
// When sending email using PHPMailer, you need to send from a valid email address
// In this case, we setup a test email account with the following credentials:
// email: send_from_PHPMailer@venkat@wikitechy.com
// pass: password
$email->Username = "send_from_PHPMailer@venkat@wikitechy.com";  // SMTP username
$email->Password = "password"; // SMTP password
// $email is the user's email address the specified
// on our contact us page. We set this variable at
// the top of this page with:
// $email = $_REQUEST['email'] ;
$email->From = $email;
// below we want to set the email address we will be sending our email to.
$email->AddAddress("venkat@wikitechy.com", "venkat");
// set word wrap to 50 characters
$email->WordWrap = 50;
// set email format to HTML
$email->IsHTML(true);
$email->Subject = "You have received feedback from your website!"

$email->Subject = "You have received feedback from your website!";

// $message is the user's message they typed in
// on our contact us page. We set this variable at
// the top of this page with:
// $message = $_REQUEST['message'] ;
$email->Body    = $message;
$email->AltBody = $message;
if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}
echo "Message has been sent";
?>
?>


<form method="post" action="email.php">
  Email: <input name="email" id="email" type="text" /><br />
  Message:<br />
  <textarea name="message" id="message" rows="15" cols="40"></textarea><br />
  <input type="submit" value="Submit" />
</form>

<? $email = $_REQUEST['email'] ;
  $message = $_REQUEST['message'] ;
  // here we use the php mail function
  // to send an email to:
  // you@example.com
  mail( "venkat@wikitechy.com", "Feedback Form Results",$message, "From: $email" );

  ?>