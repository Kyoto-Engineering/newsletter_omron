<?php include_once "lib/database.php";?>
<?php
    $db = new Database();
?>
<?php
    if (!isset($_GET['email']) || $_GET['email'] == NULL ) {
        //echo "<script>window.location = '404.php'</script>";
      }else{
        $user_contact = $_GET['email'];
      }
?>

<?php
	$query = "SELECT * FROM tbl_createuser WHERE email = '$user_contact'";
	$res = $db->select($query);
	if ($res) {
		while ($data = $res->fetch_assoc()) {
			$email = $data['email'];
			$cName = $data['cName'];
			$password =$data['contact'];
		}
	}

	$Uquery = "UPDATE tbl_createuser SET status = '1' WHERE email = '$user_contact'";
	$result = $db->update($Uquery);
	if ($result) {
			?>
                                <script>
                                alert('Successfully Verified');
                                window.location.href='http://newsletter.keal.com.bd/middleware/index.html';
                                </script>
                            <?php


							$headers = 'From: '.$email."\r\n".
							 
							'Reply-To: '.$email."\r\n" .
							 
							'X-Mailer: PHP/' . phpversion();

							$email_to = "omron@keal.com.bd";
							$email_subject= "Welcome to Omron Products & News";
							$email_message= "
Dear $cName
 
 
Congratulations!!
 
Your email has been activated in order to receive information of Omron Products & Latest Happenings/ News. Feel free to browse in the link:
 
http://newsletter.keal.com.bd/middleware/index.html

Please use the following values for accessing your account:

User Name: $email
Password: $password

We thank you for your continuous support!!


Kyoto Engineering & Automation Ltd
on behalf of Omron Industrial Automation, Japan
";
							$headers1 = 'From: '.$email_to."\r\n".
							 
							'Reply-To: '.$email_to."\r\n" .
							 
							'X-Mailer: PHP/' . phpversion();

							$email_subject1= "Welcome to Omron Products & News";
							$email_message1= "
Dear $cName
 
Congratulations!!
 
Your email has been activated in order to receive information of Omron Products & Latest Happenings/ News. Feel free to browse in the link:
 
http://newsletter.keal.com.bd/middleware/index.html

Please use the following values for accessing your account:

User Name: $email
Password: $password

We thank you for your continuous support!!


Kyoto Engineering & Automation Ltd
on behalf of Omron Industrial Automation, Japan";
						$email_message2= 'Date'.$date."\r\n";
							mail("<$email_to>","$email_subject","$email_message","$headers");

							mail("<$email>","$email_subject1","$email_message1","$headers1");
				

			
	}else{
				?>
                                <script>
                                alert('Not Verified');
                                window.location.href='https://newsletter.keal.com.bd';
                                </script>
                            <?php
	}
?>