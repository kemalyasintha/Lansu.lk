<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 11/21/2015
 * Time: 6:59 PM
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Contact - Business Casual - Start Bootstrap Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<?php include 'header.php'?>

<div class="container">

    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <hr>
                <h2 class="intro-text text-center"><b>Contact Saga Caters</b></h2>
                <hr>
            </div>
            <div class="col-md-8">
                <!-- Embedded Google Map using an iframe - to select your location find it on Google maps and paste the link as the iframe src. If you want to use the Google Maps API instead then have at it! -->
<!--                <iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;ll=37.0625,-95.677068&amp;spn=56.506174,79.013672&amp;t=m&amp;z=4&amp;output=embed"></iframe>-->
<!--                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63397.40548809325!2d79.89456065445121!3d6.728570296000097!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae24616c169e7c3%3A0xd21e80c970651d56!2sPanadura!5e0!3m2!1sen!2slk!4v1448116564075" width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" allowfullscreen></iframe>-->
                <iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d1906.3951627617498!2d79.9106407272602!3d6.711480061843586!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x3ae24618ff4690cd%3A0xbd485962409b3027!2s49%2C+Horana+Road%2C+Panadura%2C+A8%2C+Panadura!3m2!1d6.7116343999999994!2d79.91094319999999!4m5!1s0x3ae24618ff4690cd%3A0xbd485962409b3027!2s49%2C+Horana+Road%2C+Panadura%2C+A8%2C+Panadura!3m2!1d6.7116343999999994!2d79.91094319999999!5e0!3m2!1sen!2slk!4v1448462267769" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <div class="col-md-4">
                <p>Phone:
                    <strong>0770234115</strong>
                </p>
                <p>Email:
                    <strong><a href="mailto:name@example.com">SagaCaters@gmail.com</a></strong>
                </p>
                <p>Address:
                    <strong>No:49 , Saga Caters , Horana Road , Panadura.</strong>
                </p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="container col-lg-8 col-xs-offset-2">
    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <hr>
                <h2 class="intro-text text-center"><b>Contact Form</b></h2>
                <hr>
                <form role="form">
                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label>Name</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Email Address</label>
                            <input type="email" class="form-control">
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Phone Number</label>
                            <input type="tel" class="form-control">
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group col-lg-12">
                            <label>Message</label>
                            <textarea class="form-control" rows="6"></textarea>
                        </div>
                        <div class="form-group col-lg-12">
                            <input type="hidden" name="save" value="contact">
                            <button type="submit" class="btn btn-default">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

</div>
<!-- /.container -->

<?php include 'footer.php'?>

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>
