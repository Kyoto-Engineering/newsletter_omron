<?php 
	$filePath = realpath(dirname(__FILE__));
	 include_once ($filePath.'/../lib/database.php');
	 include_once ($filePath.'/../helpers/format.php');
     
?>
<?php
/**
* 
*/
class Picture
{
	
	private $db;
	private $fm;
	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function imageInsert($data, $file){
		$picName = $this->fm->validation($data['fileName']);
		$body    = $this->fm->validation($data['body']);
		$quatetion = $this->fm->validation($data['quotation']);
		
		$picName	 =mysqli_real_escape_string($this->db->link , $fileName);
		$body  		 = mysqli_real_escape_string($this->db->link, $body);
		$quatetion   = mysqli_real_escape_string($this->db->link, $quatetion);
		
// 		if($picName == "" || $body == "" || $quatetion == ""){
//  			$errmsg = "<span style='color:red'>Field Must Not Be Empty !!</span>";
// 		    return $errmsg;
// 		}

		$permited  = array('jpg', 'jpeg', 'png', 'gif');
		 $file_name = $file['uploadImg']['name'];
		 $file_size = $file['uploadImg']['size'];
		 $file_temp = $file['uploadImg']['tmp_name'];

		      $div            = explode('.', $file_name);
		      $file_ext       = strtolower(end($div));
		      $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
		      $uploaded_vid = "uploads/".$unique_image;


		    if ($uploaded_vid == "") {
		    	 
		    	 $errmsg = "<span style='color:red'>Browse Your Picture First And Submit</span>";
		    	 return $errmsg;

		    	}elseif (in_array($file_ext, $permited) === false) {

		     	echo "<span style='color:red'>You can upload only:-".implode(', ', $permited)."</span>";

    			} else {
			    	 move_uploaded_file($file_temp, $uploaded_vid);
			    	 $query = "INSERT INTO tbl_picture(picName, image, body, quotation) VALUES('$picName', '$uploaded_vid', '$body', '$quatetion')";
			    	 $result = $this->db->insert($query);

			    	 if ($result) {
			    	 	$msg = "<span style='color:green;'>Image Upload complete</span>";
			    	 	return $msg;
			    	 }else{
			    	 	$msg = "<span style='color:red;'>Image Upload Not complete</span>";
			    	 	return $msg;
			    	 }
			    	}
	}


	public function vedioInsert($data, $file){
		$fileName = $this->fm->validation($data['fileName']);
		$body    = $this->fm->validation($data['body']);
		$quatetion = $this->fm->validation($data['quatetion']);
		$links = $this->fm->validation($data['links']);

		$fileName	 =mysqli_real_escape_string($this->db->link , $fileName);
		$body  		 = mysqli_real_escape_string($this->db->link, $body);
		$quatetion   = mysqli_real_escape_string($this->db->link, $quatetion);
		$links   = mysqli_real_escape_string($this->db->link, $links);

		if($fileName == "" || $body == "" || $quatetion == ""){
			$errmsg = "<span style='color:red'>Field Must Not Be Empty !!</span>";
		    return $errmsg;
		}

		$permited  = array('mp4', 'avi', 'mov', 'flv');
		 $file_name = $file['vedio']['name'];
		 $file_size = $file['vedio']['size'];
		 $file_temp = $file['vedio']['tmp_name'];

		      $div            = explode('.', $file_name);
		      $file_ext       = strtolower(end($div));
		      $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
		      $uploaded_vid = "vedios/".$unique_image;


		    if ($uploaded_vid == "") {
		    	 
		    	 $errmsg = "<span style='color:red'>Browse Your Picture First And Submit</span>";
		    	 return $errmsg;

		    	}elseif (in_array($file_ext, $permited) === false) {

		     	echo "<span style='color:red'>You can upload only:-".implode(', ', $permited)."</span>";

    			} else {
			    	 move_uploaded_file($file_temp, $uploaded_vid);
			    	 $query = "INSERT INTO tbl_vedio(fileName, vedio, body, quatetion) VALUES('$fileName', '$uploaded_vid', '$body', '$quatetion')";
			    	 $result = $this->db->insert($query);

			    	 if ($result) {
			    	 	$msg = "<span style='color:green;'>Vedio Upload complete</span>";
			    	 	return $msg;
			    	 }else{
			    	 	$msg = "<span style='color:red;'>Image Upload Not complete</span>";
			    	 	return $msg;
			    	 }
			    	}
	}

	public function getAlllist(){
		$query = "SELECT * FROM tbl_picture ORDER BY id DESC";
		$result = $this->db->select($query);
		return $result;
	}
		public function getedit($id){
		$query = "SELECT * FROM tbl_picture WHERE id = '$id'";
		$result = $this->db->select($query);
		return $result;
	}
	
