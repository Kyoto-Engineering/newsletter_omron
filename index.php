<?php include 'header.php' ?>
<?php include 'navbar.php' ?>
<?php include "admin/classes/postclass.php";?>
<?php include "helpers/format.php";?>
<?php
$fm = new Format();
?>

<?php 
    $per_page = 5;
    if (isset($_GET["page"])) {
      $page = $_GET["page"];
    }else{
      $page=1;
    }
    $start_form = ($page-1)*$per_page;
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
      <a href="newsDetails.php?id=<?php echo $data['edate'] ; ?>"> <?php echo $data['edate']  ?> </a> <br/>
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
              Date: <?php echo $data['edate'] ; ?> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; By: <?php echo $data['author'] ; ?> </p> 
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

          <br/>
          <?php } } ?>


 <div class="row">
 <?php 
        $db = new Database();
        $query = "SELECT * FROM tbl_post ";
        $result = $db->select($query);
        $total_rows = mysqli_num_rows($result);
        $total_pages = ceil($total_rows/$per_page);

          echo "<span class='pagination' style='margin-left:482px;'><a href='index.php?page=1'>".'First Page'."</a>";
          for ($i=1; $i <=$total_pages ; $i++) { 
            echo "<a href='index.php?page=".$i."'>".$i."</a>";
          };

         echo "<a href='index.php?page=$total_pages'>".'last Page'."</a></span>"?>
         </div>

          </div>

         <br/>
          <!-- Pager -->
         
             
        </div>


     
      </div>
      
    </div>
    <div class="container">
    <div class="title">
      <h2>Which is Your <span style= "color:#396C9F;">Interest?</span></h2>
      <div class="clearfix">
            <a class="w-inline-block social-share-btn fb" href="https://www.facebook.com/sharer/sharer.php?u=&t=" title="Share on Facebook" target="_blank" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(document.URL) + '&t=' + encodeURIComponent(document.URL)); return false;">
</a>
          </div>
      
    </div>
  
  
    <div class="row">
      <div class="col-sm-3" style="margin-right: 76px;">
        <div class="blog-box">

          <div class="blog-img"> <a href="http://it.keal.com.bd/"> <img src="img/1.jpg" alt=""> </a></div>
          <div class="blog-caption" id="kyotoLogo">
            <a href="http://it.keal.com.bd/"><img src="img/kyotoLogo.png" alt=""></a>
            <p>Give your ideas we will make it real!</p>
          </div>
        </div>
      </div>
      <div class="col-sm-3" style="margin-right: 76px;">
        <div class="blog-box">
          <div class="blog-img"> <a href="http://omron.keal.com.bd/"><img src="img/2.jpg" alt=""></a> </div>
          <div class="blog-caption">
            <h3><a href="http://omron.keal.com.bd/"> <img src="img/logo1.gif" alt=""></a></h3>
            <p>Japanese Technology is now in Bangladesh</p>
          </div>
        </div>
      </div>
      <div class="col-sm-3" style="margin-right: 76px;">
        <div class="blog-box">
          <div class="blog-img"> <a href="http://azbil.keal.com.bd/"><img src="img/3.jpg" alt="" ></a> </div>
          <div class="blog-caption">
            <a href="http://azbil.keal.com.bd/"><img src="img/azbil_logo.gif"></a>
            <p>The Next Big Innovation with Japanese Technology</p>
          </div>
        </div>
      </div>
    <!--  <div class="post-preview">-->
    <!--  <div class="clearfix">-->
    <!-- <a class="btn btn-primary float-right" href="">See More &rarr;</a>-->
    <!--</div>-->
    <!--</div>-->
      
     


       
     



    
    </div>
    <div class="clearfix">
    <a class="btn btn-primary float-right" style="margin-right: 43px;" href="conglomerates.php">See More </a>
    </div>
    <br/>
    </div>
    </div>
<div class="container" style="width:98% ; margin-right:147px">
      <div class="row">
 <div class="col-lg-12 col-md-12 mx-auto" ">
       
      
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14605.070025004896!2d90.4116934!3d23.7734867!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x95b9fa4b2604d2be!2sKyoto+Engineering+and+Automation+Ltd.!5e0!3m2!1sen!2sbd!4v1514714293865" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
      
    </div>
</div>
    </div>

<?php include 'footer.php' ?>