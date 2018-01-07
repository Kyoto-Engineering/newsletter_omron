<?php $filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/session.php');
	Session::checkLogin();

include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
?>

<?php  /**
* 
*/
class Signup
{
	private $db;
	private $fm;
	function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function adminSignin($data){
		$email = $this->fm->validation($data['email']);
		$password = $this->fm->validation($data['password']);

		$email = mysqli_real_escape_string($this->db->link, $email);
		$password = mysqli_real_escape_string($this->db->link, md5($password));

		if (empty($email) || empty($password)) {
			$logmsg = "<span style='color:red'>Username Or Password Must Not be Empty!!</span>";
			return $logmsg;
		}else{
			$query = "SELECT * FROM  tbl_admin WHERE email = '$email' AND password = '$password'";
			$result = $this->db->select($query);
			if ($result !=false) {
				$value = $result->fetch_assoc();
				Session::set("login", true);
				Session::set("adminId",   $value['id']);
				Session::set("adminName", $value['adminName']);
				Session::set("adminRole", $value['type']);
				header("Location:index.php");
			}else{
				$logmsg = "<span style='color:red'>Username Or Password Not Match!!</span>";
			    return $logmsg;
			}
		}

	}
} ?>