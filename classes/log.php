<?php include_once "lib/database.php"; ?>
<?php include_once "lib/session.php"; ?>
<?php include_once "helpers/format.php"; ?>
<?php
class Signin
{
	
	private $db;
	private $fm;
	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}



public function userLogin($email, $contact){
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
					$contact = $this->fm->validation($contact);

		$email = mysqli_real_escape_string($this->db->link, $email);
		$contact = mysqli_real_escape_string($this->db->link, $contact);

		if (empty($email) || empty($contact)) {
			$logmsg = "Username Or Password Must Not be Empty!!";
			return $logmsg;
		}else{
			$query = "SELECT * FROM tbl_createuser WHERE email = '$email' AND contact= '$contact' ";
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
