<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
<?php include "../../classes/picture.php";?>

<?php
	$pic = new Picture();

	if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
		$addvid = $pic->imageInsert($_POST, $_FILES);
	}
?>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Insert Image</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<?php 
	if (isset($addvid)) {
		echo $addvid;
	}
	?>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<!-- <div class="panel-heading">
					Insert Images
				</div> -->
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-2">
						</div>
						<div class="col-lg-8">
							<form action="" method="post" enctype="multipart/form-data">
								<div class="form-group row">
									<label for="inputEmail3" class="col-md-3 col-form-label">Image Name:</label>
									<div class="col-md-9">
										<input type="text" name="picName" class="form-control" placeholder="Enter Video Name">
									</div>
								</div>
								<div class="form-group row">
									<label for="inputEmail3" class="col-md-3 col-form-label">Image Details:</label>
									<div class="col-md-9">
										<textarea name="body" class="form-control" id="" cols="30" rows="5" placeholder="Enter Video Details"></textarea>
									</div>
								</div>
								<div class="form-group row">
									<label for="inputEmail3" class="col-md-3 col-form-label">Select Image:</label>
									<div class="col-md-9">
										<input type="file" name="uploadImg" class="form-control-file" id="">
									</div>
								</div>
								<!-- <div class="form-group row">
									<label for="inputEmail3" class="col-md-3 col-form-label">Video Type:</label>
									<div class="col-md-9">
										<select name="VideoType" class="form-control">
											<option selected>---Select Video Type---</option>
											<option value="Mp4">Mp4</option>
											<option value="MKV">MKV</option>
											<option value="FLV">FLV</option>
											<option value="3GP">3GP</option>
										</select>
									</div>
								</div> -->

								<div class="form-group row">
									<label for="inputEmail3" class="col-md-3 col-form-label">Quotation:</label>
									<div class="col-md-9">
										<input type="text" name="quotation" class="form-control" placeholder="Enter Video Quotation">
									</div>
								</div>
								<!-- <div class="form-group row">
									<label for="inputEmail3" class="col-md-3 col-form-label">Youtube Links:</label>
									<div class="col-md-9">
										<input type="text" name="links" class="form-control" placeholder="Enter vedio Links">
									</div>
								</div> -->

								<div class="form-group row">
									<div class="col-md-4"></div>
									<div class="col-md-4">
										<button type="submit" name="submit" class="btn btn-primary">Upload Image</button>
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