<?php $filepath = realpath(dirname(__FILE__));


include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helper/formate.php');
?>

<?php  /**
* 
*/
class Post
{
	private $db;
	private $fm;
	function __construct()
	{
		$this->db = new Database();
		$this->fm = new Formate();
	}

	public function postInsert($data, $file, $date, $day, $time){
		$title = $this->fm->validation($data['title']);
		$description = $this->fm->validation($data['description']);
        $author = $this->fm->validation($data['author']);
       


		$title = mysqli_real_escape_string($this->db->link, $title);
		$description = mysqli_real_escape_string($this->db->link, $description);
		$author = mysqli_real_escape_string($this->db->link, $author);

		if (empty($title) || empty($description) || empty($author) ) {
			$logmsg = "<span style='color:red'>Field Must Not be Empty!!</span>";
			return $logmsg;
		}
			$permited  = array('jpg', 'jpeg', 'png', 'gif');
		 $file_name = $file['image']['name'];
		 $file_size = $file['image']['size'];
		 $file_temp = $file['image']['tmp_name'];

		      $div            = explode('.', $file_name);
		      $file_ext       = strtolower(end($div));
		      $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
		      $uploaded_vid = "uploads/".$unique_image;



		     if ($uploaded_vid == "") {
		    	 
		    	 $errmsg = "<span style='color:red'>Browse Your Picture First And Submit</span>";
		    	 return $errmsg;

		    	}elseif (in_array($file_ext, $permited) === false) {

		     	echo "<span style='color:red'>You can upload only:-".implode(', ', $permited)."</span>";

    			}else{
    				 move_uploaded_file($file_temp, $uploaded_vid);
			 		$query = "INSERT INTO tbl_post(title, description, author, datee, day, timee, image) VALUES('$title', '$description', '$author', '$date', '$day', '$time', '$uploaded_vid')";
			    	 $result = $this->db->insert($query);

			    	 if ($result) {
			    	 	$msg = "<span>Post Upload complete</span>";
			    	 	return $msg;
			    	 }else{
			    	 	$msg = "<span>Post Upload Not complete</span>";
			    	 	return $msg;
			    	 }
		}
}
		public function getAllpost(){
		$query = "SELECT * FROM tbl_post ORDER BY id DESC";
		$result = $this->db->select($query);
		return $result;
	}
	public function getAlldate(){
		$query = "SELECT * FROM tbl_post ORDER BY id DESC";
		$result = $this->db->select($query);
		return $result;
	}
	public function getpost($id){
		$query = "SELECT * FROM tbl_post WHERE id='$id'";
		$result = $this->db->select($query);
		return $result;
	}
public function getdate($id){
		$query = "SELECT * FROM tbl_post WHERE datee='$id'";
		$result = $this->db->select($query);
		return $result;
	}

