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
                <p>
                    
                    <textarea name="description" id="text" placeholder="Insert Job Description...."></textarea>
                            <script> CKEDITOR.replace( 'text' );</script>
                </p>
                
                <p>
                    <button type="submit" name="submit" class="w3-button w3-block w3-section w3-green w3-ripple w3-padding">Submit</button>
                </p>
                
            </div>

            <!-- /.row -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include "inc/footer.php";?>