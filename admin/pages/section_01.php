<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
<?php include_once "../../classes/mailing.php";?>
<?php 
    $ml = new Mailer();
    if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['submit'])){
        
        $send = $ml->sendmail($_POST);
    }
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        <span style="color:green">
                        <?php if(isset($send)){
                            echo $send;
                            }?>
                        </span>
                    </h1>
                </div> 
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            <form action="" method="post" enctype="multipart/form-data">
                 
                
                <br>
                
                <p>
                    <!--<label>Job Description </label>-->
                    <textarea name="description" id="text" placeholder="Insert Job Description...."></textarea>
                            <script> CKEDITOR.replace( 'text' );</script>
                </p>
                
                <p>
                    <button type="submit" name="submit" class="w3-button w3-block w3-section w3-green w3-ripple w3-padding">Submit</button>
                </p>
               </form> 
            </div>

            <!-- /.row -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include "inc/footer.php";?>