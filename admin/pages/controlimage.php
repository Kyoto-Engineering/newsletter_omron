<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
<?php include_once "../../helpers/format.php";?>
<?php include "../../classes/picture.php";?>
<?php
    $pic = new Picture();
    $fm = new Format();
?>
<?php
    if (isset($_GET['delpic'])) {
        $id = $_GET['delpic'];
    $deletedelpic = $pic->delpicByid($id);
    }
?>
 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Control Images</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <?php 
                        if(isset($deletedelpic)){
                            echo $deletedelpic;
                        }
                    ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables Advanced Tables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Title</th>
                                        <th>Picture</th>
                                        <th>Details</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    $getlist = $pic->getAlllist();
                                    if ($getlist) {
                                        $i = "0"; 
                                        while ($data =$getlist->fetch_assoc()) {
                                        $i++; 
                                ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $i;?></td>
                                        <td><?php echo $data['picName'];?></td>
                                        <td><img src="<?php echo $data['image'];?>" height="auto" width = "40px"></td>
                                        <td><?php echo $fm->textShorten($data['body'], 30);?></td>
                                        <td class="center"><a href="edit.php?id=<?php echo $data['id'];?>"><span class="glyphicon glyphicon-edit"></span></a> || <a onclick="return confirm('Are you Sure Want to Delete!')" href="?delpic=<?php echo $data['id'];?>">
                                        <span class="glyphicon glyphicon-trash"></span></a></td>
                                        
                                    </tr>
                                 <?php } } ?>
                                    
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>



        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>
