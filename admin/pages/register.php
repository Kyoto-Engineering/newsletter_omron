<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
<?php include_once "../classes/regclass.php";?>


<?php
     $user = new createUser(); 
     if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
         $createReg = $user->userRegistration($_POST);
     }

?> 
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Create User</h1>
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
                   <?php
                                 if (isset($createReg)) {
                                    echo $createReg;
                                }
                            ?>
                <div class="panel-body">
                
                    <div class="row">
                        <div class="col-lg-2">
                        </div>
                        <div class="col-lg-8">
                            <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                    <label  class="col-md-3 col-form-label">User Id/ User Name:</label>
                                    <div class="col-md-9">
                                        <input type="text" name="uName" class="form-control" placeholder="User Id/ User Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label  class="col-md-3 col-form-label">Client Name:</label>
                                    <div class="col-md-9">
                                        <input type="text" name="cName" class="form-control" placeholder="Client Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label  class="col-md-3 col-form-label">Company Name:</label>
                                    <div class="col-md-9">
                                        <input type="text" name="company" class="form-control" placeholder="Company Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Email:</label>
                                    <div class="col-md-9">
                                        
                                         <input class="form-control" placeholder="E-mail" name="email" type="email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Phone:</label>
                                    <div class="col-md-9">
                                    <input class="form-control" placeholder="phone" name="contact" type="text" >
                                    </div>
                                </div>

                                <div class="form-group row">
                                <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <button type="submit" name="submit" class="btn btn-primary">Create</button>
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