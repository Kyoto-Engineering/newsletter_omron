<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
<?php include "../classes/postclass.php";?>


<?php
	$post = new Post();

	if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
		$addInsert = $post->postInsert($_POST);
	}
?>

<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Insert Posts</h1>
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
					<div class="row">
						<div class="col-lg-2">
						</div>
						<div class="col-lg-8">
							<form action="" method="post" enctype="multipart/form-data">
								<div class="form-group row">
									<label class="col-md-3 col-form-label">Title:</label>
									<div class="col-md-9">
										<input type="text" name="title" class="form-control" placeholder="Enter Post Title">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3 col-form-label">Post Details:</label>
									<div class="col-md-9">
									<textarea name="description" class="form-control" id="" cols="30" rows="5" placeholder="Enter Post Details"></textarea>
									</div>
								</div>
								

								<div class="form-group row">
									<label  class="col-md-3 col-form-label">Author:</label>
									<div class="col-md-9">
										<input type="text" name="author" class="form-control" placeholder="Enter Author">
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