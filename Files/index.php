<?php 
     include '../lib/session.php';
        Session::checkSession();
?>
<?php include_once "../lib/Database.php"; ?>
<?php include_once "classes/mclass.php";?>
<?php 
	$uId = Session::get('userId');
	$email = Session::get('email');
	$obj = new MethodsClass();
?>
<?php 
  $dateTime = date_default_timezone_set('Asia/Dhaka');

  $timestamp = time();
  $date = date("Y-m-d");
  $day = date("(D)");
  $time = date("H:i:s",$timestamp);
  $month = date('M');
?>
<?php
 $db = new Database();
                   
    $iplogfile = 'logs/ip-address-mainsite.html';
                    $ipaddress = $_SERVER['REMOTE_ADDR'];
                    $webpage = $_SERVER['SCRIPT_NAME'];
                    $timestamp = date('d/m/Y h:i:s');
                    $browser = $_SERVER['HTTP_USER_AGENT'];
                    /*$fp = fopen($iplogfile, 'a+');
                    chmod($iplogfile, 0777);
                    fwrite($fp, '['.$timestamp.']: '.$ipaddress.' '.$webpage.' '.$browser. "\n<br><br>");
                    fclose($fp);*/
                    $Iquery = "INSERT INTO tbl_logrecord(userId, uIp, browser, timee, datee) VALUES('$uId', '$ipaddress', '$browser','$time', '$date')";
                    $insert_row = $db->insert($Iquery);
                    ?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>KEAL</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href='http://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href="images/favicon.png" />
		
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />

		</noscript>
		
	</head>
	<body class="homepage">

	<!-- Header -->
		<div id="header">
			 <div class="container"> 
					
				<!-- Logo -->
					<!-- <div id="logo">
						<h1><a href="https://landing.keal.com.bd/">KEAL LANDING PAGE</a></h1>
						<span>powerd by KEAL IT</span>
					</div> -->
				
	<!-- Nav -->
					<nav id="nav">
						    <?php
                                if (isset($_GET['action']) && $_GET['action'] == "logout") {
                                    Session::destroy();                               
                                     }
                            ?>
						<ul>
							<li class="active"><a href="http://newsletter.keal.com.bd/middleware/index.html">HOME</a></li>
							<!-- <li><a href="#">Menu</a></li>
							<li><a href="twocolumn1.html">Menu 3</a></li>
							<li><a href="twocolumn2.html">Menu 4</a></li> -->
							<li><a href="?action=logout">Sign Out</a></li> 
						</ul>
					</nav>

			</div> 
		</div>
	<!-- Nav -->

	<!-- Header -->
			
	<!-- Main -->
		<div id="main">
			<div class="container">
				<header>
					<h2> Your Files </h2>
				</header>
				<div class="row">
					<?php 
					 $getAll = $obj->getAllclientfile($email);
				     if ($getAll) {
				    while ($result = $getAll->fetch_assoc()) {
				    
					?>

					<div class="3u">
						<section>
							<a href="../admin/pages/<?php echo $result['pdf']?>" class="image full"><img src="images/pdfIcon2.png" alt="" /></a>
							<p> <?php echo $result['quote']?></p>
							<!-- <a href="#" class="button">Read More</a> -->
						</section>
					</div>
					<?php } } ?>
<!-- 					<div class="3u">
						<section>
							<a href="#" class="image full"><img src="images/pdfIcon2.png" alt="" /></a>
							<p>Here will be the quotation number</p>
							
						</section>
					</div>
					<div class="3u">
						<section>
							<a href="#" class="image full"><img src="images/pdfIcon2.png" alt="" /></a>
							<p>Here will be the quotation number</p>
							
						</section>
					</div>
					<div class="3u">
						<section>
							<a href="#" class="image full"><img src="images/pdfIcon2.png" alt="" /></a>
							<p>Here will be the quotation number</p>
							
						</section>
					</div> -->
				</div>
				<header>
					<h2> Common Files </h2>
				</header>

					<div class="row">
					<?php 
					 $getAll = $obj->getAllcommonfile($uId);
				     if ($getAll) {
				    while ($result = $getAll->fetch_assoc()) {
				    
					?>
					<div class="3u">
						<section>
							<a href="../admin/pages/<?php echo $result['cfile']?>" class="image full"><img src="images/pdfIcon2.png" alt="" /></a>
							<p> <?php echo $result['name']?></p>
							
							<!-- <a href="#" class="button">Read More</a> -->
						</section>
					</div>
					<?php } } ?>
