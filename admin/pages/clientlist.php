<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
<?php include "../classes/postclass.php";?>
<?php
    $post = new Post();
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <div class="row">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Sl</th>
      <th scope="col">Client Name</th>
      <th scope="col">Email</th>
      <th scope="col">Company</th>
      <th scope="col">Phone</th>
      
      
    </tr>
  </thead>
  <tbody>
    <?php
    $getAll = $post->getAllclient();
    if ($getAll) {
        $i = "0";
    while ($result = $getAll->fetch_assoc()) {
        $i++;
    ?>
    <?php 
    $uId = $result['regId'];
    ?>
    <tr>
      <th scope="row"><?php echo $i;?></th>
      <td><a href="client_details.php?user=<?php echo urlencode($uId);?>;"><?php echo $result['uName'];?></td>
      <td><?php echo $result['email'];?></td>
      <td><?php echo $result['company'];?></td>
      <td><?php echo $result['contact'];?></td>

      <?php

    // if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
    //     $addInsert = $post->selectfilenum($_POST, $uId);
    // }
?>
      <form action="" method="post">
        <?php
        // if (isset($addInsert)) {
        //     echo $addInsert;
        //}
        ?>
      <!-- <td>
        <div class="form-group row" style="width: 80%;">
        
        <select class="form-control" id="sel1" name="fnumber">
           <option></option> -->
                            <?php
                            
                            // $getAll = $post->getAllclient();
                            // if ($getAll) {
                            //     while ($result = $getAll->fetch_assoc()) {
                             
                             ?>
                                   <!--  <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option> -->
                                    

                                    
                            <?php //} } ?>
 <!--                                  </select>
                                </div>

      </td>
        <td> 
         <div class="col-md-4">
          <button type="submit" name="submit" class="btn btn-primary">Set</button>
          </div>
      </td> -->
      <!-- </form> -->

    </tr>
    <?php } } ?>
  </tbody>
</table>
            </div>
            <!-- /.row -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include "inc/footer.php";?>