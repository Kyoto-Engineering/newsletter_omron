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
    if(isset($_GET['user']) && !empty($_GET['user']) ){
        $uId = $_GET['user'];
       
      }

?> 

<?php
	$post = new Post();

	if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
		$files = $_POST['files'];
		$addInsert = $post->assignCfiles($files, $uId );
	}
?>

<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Upload Common File</h1>
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
							

								<!-- <div class="form-group row">
									<label  class="col-md-3 col-form-label">Author:</label>
									<div class="col-md-9">
										<input type="text" name="author" class="form-control" placeholder="Enter Author">
									</div>
								</div> -->
								
								
								
								 <?php 
        $getU = $post->getUser($uId);
        if ($getU) {
          while($value = $getU->fetch_assoc()){


      ?>

						
								<div class="form-group row">
									<label  class="col-md-3 col-form-label">Client Name:</label>
									<div class="col-md-9">
										<?php echo $value['cName']  ?>
									</div>
								</div>
<?php } } ?>

								

								 <div class="form-group row">
								  <label for="inputEmail3" class="col-md-3 col-form-label">Select Files:</label>
								  <select class="form-control" id="sel1" name="files">
							<option></option>
							<?php
                            
                            $getAll = $post->getAllcommonfiles();
                            if ($getAll) {
                                while ($result = $getAll->fetch_assoc()) {
                             
                       		 ?>
								    <option value="<?php echo $result['id']?>"><?php echo $result['name']?></option>
								    
							<?php } } ?>
								  </select>
								</div> 

								

								<div class="form-group row">
								<div class="col-md-4"></div>
									<div class="col-md-4">
										<button type="submit" name="submit" class="btn btn-primary">Add File</button>
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
		</div> <!-- /.row -->
      <div class ="row">
		<div class="col-lg-12">
		 <?php
                            
                            $getAssign = $post->getAllassignfiles();
                            if ($getAssign) {
                                while ($result = $getAssign->fetch_assoc()) {
                             
                       		 ?>
			<div class="panel panel-default">
			<div class="panel-body">
			<div class="row">
					<table class="table table-bordered table-dark">
  <thead>
    <tr>
      <th scope="col">File Name</th>
      <th scope="col">File</th>
      

    </tr>
  </thead>
					<tr>
           <td>   <?php echo $result['name'] ?>  </td> 
             <td>  <a href="<?php echo $result['cfile'] ?> " target="_blank"> <img src ="img/pdf.png" height="auto" width="80" >  </a>  </td>
           </tr>
            </center>
                

			</div>
			</div>
			</div>
			<?php  } } ?>
			</div>
	</div>

	
</div>


<?php include "inc/footer.php";?>