<?php 
	$filePath = realpath(dirname(__FILE__));
	 include_once ($filePath.'/../lib/database.php');
	 include_once ($filePath.'/../helpers/format.php');
     
?>

<?php
/**
* 
*/
class Mailer
{
	
	private $db;
	private $fm;
	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function sendmail($data){

		$descrip = $this->fm->validation($data['description']);
		
		$descrip = mysqli_real_escape_string($this->db->link, $descrip);



            if ($descrip == "") {
            	$msg = "Field is empty!!";
            	return $msg;	
            }else{	

    include("../../mailer/class.phpmailer.php");
	include("../../mailer/class.pop3.php");
	include("../../mailer/class.smtp.php");
	$mail = new PHPMailer();
	//$mail->IsSMTP(); // telling the class to use SMTP
	//$mail->Host = "apprelay.trc.com"; // SMTP server
	$mail->Encoding ="base64";
	$mail->IsMail();
	$mail->From     = "protyasha.s@keal.com.bd";
	$mail->FromName = "Mailer-Today";
	$mail->AddAddress("arnab.r@keal.com.bd");
	$headers = "MIME-Version: 1.0\n";
	$headers .= "Content-Type: multipart/alternative";
	$mail->AddCustomHeader($headers);
	$mail->WordWrap = 50;                              // set word wrap
	$mail->AddEmbeddedImage("GM Community Profile Image.jpg", "my-attach", "image/jpeg");
	$mail->Body = '<img alt="PHPMailer" src="cid:my-attach">  ';
	$mail->IsHTML(true);                               // send as HTML
	$mail->Subject  =  "image !!!!!!!!";
	$mail->AltBody  =  "This is the text-only body";
	if(!$mail->Send())
	{
	   $msg = "Message was not sent";
	   return $msg;
	    $msg = "Mailer Error: " . $mail->ErrorInfo;
	   exit;
	}
	else
	{
	    $msg = "Message has been sent";
	    return $msg;
	}
       	}

}


}?>