<?php include 'header_imagelinks.php' ?>
<?php include_once "classes/view.php"; ?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Image Links</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
    
    <style>
        body {
            background-color: #fff;
            min-height: 100vh;
            font: normal 16px sans-serif;
        }

        .gallery-container h1 {
            text-align: center;
            margin-top: 70px;
            font-family: 'Droid Sans', sans-serif;
            font-weight: bold;
            color: #58595a;
        }

        .gallery-container p.page-description {
            text-align: center;
            margin: 30px auto;
            font-size: 18px;
            color: #85878c;
        }

        /* Styles for the gallery */

        .tz-gallery {
            padding: 40px;
        }

        .tz-gallery .thumbnail {
            padding: 0;
            margin-bottom: 30px;
            border: none;
        }

        .tz-gallery img {
            border-radius: 2px;
        }

        .tz-gallery .caption{
            padding: 26px 30px;
            text-align: center;
        }

        .tz-gallery .caption h3 {
            font-size: 14px;
            font-weight: bold;
            margin-top: 0;
        }

        .tz-gallery .caption p {
            font-size: 12px;
            color: #7b7d7d;
            margin: 0;
        }

        .baguetteBox-button {
            background-color: transparent !important;
        }
    </style>


</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="index.php">Home</a>
        
        <div class="collapse navbar-collapse" id="navbarResponsive">

        </div>
      </div>
    </nav>

    <div class="container gallery-container">

        <!-- <h1>Newsletter Image Gallery</h1> -->

        

        <div class="ty-gallery">

            <div class="row">

            <?php 
                $pic = new Show();
                $getpic = $pic->getAllpicture();
                if ($getpic) {
                    while ($data = $getpic->fetch_assoc()) {
                   
            ?>
                <div class="col-sm-6 col-md-4">
                    <div class="">
                        <a class="" href="admin/pages/<?php echo $data['image'];?>">
                            <img src="admin/pages/<?php echo $data['image'];?>" alt="Park" width="250px"/>
                        </a>
                       
                    </div>
                </div>
                
               <?php } } ?> 
                
                
                
            </div>

        </div>   
        <!-- galary main div end -->

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
    <script>
        baguetteBox.run('.tz-gallery');
    </script>


</body>
</html>
<?php include 'footer.php' ?>