<!-- 					<div class="3u">
						<section>
							<a href="#" class="image full"><img src="images/pdfIcon2.png" alt="" /></a>
							<p>Here will be the quotation number</p>
							
						</section>
					</div>
					<div class="3u">
						<section>
							<a href="#" class="image full"><img src="images/pdfIcon2.png" alt="" /></a>
							<p>Here will be the quotation number</p>
							
						</section>
					</div>
					<div class="3u">
						<section>
							<a href="#" class="image full"><img src="images/pdfIcon2.png" alt="" /></a>
							<p>Here will be the quotation number</p>
							
						</section>
					</div> -->
				</div>
				<div class="divider">&nbsp;</div>
				<div class="row">
				
					<!-- Content -->
						<!-- <div class="8u skel-cell-important">
							<section id="content">
								<header>
									<h2>Integer gravida nibh quis urna</h2>
									<span class="byline">Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue rutrum</span>
								</header>
								<p><a href="#" class="image full"><img src="images/pics02.jpg" alt=""></a></p>
								<p>This is <strong>Monochromed</strong>, a responsive HTML5 site template freebie by <a href="http://templated.co">TEMPLATED</a>. Released for free under the <a href="http://templated.co/license">Creative Commons Attribution</a> license, so use it for whatever (personal or commercial) &ndash; just give us credit! Check out more of our stuff at <a href="http://templated.co">our site</a> or follow us on <a href="http://twitter.com/templatedco">Twitter</a>.</p>
								<a href="#" class="button">Read More</a>
							</section>
						</div> -->
					<!-- /Content -->
						
					<!-- Sidebar -->
						<!-- <div id="sidebar" class="4u">
							<section>
								<header>
									<h2>Gravida praesent</h2>
									<span class="byline">Praesent lacus congue rutrum</span>
								</header>
								<p>Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue rutrum. Maecenas luctus lectus at sapien. Consectetuer adipiscing elit.</p>
								<ul class="default">
									<li><a href="#">Pellentesque quis lectus gravida blandit.</a></li>
									<li><a href="#">Lorem ipsum consectetuer adipiscing elit.</a></li>
									<li><a href="#">Phasellus nec nibh pellentesque congue.</a></li>
									<li><a href="#">Cras aliquam risus pellentesque pharetra.</a></li>
									<li><a href="#">Duis non metus commodo euismod lobortis.</a></li>
									<li><a href="#">Lorem ipsum dolor adipiscing elit.</a></li>
								</ul>
							</section>
						</div> -->
					<!-- Sidebar -->
						
				</div>
			
			</div>
		</div>
	<!-- Main -->

	<!-- Footer -->
		<!-- <div id="footer">
			<div class="container">
				<div class="row">
					<div class="3u">
						<section>
							<ul class="style1">
								<li><img src="images/pics05.jpg" width="78" height="78" alt="">
									<p>Nullam non wisi a sem eleifend. Donec mattis libero eget urna. </p>
									<p class="posted">August 11, 2014  |  (10 )  Comments</p>
								</li>
								<li><img src="images/pics06.jpg" width="78" height="78" alt="">
									<p>Nullam non wisi a sem eleifend. Donec mattis libero eget urna. </p>
									<p class="posted">August 11, 2014  |  (10 )  Comments</p>
								</li>
								<li><img src="images/pics07.jpg" width="78" height="78" alt="">
									<p>Nullam non wisi a sem eleifend. Donec mattis libero eget urna. </p>
									<p class="posted">August 11, 2014  |  (10 )  Comments</p>
								</li>
							</ul>
						</section>
					</div>
					<div class="3u">
						<section>
							<ul class="style1">
								<li class="first"><img src="images/pics08.jpg" width="78" height="78" alt="">
									<p>Nullam non wisi a sem eleifend. Donec mattis libero eget urna. </p>
									<p class="posted">August 11, 2014  |  (10 )  Comments</p>
								</li>
								<li><img src="images/pics09.jpg" width="78" height="78" alt="">
									<p>Nullam non wisi a sem eleifend. Donec mattis libero eget urna. </p>
									<p class="posted">August 11, 2014  |  (10 )  Comments</p>
								</li>
								<li><img src="images/pics10.jpg" width="78" height="78" alt="">
									<p>Nullam non wisi a sem eleifend. Donec mattis libero eget urna. </p>
									<p class="posted">August 11, 2014  |  (10 )  Comments</p>
								</li>
							</ul>
						</section>				
					</div>
					<div class="6u">
						<section>
							<header>
								<h2>Aenean elementum</h2>
							</header>
							<p>In posuere eleifend odio. Quisque semper augue mattis wisi. Maecenas ligula. Pellentesque viverra vulputate enim. Aliquam erat volutpat. Pellentesque tristique ante ut risus. Quisque dictum. Integer nisl risus, sagittis convallis, rutrum id, elementum congue, nibh. Suspendisse dictum porta lectus.</p>
							<ul class="default">
								<li><a href="#">Pellentesque quis lectus gravida blandit.</a></li>
								<li><a href="#">Lorem ipsum consectetuer adipiscing elit.</a></li>
								<li><a href="#">Phasellus nec nibh pellentesque congue.</a></li>
								<li><a href="#">Cras aliquam risus pellentesque pharetra.</a></li>
								<li><a href="#">Duis non metus commodo euismod lobortis.</a></li>
								<li><a href="#">Lorem ipsum dolor adipiscing elit.</a></li>
							</ul>
						</section>
					</div>
				</div>
			</div>
		</div> -->
	<!-- Footer -->

	<!-- Copyright -->
		<div id="copyright">
			<div class="container">
				<p>© Copyright 2018 Kyoto Engineering & Automation Ltd.| All Rights Reserved.</p>
			</div>
		</div>

	</body>
</html>