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
			    	 $query = "INSERT INTO tbl_picture(picName, image, body, quotation) VALUES('$picName', '$uploaded_image', '$body', '$quotation')";
			    	 $result = $this->db->insert($query);

			    	 if ($result) {
			    	 	$msg = "<span>Image Upload complete</span>";
			    	 	return $msg;
			    	 }else{
			    	 	$msg = "<span>Image Upload Not complete</span>";
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

	public function deldelpicByid($id){
		$query = "DELETE * FROM tbl_picture WHERE id = '$id'";
		$result = $this->db->delete($query);
		if ($result) {
			$msg = "Successfully Deleted";
			return $msg;
		}else{
			$msg = "Not Successfully Deleted";
			return $msg;
		}
	}


	public function adduserData($data){
		$fname = $this->fm->validation($data['name']);
		$lname = $this->fm->validation($data['lname']);
		$email = $this->fm->validation($data['email']);
		$phone = $this->fm->validation($data['phone']);

		$fname = mysqli_real_escape_string($this->db->link, $fname);
		$lname = mysqli_real_escape_string($this->db->link, $lname);
		$email = mysqli_real_escape_string($this->db->link, $email);
		$phone = mysqli_real_escape_string($this->db->link, $phone);

		if ($fname == "" || $lname == "" || $email == "" || $phone == "") {
			$msg = "<span style='color:red'>Field Must Not Be Empty !!</span>";
			return $msg;
		}else{
			$query = "INSERT INTO tbl_users(name, lname, email, phone) VALUES('$fname', '$lname', '$email', '$phone')";
			$result = $this->db->insert($query);
			if ($result) {
				$msg = "<span style='color:green'>Successfully Subscribed</span>";
				return $msg;
			}else{
				$msg = "<span style='color:green'>Not Added</span>";
				return $msg;
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