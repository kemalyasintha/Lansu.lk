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

<form method="post" action="paymentAdd2.php">
    <div class="container" style="width:40%;">

        <div class="row col-lg-10">
            <div class="box">

                <div class="col-lg-10">
                    <hr>
                    <h2 class="intro-text text-center"><b>Payment Form</b></h2>
                    <hr>
                    <form role="form">
                        <div class="row col-xs-offset-2" >

                            <div class="form-group col-lg-4" style="width:80%;">
                                <label>Name</label>
                                <input type="text" class="form-control" name="Name">
                            </div>

                            <div class="form-group col-lg-4" style="width:80%;">
                                <label>NIC</label>
                                <input type="text" class="form-control" name="NIC">
                            </div>

                            <!--                        <div class="clearfix"></div>-->

                            <!--                        <div class="form-group col-lg-4" style="width:80%;">-->
                            <!--                            <label>Email Address</label>-->
                            <!--                            <input type="email" class="form-control">-->
                            <!--                        </div>-->
                            <!---->
                            <!--                        <div class="clearfix"></div>-->
                            <!---->
                            <!--                        <div class="form-group col-lg-4" style="width:80%;">-->
                            <!--                            <label>Phone Number</label>-->
                            <!--                            <input type="tel" class="form-control">-->
                            <!--                        </div>-->

                            <div class="form-group col-lg-4" style="width:80%;">
                                <label>Payment Method</label>
                                <input type="tel" class="form-control" name="PaymentMethod">
                            </div>

                            <div class="form-group col-lg-4" style="width:80%;">
                                <label>Discount</label>
                                <input type="tel" class="form-control" name="Discount">
                            </div>

                            <div class="form-group col-lg-4" style="width:80%;">
                                <label>Amount</label>
                                <input type="tel" class="form-control" name="Amount">
                            </div>

<!--                            <div class="form-group col-lg-4" style="width:80%;">-->
<!--                                <label>Payment Method</label>-->
<!--                                <input type="tel" class="form-control" name="paymentMethod">-->
<!--                            </div>-->

                            <!--                        <div class="clearfix"></div>-->

                            <!--                        <div class="form-group col-lg-12">-->
                            <!--                            <label>Small description about your payment</label>-->
                            <!--                            <textarea class="form-control" rows="3"></textarea>-->
                            <!--                        </div>-->

                            <!--                        <div class="clearfix"></div>-->

                            <div class="form-group col-lg-12">
                                <input type="hidden" name="save" value="contact">
                                <button type="submit" class="btn btn-default">Pay with PayPal</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div> <!-- /.container -->
</form>

<?php include 'footer.php'?>

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>

