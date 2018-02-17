<?php include 'header.php' ?>
<?php include_once 'classes/picture.php'; ?>
<?php 
$pic = new Picture();
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
  $adddata = $pic->adduserData($_POST);
}
?>
<?php include 'navbar.php' ?>

<div class="container">
      <div class="row">
         <h3>Signup For Newsletter</h3>
         <p style="width:85%">Thank You for Subscribing to Our Newsletter Program. An Activation Link Will Be Sent to You by Email. Please Check your Email and Activate the Newsletter Program.</p>
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
    <label for="subscribefor" class="control-label" style="font-size: 15px;">Subscribe for</label>
    <div class="col-sm-10">
      <select class="form-control"  name="subscribefor">
               <option> </option>
                  <option value="omron">Omron Newsletter</option>
                  <option value="hvac">HVAC Newsletter</option>
                  
                </select> 
    </div>
  </div>
    <div class="form-group">
    <label for="email" class="control-label" style="font-size: 15px;">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="">
    </div>
  </div>
  
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