<?php include_once "classes/log.php";?>

<?php
      $user = new Signin(); 
      
?>

<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $userlog = $user->userLogin($email, $contact);
    }

?>  

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Login Form</title>
  <link rel="stylesheet" href="css/style2.css">
  <link rel="shortcut icon" href="images/favicon.png" />
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>

<body>
  <div class="container">
    
    <section class="register">
      	<h1>Login</h1>
<?php 
if (isset($userlog)) {
  echo $userlog;
}
?>
	    <form method="post" action="">
	     
	      <div class="reg_section">
		    
		      <h3>Email</h3>
		      <input type="text" name="email"  placeholder="Your E-mail Address">
	      
		      <h3>Password</h3>
		      <input type="password" name="contact" placeholder="Your Password">
		  </div> 
		   
		    
	     
	   
	      <p class="submit"><input type="submit" name="login" value="Sign In"></p> 

      </form>
    </section>

  </div>



</body>
