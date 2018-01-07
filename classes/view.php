<?php 
	$filePath = realpath(dirname(__FILE__));
	 include_once ($filePath.'/../lib/database.php');
	 include_once ($filePath.'/../helpers/format.php');
     
?>

<?php
/**
* 
*/
class Show
{
	
	private $db;
	private $fm;
	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function getAllpicture(){
		$query = "SELECT * FROM tbl_picture ORDER BY id DESC";
		$result = $this->db->select($query);
		return $result;
	}

	public function getAllvedio(){
		$query = "SELECT * FROM tbl_vedio ORDER BY id DESC";
		$result = $this->db->select($query);
		return $result;
	}
}
?>