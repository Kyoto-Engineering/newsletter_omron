<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"></h1>
                </div> 
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            <form action="" method="post">
                <p>
                    
                    <textarea name="description" id="text" name="edit" placeholder="Insert Job Description...."></textarea>
                    <script> CKEDITOR.replace( 'text' );</script>
                </p>
                
                <p>
                    <button type="submit" name="submit" class="btn btn-sm btn-primary">Submit</button>
                </p>
               </form> 
            </div>

            <!-- /.row -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include "inc/footer.php";?>