	public function pdfInsert($data, $file, $date, $time){
		$title = $this->fm->validation($data['title']);
		$quote = $this->fm->validation($data['quote']);
        $client = $this->fm->validation($data['client']);
       


		$title = mysqli_real_escape_string($this->db->link, $title);
		$quote = mysqli_real_escape_string($this->db->link, $quote);
		$client = mysqli_real_escape_string($this->db->link, $client);

		if (empty($title) || empty($client)) {
			$logmsg = "<span style='color:red'>Field Must Not be Empty!!</span>";
			return $logmsg;
		}
		 $permited  = array('pdf');
		 $file_name = $file['pdf']['name'];
		 $file_size = $file['pdf']['size'];
		 $file_temp = $file['pdf']['tmp_name'];

		      $div            = explode('.', $file_name);
		      $file_ext       = strtolower(end($div));
		      $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
		      $uploaded_file = "pfile/".$unique_image;


		    if ($uploaded_file == "") {
		    	 
		    	 $errmsg = "<span style='color:red'>Browse Your File First And Submit</span>";
		    	 return $errmsg;

		    	}elseif (in_array($file_ext, $permited) === false) {

		     	echo "<span style='color:red'>You can upload only:-".implode(', ', $permited)."</span>";

    			}else{
    				 move_uploaded_file($file_temp, $uploaded_file);
			 		$query = "INSERT INTO tbl_files(title, quote, pdf, client, datee, timee) VALUES('$title', '$quote', '$uploaded_file', '$client', '$date', '$time')";
			    	 $result = $this->db->insert($query);

			    	 if ($result) {
			    	 	$msg = "<span>Post Upload complete</span>";
			    	 	return $msg;
			    	 }else{
			    	 	$msg = "<span>Post Upload Not complete</span>";
			    	 	return $msg;
			    	 }
		}
}



public function getAllclient(){
		$query = "SELECT * FROM tbl_createuser";
		$result = $this->db->select($query);
		return $result;
	}

public function commonfileInsert($data, $file){
		$name = $this->fm->validation($data['name']);
		


		$name = mysqli_real_escape_string($this->db->link, $name);
		
		if (empty($name)) {
			$logmsg = "<span style='color:red'>Field Must Not be Empty!!</span>";
			return $logmsg;
		}
		 $permited  = array('pdf');
		 $file_name = $file['pdf']['name'];
		 $file_size = $file['pdf']['size'];
		 $file_temp = $file['pdf']['tmp_name'];

		      $div            = explode('.', $file_name);
		      $file_ext       = strtolower(end($div));
		      $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
		      $uploaded_file = "cfile/".$unique_image;


		    if ($uploaded_file == "") {
		    	 
		    	 $errmsg = "<span style='color:red'>Browse Your File First And Submit</span>";
		    	 return $errmsg;

		    	}elseif (in_array($file_ext, $permited) === false) {

		     	echo "<span style='color:red'>You can upload only:-".implode(', ', $permited)."</span>";

    			}else{
    				 move_uploaded_file($file_temp, $uploaded_file);
			 		$query = "INSERT INTO tbl_commonfiles(name, cfile) VALUES('$name', '$uploaded_file')";
			    	 $result = $this->db->insert($query);

			    	 if ($result) {
			    	 	$msg = "<span>Post Upload complete</span>";
			    	 	return $msg;
			    	 }else{
			    	 	$msg = "<span>Post Upload Not complete</span>";
			    	 	return $msg;
			    	 }
		}
}

public function getAllcommonfiles(){
		$query = "SELECT * FROM tbl_commonfiles";
		$result = $this->db->select($query);
		return $result;
	}

	public function assignCfiles($files, $uId ){
		$files = $this->fm->validation($files);
		$files = mysqli_real_escape_string($this->db->link, $files);

		$fquery = "SELECT * FROM tbl_commonfiles WHERE id = '$files'";
		$result = $this->db->select($fquery);
		if ($result) {
			while ($data = $result->fetch_assoc()) {
				$name = $data['name'];
				$path = $data['cfile'];
			}
		}

			 if ($path == "") {
		    	 
		    	 $errmsg = "<span style='color:red'>Browse Your File First And Submit</span>";
		    	 return $errmsg;

		    	}else{
		    		$query = "INSERT INTO tbl_assignfile(client, name, cfile ) VALUES('$uId', '$name', '$path' )";
			    	 $result = $this->db->insert($query);

			    	 if ($result) {
			    	 	$msg = "<span>Post Upload complete</span>";
			    	 	return $msg;
			    	 }else{
			    	 	$msg = "<span>Post Upload Not complete</span>";
			    	 	return $msg;
			    	 }
		    	}
	}

	public function getUser($uId){
		$query = "SELECT * FROM tbl_createuser where regId='$uId'";
		$result = $this->db->select($query);
		return $result;
	}

	public function getAllassignfiles(){
		$query = "SELECT * FROM tbl_assignfile ";
		$result = $this->db->select($query);
		return $result;
	}
	
} ?>