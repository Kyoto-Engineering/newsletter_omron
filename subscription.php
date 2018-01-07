<?php include 'header.php' ?>
<?php include_once 'classes/picture.php'; ?>
<?php 
$pic = new Picture();
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
  $adddata = $pic->adduserData($_POST);
}
?>
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="index.php">Newsletter</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <!-- <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link" href="gallery.php">Sign In</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="subscription.php">Subscription</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="gallery.php">Image Galary</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="gallery.php">Vedio Galary</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://omron.keal.com.bd/view/contact/input.php">Contact Us</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

<div class="container">
      <div class="row">
      <h3><center>Signup For Omron Newsletter</center></h3>
        <div class="col-lg-8 col-md-10 mx-auto">
        <div class="form" style="margin: 0 auto;
border: 1px solid #a6d1e0;
border-radius: 5px;
padding: 20px 15px;
    padding-left: 15px;
padding-left: 95px;">
<form class="form-horizontal" role="form" method="post" action="">
<?php if(isset($adddata)){
      echo $adddata;
  }?>
  <div class="form-group">
    <label for="name" class="control-label" style="font-size: 15px;">First Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" name="name" placeholder="Your First Name" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="name" class=" control-label" style="font-size: 15px;">Last Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" name="lname" placeholder=" Your Last Name" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="email" class="control-label" style="font-size: 15px;">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="name" class="control-label" style="font-size: 15px;">Phone</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" name="phone" placeholder=" Your Phone Number" value="">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      <input id="submit" name="submit" type="submit" value="Subscribe" class="btn btn-primary">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      <! Will be used to display an alert to the user>
    </div>
  </div>
</form>
  </div>
        </div>
      </div>
    </div>


<?php include 'footer.php' ?>