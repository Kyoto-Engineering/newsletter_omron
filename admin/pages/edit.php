<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
<?php include "../../classes/picture.php";?>
<?php

            if(!isset($_GET['id']) || $_GET['id']==NUll){
            echo "<script>window.location = 'controlimage.php';</script>";
            }else{
                $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['id']);
            }
?>
<?php
    $pic = new Picture();

    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['update'])) {
        $updateImage = $pic->imageUpdate($_POST, $_FILES, $id);
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
    if (isset($updateImage)) {
        echo $updateImage;
    }
    ?>
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
                            <?php
                                $getAll = $pic->getedit($id);
                                if ($getAll) {
                                    while ($data = $getAll->fetch_assoc()) {
                                      
                            ?>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-md-3 col-form-label">Image Name:</label>
                                    <div class="col-md-9">
                                        <input type="text" name="picName" class="form-control" value="<?php echo $data['picName'];?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-md-3 col-form-label">Image Details:</label>
                                    <div class="col-md-9">
                                    <textarea name="body" class="form-control" id="" cols="30" rows="5" placeholder="Enter Image Details"><?php echo $data['body'];?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-md-3 col-form-label">Select Image:</label>
                                    <div class="col-md-9">
                                        <input type="file" name="image" class="form-control-file" id="">
                                    </div>
                                </div>
                                <img src="<?php echo $data['image'];?>" height="auto" width="80px">

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-md-3 col-form-label">Quotation:</label>
                                    <div class="col-md-9">
                                        <input type="text" name="quotation" class="form-control" value="<?php echo $data['quotation'];?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <button type="submit" name="update" class="btn btn-primary">Update Image</button>
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>

                                <?php } } ?>
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