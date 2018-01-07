
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
    <link rel="stylesheet" href="gallery-clean.css">

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

    <div class="container gallery-container">

        <h1>Newsletter Image Gallery</h1>

        <p class="page-description text-center"><span class="subheading">Powered by <strong style="color: red; font-size: 20px;">Kyoto Engineering & Automation Ltd.</strong> </span></p>

        <div class="tz-gallery">

            <div class="row">

                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <a class="lightbox" href="../images/park.jpg">
                            <img src="../images/park.jpg" alt="Park">
                        </a>
                        <div class="caption">
                            <h3>Thumbnail label</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <a class="lightbox" href="../images/bridge.jpg">
                            <img src="../images/bridge.jpg" alt="Bridge">
                        </a>
                        <div class="caption">
                            <h3>Thumbnail label</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <a class="lightbox" href="../images/tunnel.jpg">
                            <img src="../images/tunnel.jpg" alt="Tuneel">
                        </a>
                        <div class="caption">
                            <h3>Thumbnail label</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <a class="lightbox" href="../images/coast.jpg">
                            <img src="../images/coast.jpg" alt="Coast">
                        </a>
                        <div class="caption">
                            <h3>Thumbnail label</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <a class="lightbox" href="../images/rails.jpg">
                            <img src="../images/rails.jpg" alt="Rails">
                        </a>
                        <div class="caption">
                            <h3>Thumbnail label</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <a class="lightbox" href="../images/traffic.jpg">
                            <img src="../images/traffic.jpg" alt="Traffic">
                        </a>
                        <div class="caption">
                            <h3>Thumbnail label</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
    <script>
        baguetteBox.run('.tz-gallery');
    </script>


</body>
</html>