		public function imageUpdate($data, $file, $id){
		$picName = $this->fm->validation($data['picName']);
		$body    = $this->fm->validation($data['body']);
		$quotation = $this->fm->validation($data['quotation']);

		$picName	 =mysqli_real_escape_string($this->db->link , $picName);
		$body  		 = mysqli_real_escape_string($this->db->link, $body);
		$quotation   = mysqli_real_escape_string($this->db->link, $quotation);

		if($picName == "" || $body == "" || $quotation == ""){
			$errmsg = "<span style='color:red'>Field Must Not Be Empty !!</span>";
		    return $errmsg;
		}

		 $permited  = array('jpg', 'jpeg', 'png', 'gif');
		 $file_name = $file['image']['name'];
		 $file_size = $file['image']['size'];
		 $file_temp = $file['image']['tmp_name'];

		      $div            = explode('.', $file_name);
		      $file_ext       = strtolower(end($div));
		      $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
		      $uploaded_image = "uploads/".$unique_image;


		    if ($uploaded_image == "") {
		    	 
		    	 $errmsg = "<span style='color:red'>Browse Your Picture First And Submit</span>";
		    	 return $errmsg;

		    	}elseif (in_array($file_ext, $permited) === false) {

		     	echo "<span style='color:red'>You can upload only:-".implode(', ', $permited)."</span>";

    			} else {
			    	 move_uploaded_file($file_temp, $uploaded_image);
			    	 $query = "UPDATE tbl_picture SET 
			    	 picName   = '$picName',
			    	 body 	   = '$body',
			    	 quotation = '$quotation',
			    	 image     = '$uploaded_image'
			    	 WHERE id = '$id'";

			    	 $result = $this->db->update($query);

			    	 if ($result) {
			    	 	$msg = "<span style='color:green'>Image Update complete</span>";
			    	 	return $msg;
			    	 }else{
			    	 	$msg = "<span style='color:red'>Image Update Not complete</span>";
			    	 	return $msg;
			    	 }
			    	}
	}
	
	public function delpicByid($id){
	    $query = "DELETE FROM tbl_picture WHERE id = '$id'";
	    $result = $this->db->delete($query);
	    if($result){
	        $msg = "<span style='color:green'>Successfully Deleted</span>";
	        return $msg;
	    }else{
	       $msg = "<span style='color:red'>Not Deleted</span>";
	       return $msg; 
	    }
	}
	
	
	public function adduserData($data){
	    $subscribefor = $this->fm->validation($data['subscribefor']);
		$fname = $this->fm->validation($data['name']);
		$lname = $this->fm->validation($data['lname']);
		$email = $this->fm->validation($data['email']);
		$phone = $this->fm->validation($data['phone']);
        
        $subscribefor = mysqli_real_escape_string($this->db->link, $subscribefor);
		$fname = mysqli_real_escape_string($this->db->link, $fname);
		$lname = mysqli_real_escape_string($this->db->link, $lname);
		$email = mysqli_real_escape_string($this->db->link, $email);
		$phone = mysqli_real_escape_string($this->db->link, $phone);

		if ($email == "") {
			$msg = "<span style='color:red'>Field Must Not Be Empty !!</span>";
			return $msg;
		}elseif($subscribefor == ""){
		 	$msg = "<span style='color:red'>Field Must Not Be Empty !!</span>";
			return $msg;   
		}
		
		else{
		    
		    $query="SELECT * FROM tbl_users Where email='$email'";
		    $data = $this->db->select($query);
		    
		    if($data){
		       	$msg = "<span style='color:red'>Email Address is Already Exist!!</span>";
			return $msg;
		    }else{
			$query = "INSERT INTO tbl_users(subscribefor,name, lname, email, phone) VALUES('$subscribefor','$fname', '$lname', '$email', '$phone')";
			$result = $this->db->insert($query);
			if ($result) {
	
							?>
                                <script>
                                alert('Thank You for Subscribing to Our Newsletter Program. An Activation Link Has Been Sent to You by Email. Please Check your Email and Activate the Newsletter Program.');
                               
                                window.location.href='http://newsletter.keal.com.bd';
                                </script>
                            <?php


							$headers = 'From: '.$email."\r\n".
							 
							'Reply-To: '.$email."\r\n" .
							 
							'X-Mailer: PHP/' . phpversion();

							$email_to = "omron@keal.com.bd";
							$email_subject= "Newsletter Subscription Activation";
							$email_message= "
Dear $fname

We would like to keep you updated with the latest happenings in the tech world.
You'll now receive periodically all latest news about our Products:
 
We request you to click the following link in order to activate your account.  

https://newsletter.keal.com.bd/validate.php?email=$email

If you want to learn more about out Newsletter Program feel free to go to the
following link:
 
http://newsletter.keal.com.bd/index.php

Thank you for subscribing to our Newsletter Program.

Have a Nice Day!!

Kyoto Engineering & Automation Ltd
https://omron.keal.com.bd/
";
		
							


							$headers1 = 'From: '.$email_to."\r\n".
							 
							'Reply-To: '.$email_to."\r\n" .
							 
							'X-Mailer: PHP/' . phpversion();

							$email_subject1= "Newsletter Subscription Activation";
		                    $email_message1= "
Dear $fname

 
We would like to keep you updated with the latest happenings in the tech world.
You'll now receive periodically all latest news about our Products:
 
We request you to click the following link in order to activate your account.  

https://newsletter.keal.com.bd/validate.php?email=$email

If you want to learn more about out Newsletter Program feel free to go to the
following link:
 
http://newsletter.keal.com.bd/index.php

Thank you for subscribing to our Newsletter Program.

Have a Nice Day!!

Kyoto Engineering & Automation Ltd
https://omron.keal.com.bd/
";

	                    mail("<$email_to>","$email_subject","$email_message","$headers");

							mail("<$email>","$email_subject1","$email_message1","$headers1");

				
						}else{
						    $msg = "Your Option Not Recorded";
						    return $msg;
						}
     		
			}
		}
	}
		
		public function getuserlist(){
		$query = "SELECT * FROM tbl_users WHERE status = '1'";
		$result = $this->db->select($query);
		return $result;
	}
	
		public function getAlluserlist(){
		$query = "SELECT * FROM tbl_users WHERE status = '0'";
		$result = $this->db->select($query);
		return $result;
	}
	
}?>