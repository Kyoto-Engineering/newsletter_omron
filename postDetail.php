<?php include 'header.php' ?>

<?php include 'navbar.php' ?>
<?php include "admin/classes/postclass.php";?>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="style.css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/clean-blog.min.css" rel="stylesheet">



  <style>
/*.body{

padding-top:0px;
padding-bottom:20px;
    border-left: 1px solid #ccc;
      position: absolute;
      left:20%;
    border-right: 1px solid #ccc;
      position: absolute;
       right:20%;
        top: 0

      } */
    </style>

  </head>

  <div class="container">
    <div class="row">
           <?php
               if(!isset($_GET['id']) || $_GET['id']==NUll){
                echo "<script>window.location = 'index.php';</script>";
              }else{
                $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['id']);
              }

          ?>
          <?php 
              $post = new Post();
              $getpost = $post->getpost($id);
              if ($getpost) {
              while ($data = $getpost->fetch_assoc()) {

          ?>
          <div class="col-md-4">
            <img src="admin/pages/<?php echo $data['image'];?>" alt="" height="auto" width="300" style="margin-top: 70px"  />

<!-- 2nd Image Field -->

<!-- 2nd Image Field End -->

          </div>

          <div class="col-md-7" style="text-align: justify">
            <h3 class="section-heading"><?php echo $data['title'] ?></h3>
            <p class="post-meta"> 
              Date: <?php echo $data['edate'] ; ?> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; By: <?php echo $data['author'] ; ?> </p> 
              <p> <?php echo $data['description']?></p>
              <p> <?php echo $data['des']?></p>
              <a href="<?php echo $data['url']?>" style="color:blue">
              <p><?php echo $data['url']?></p></a>

<!-- 2nd Text Field -->
              
<!-- 2nd Text Field End -->
         

          </div>
         
        </div>
        
        <div class="row">
            <div class="col-md-4">
            <img src="admin/pages/<?php echo $data['img'];?>" alt="" height="auto" width="300" style="margin-top: 70px"  />
            </div>
            <?php
            if($data['vidio']){
                ?>
            <div class="col-md-7">
                   <video width="620" height=auto controls>
                  <source src="admin/pages/<?php echo $data['vidio'] ; ?>" type="video/mp4">
                </video> 
            </div>
            <?php } ?>
        </div>
         <?php } } ?>
      </div>
      <?php include 'footer.php' ?>