<?php include_once "../lib/database.php"; ?>
<?php include_once "../lib/session.php"; 

?>
<?php include_once "../helpers/format.php"; ?>
<?php
class MethodsClass
{
	
	private $db;
	private $fm;
	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function getAllclientfile($email){
	 	$query = "SELECT * FROM tbl_files WHERE client = '$email'";
	 	$result = $this->db->select($query);
	 	return $result;
	 }
	 public function getAllcommonfile($email){
	 	$query = "SELECT * FROM tbl_assignfile WHERE client = '$email'";
	 	$result = $this->db->select($query);
	 	return $result;
	 }

	}
