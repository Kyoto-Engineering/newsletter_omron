<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
<?php include "../classes/postclass.php";?>

<?php
$dateTime = date_default_timezone_set('Asia/Dhaka');
$date = date("Y-m-d");
$day = date("(D)");
$timestamp = time();
$time = date("H:i:s",$timestamp);


?>

<?php
	$post = new Post();

	if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
		$addInsert = $post->pdfInsert($_POST, $_FILES, $date, $time);
	}
?>

<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Upload File</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<!-- <div class="panel-heading">
					<marquee behavior="" direction="right">Insert Image</marquee>
				</div> -->
				<div class="panel-body">
				<?php 
					if (isset($addInsert)) {
						echo $addInsert;
					}
				?>
					<div class="row">
						<div class="col-lg-2">
						</div>
						<div class="col-lg-8">
							<form action="" method="post" enctype="multipart/form-data">
							<div class="form-group row">
									<label  class="col-md-3 col-form-label"> Type:</label>
									<div class="col-md-9">
								<select class="form-control"  name="title">
					               <option> </option>
					                  <option value="quotation"> Quotation</option>
					                  <option value="letter">Letter</option>
					                  <option value="offer">Offer</option>
					                  
					                </select> 
					                </div>
					                </div>

								<!-- <div class="form-group row">
									<label  class="col-md-3 col-form-label">Author:</label>
									<div class="col-md-9">
										<input type="text" name="author" class="form-control" placeholder="Enter Author">
									</div>
								</div> -->

								<div class="form-group row">
									<label  class="col-md-3 col-form-label">Quotation Ref:</label>
									<div class="col-md-9">
										<input type="text" name="quote" class="form-control" placeholder="Enter Quotation Ref">
									</div>
								</div>

								 <div class="form-group row">
								  <label for="inputEmail3" class="col-md-3 col-form-label">Select Client:</label>
								  <div class="col-md-9">
								  <select class="form-control" id="sel1" name="client">
							<option></option>
							<?php
                            
                            $getAll = $post->getAllclient();
                            if ($getAll) {
                                while ($result = $getAll->fetch_assoc()) {
                             
                       		 ?>
								    <option value="<?php echo $result['regId']?>"><?php echo $result['email']?></option>
								    
							<?php } } ?>
								  </select>
								  </div>
								</div> 

								<div class="form-group row">
									<label for="inputEmail3" class="col-md-3 col-form-label">Select files:</label>
									<div class="col-md-9">
										<input type="file" name="pdf" class="form-control-file" id="">
									</div>
								</div>

								<div class="form-group row">
								<div class="col-md-4"></div>
									<div class="col-md-4">
										<button type="submit" name="submit" class="btn btn-primary">Upload Post</button>
									</div>
									<div class="col-md-4"></div>
								</div>
							</form>
						</div>
						<div class="col-lg-2">
						</div>
						<!-- /.col-lg-12 (nested) -->

					</div>
					<!-- /.row (nested) -->
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
</div>


<?php include "inc/footer.php";?>