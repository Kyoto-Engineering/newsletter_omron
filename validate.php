<?php include_once "lib/database.php";?>

<?php
    if (!isset($_GET['phone']) || $_GET['phone'] == NULL ) {
        //echo "<script>window.location = '404.php'</script>";
      }else{
        $user_contact = $_GET['phone'];
      }
?>

<?php
	$query = "SELECT * FROM tbl_users WHERE phone = '$user_contact'";
	$res = $db->select($query);
	if ($res) {
		while ($data = $res->fetch_assoc()) {
			$email = $data['email'];
			$name  = $data['name'];
		}
	}

	$Uquery = "UPDATE tbl_users SET status = '1' WHERE phone = '$user_contact'";
	$result = $db->update($Uquery);
	if ($result) {
		?>
                                <script>
                                alert('Successfully Verified');
                                window.location.href='https://newsletter.keal.com.bd';
                                </script>
                            <?php
	}else{
				?>
                                <script>
                                alert('Not Verified');
                                window.location.href='https://newsletter.keal.com.bd';
                                </script>
                            <?php
	}
?>