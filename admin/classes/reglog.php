
<?php include_once "../lib/Database.php"; ?>
<?php include_once "../helper/formate.php"; ?>
<?php
class Signup
{
	
	private $db;
	private $fm;
	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Formate();
	}




	public function userRegistration($data){
		$uName  = $this->fm->validation($data['uName']);
		$cName  = $this->fm->validation($data['cName']);
		$company = $this->fm->validation($data['company']);
		$email = $this->fm->validation($data['email']);
		$contact = $this->fm->validation($data['contact']);

		$uName     = mysqli_real_escape_string($this->db->link, $uName);
		$cName     = mysqli_real_escape_string($this->db->link, $cName);
		$company      = mysqli_real_escape_string($this->db->link, $company);
		$email     = mysqli_real_escape_string($this->db->link, $email);
		$contact     = mysqli_real_escape_string($this->db->link, $contact);
	
	

		if ($uName == "" || $cName == "" || $company== "" || $email == "" || $contact == ""  ) {
			
			$msg = "<span style='color:red'>Field Must Not Be Empty!!</span>";
			return $msg;
		}
		
		//email field must be uniqe so for doing uniqe need to do
		$mailquery = "SELECT * FROM tbl_createuser WHERE email = '$email' OR contact= '$contact'  LIMIT 1";
		$mailchk   = $this->db->select($mailquery);
		if ($mailchk != false) {
			$msg = "<span style='color:red'>Email Or Phone Number Already exist!!</span>";
			return $msg;
			//email unique has done

		}else{
			
					
				
						$query = "INSERT INTO tbl_createuser(uName, cName, company, email, contact) VALUES('$uName', '$cName', '$company', '$email', '$contact')";
	    	 			$inserted_row = $this->db->insert($query);

						if($inserted_row){

							?>
                                <script>
                                alert('An Email Has Been Sent to the Client for Account Verification!');
                                window.location.href='';
                                </script>
                            <?php


							$headers = 'From: '.$email."\r\n".
							 
							'Reply-To: '.$email."\r\n" .
							 
							'X-Mailer: PHP/' . phpversion();

							$email_to = "omron@keal.com.bd";
							$email_subject= "Omron File Sharing Protocol Subscription";
							$email_message= "
Dear $cName
 
Thank you for your interest in Omron Products & News.
 
We are a paperless company. We care for our environment. Therefore, all our documents will be shared with you electronically. You are requested to apply as much care as we do towards safeguarding our environment.

We would like to keep you updated with the latest happenings in the tech world.
You'll now receive periodically all latest news about our Products and related documents for you in our Cloud Facility:

We request you to click the following link in order to avail our Cloud Facility and 'Activate' your account. 

https://newsletter.keal.com.bd/activation.php?email=$email

You will receive an email confirmation once your account is activated. 
 
If you want to learn more about out Newsletter Program feel free to go to the
following link:

http://newsletter.keal.com.bd/index.php

Thank you for subscribing to our Cloud Services.

Have a Nice Day!!

Kyoto Engineering & Automation Ltd
https://omron.keal.com.bd/";
							
							


							$headers1 = 'From: '.$email_to."\r\n".
							 
							'Reply-To: '.$email_to."\r\n" .
							 
							'X-Mailer: PHP/' . phpversion();

							$email_subject1= "Omron File Sharing Protocol Subscription";
		  $email_message1= "
Dear $cName,


 
Thank you for your interest in Omron Products & News.
 
We are a paperless company. We care for our environment. Therefore, all our documents will be shared with you electronically. You are requested to apply as much care as we do towards safeguarding our environment.

We would like to keep you updated with the latest happenings in the tech world.
You'll now receive periodically all latest news about our Products and related documents for you in our Cloud Facility:

We request you to click the following link in order to avail our Cloud Facility and 'Activate' your account. 

https://newsletter.keal.com.bd/validate.php?email=$email

You will receive an email confirmation once your account is activated. 
 
If you want to learn more about out Newsletter Program feel free to go to the
following link:

http://newsletter.keal.com.bd/index.php

Thank you for subscribing to our Cloud Services.

Have a Nice Day!!

Kyoto Engineering & Automation Ltd
https://omron.keal.com.bd/";

	                    mail("<$email_to>","$email_subject","$email_message","$headers");

							mail("<$email>","$email_subject1","$email_message1","$headers1");

						}
					
				}
			}


			public function userLogin($email, $phone){
			//$email= mysqli_real_escape_string($this->db->link, $data['email']);
		    //$phone = mysqli_real_escape_string($this->db->link, $data['phone']);


		    //if (empty($email) || empty($phone)) {
		    	/*$msg = "Input User email or Pass";
				return $msg;
		    }

		    $query  = "SELECT * FROM tbl_user_reg WHERE email = '$email' AND phone = '$phone'";
		    	$result = $this->db->select($query);
		    	if ($result !=false) {
		    		$value = $result->fetch_assoc();

		    		Session::set("userLogin", true);
		    		Session::set("userId", $value['regId']);
		    		Session::set("userName",$value['userName']);
		    		echo "<script>window.location = 'index.php'</script>";

		    	} else{
		    		$msg = "<span style='color:red'>User email or Password Not Match</span>";
				    return $msg;
		    	}*/

		    		$email = $this->fm->validation($email);
					$phone = $this->fm->validation($phone);

		$email = mysqli_real_escape_string($this->db->link, $email);
		$phone = mysqli_real_escape_string($this->db->link, $phone);

		if (empty($email) || empty($phone)) {
			$logmsg = "Username Or Password Must Not be Empty!!";
			return $logmsg;
		}else{
			$query = "SELECT * FROM tbl_createuser WHERE email = '$email' AND phone = '$phone' AND status = '1'";
			$result = $this->db->select($query);
			if ($result !=false) {
				$value = $result->fetch_assoc();
				Session::set("login", true);
				Session::set("userId",   $value['regId']);
				Session::set("userName", $value['userName']);
				
				header("Location:index.php");
			}else{
				$logmsg = "Username Or Password Not Match!!";
			    return $logmsg;
			}
		}
	}

	}

	?>