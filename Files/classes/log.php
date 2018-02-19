<?php include_once "../lib/database.php"; ?>
<?php include_once "../lib/session.php"; 
Session::checkLogin();
?>
<?php include_once "../helpers/format.php"; ?>
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
	
	$email = $this->fm->validation($email);			
	$contact = $this->fm->validation($contact);

	$email = mysqli_real_escape_string($this->db->link, $email);
	$contact = mysqli_real_escape_string($this->db->link, $contact);

		if ($email == "" || $contact == "") {
			$logmsg = "Username Or Password Must Not be Empty!!";
			return $logmsg;
		}else{
			$query = "SELECT * FROM tbl_createuser WHERE email = '$email' AND contact= '$contact' AND status='1' ";
			$result = $this->db->select($query);
			if ($result !=false) {
				$value = $result->fetch_assoc();
				Session::set("login", true);
				Session::set("userId",   $value['regId']);
				Session::set("userName", $value['userName']);
				Session::set("email", $value['email']);
				
				header("Location:index.php");
			}else{
				$logmsg = "Username Or Password Not Match!!";
			    return $logmsg;
			}
		}
	}

	// public function getAllclientfile($uId){
	// 	$query = "SELECT * FROM tbl_files WHERE client = '$uId'";
	// 	$result = $this->db->select($query);
	// 	return $result;
	// }

	}
