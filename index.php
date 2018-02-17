<?php include 'header.php' ?>
<?php include 'navbar.php' ?>
<?php include "admin/classes/postclass.php";?>
<?php include "helpers/format.php";?>
<?php
$fm = new Format();
?>

<div class="container">
      <div class="row">
      
                  
      <div class="col-md-3" style="margin:35px;">
     <center>
      <h3> See All News  </h3>
       <?php 
                $post = new Post();
                $getdate = $post->getAlldate();
                if ($getdate) {
                    while ($data = $getdate->fetch_assoc()) {
                   
            ?>
      <a href="newsDetails.php?id=<?php echo $data['datee'] ; ?>"> <?php echo $data['datee']  ?> </a> <br/>
      <?php } } ?>
      </center>
      </div>
        <div class="col-md-8">
          <?php 
                $post = new Post();
                $getpost = $post->getAllpost();
                if ($getpost) {
                    while ($data = $getpost->fetch_assoc()) {
                   
            ?>
          <div class="post-preview">
            
              <h2 class="post-title">
               <?php echo $data['title'] ; ?></a>
              </h2>
              <p class="post-meta" style="color:black;"> 
              Date: <?php echo $data['datee'] ; ?> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; By: <?php echo $data['author'] ; ?> </p> 
            <div class="divone">
              <div class="subdiv" style="float: left; margin-right: 20px;">
                <img src="admin/pages/<?php echo $data['image'];?>" alt="" height="auto" width="180px"  />
              </div>
                 <h3 class="post-subtitle" style="font-weight: 400; margin-left: 115px; text-align: justify;">
                <?php echo $fm->textShorten($data['description'], 350); ?> 
              </h3>
            </div>
            
              <div class="clearfix">
            <a class="btn btn-primary float-right" href="postDetail.php?id=<?php echo $data['id'] ; ?>">See More &rarr;</a>
          </div>
          <?php } } ?>
<br/><br/> <br/><br/>
          </div>

          <hr>

          
          <hr>
          <!-- Pager -->
         
             
        </div>


     
      </div>
    </div>
<div class="container">
      <div class="row">
 <div class="col-lg-12 col-md-12 mx-auto">
       
      
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14605.070025004896!2d90.4116934!3d23.7734867!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x95b9fa4b2604d2be!2sKyoto+Engineering+and+Automation+Ltd.!5e0!3m2!1sen!2sbd!4v1514714293865" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
      
    </div>
</div>
    </div>

<?php include 'footer.php' ?>