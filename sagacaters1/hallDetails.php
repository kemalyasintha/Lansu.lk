<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Reserve | Saga Caters</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link
        href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
        rel="stylesheet" type="text/css">
    <link
        href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic"
        rel="stylesheet" type="text/css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="css/datepicker.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<?php
$availability1 = $availability2=$availability3= "";
if($_SERVER["REQUEST_METHOD"] == "POST") {

    $date2 = date("Y-m-d");
    $hallNumber = $_POST['check'];
    $_SESSION['hallnumber'] = $hallNumber;
    $hallName="";



    if($hallNumber==1){
        $date1 = $_POST['hall1'];
        $hallName="Hall Emerald";
    }elseif($hallNumber==2){
        $date1 = $_POST['hall2'];
        $hallName="Hall Sapphire";
    }else{
        $date1 = $_POST['hall3'];
        $hallName="Hall Opal";
    }

    $_SESSION['date'] = $date1;
    $_SESSION['hallname'] = $hallName;
    echo $_SESSION['date'];
//$password = hash('sha1', $password);

    require("DBConnection.php");

    if ($date2 >= $date1) {
        echo "<script>
    alert('The Date You Entered has Already Passed!!!!');
    window.location.href='hallDetails.php';
    </script>";
    } else {
        $sql = "select bookedDate from orders where hallid='$hallNumber'";
        $result = mysqli_query($conn, $sql);

        if ($result->num_rows > 0) {
            // output data of each row
            $available = 0;
            while ($row = $result->fetch_assoc()) {

                if ($row["bookedDate"] == $date1) {
                    $available = 1;
                    //break
                }
            }
            if ($available == 0) {
                if($hallNumber==1){
                    $availability1="Date Available!!! Click on reserve button To reserve.";
                }elseif($hallNumber==2){
                    $availability2="Date Available!!! Click on reserve button To reserve.";
                }else{
                    $availability3="Date Available!!! Click on reserve button To reserve.";
                }


            } else {
                if($hallNumber==1){
                    $availability1="Date Not Available!!! ";
                }elseif($hallNumber==2){
                    $availability2="Date Not Available!!!";
                }else{
                    $availability3="Date Not Available!!!";
                }

            }
        } else {
            if($hallNumber==1){
                $availability1="Date Available!!! Click on reserve button To reserve.";
            }elseif($hallNumber==2){
                $availability2="Date Available!!! Click on reserve button To reserve.";
            }else{
                $availability3="Date Available!!! Click on reserve button To reserve.";
            }

        }


    }


    mysqli_close($conn);
}
?>




<?php include 'header.php' ?>
<div class="container">

    <div class="row">
        <div class="box">
            <div class="col-xs-12">
                <form class="form-inline" method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <hr>
                <h2 class="intro-text text-center">
                    <strong>Hall Emerald</strong>
                </h2>
                <hr>
                <div class="row">
                <img class="img-responsive img-border img-left col-xs-3" src="img/hallDetails/hall1.jpg" alt="">
                <hr class="visible-xs">

                    <div class="col-xs-8">
                <table>
                    <tr>
                        <td><br>Location &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                        <td><br>&nbsp;3<sup>rd</sup> Floor</td>
                    </tr>
                    <tr>
                        <td><br> Dimensions &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</td>
                        <td><br>&nbsp;20.4 x 30.3m</td>
                    </tr>
                    <tr>
                        <td><br>Height &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                        </td>
                        <td><br>4.05m</td>
                    </tr>
                    <tr>
                        <td><br>Area &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                        </td>
                        <td><br>645sq.m.</td>
                    </tr>
                    <tr>
                        <td><br>Capacity &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</td>
                        <td><br>Dinner Style 300 | Buffet Style 400 | Theater Style 560 | School Style 330</td>
                    </tr>
                </table>
                        </div>
                    </div>
                    <br><br>
                    <!--check availability-->
                        <div class="row">
                            <div class="col-xs-5 col-xs-offset-1" >
                                <label  class="control-label col-xs-4 " style="display: inline-block; text-align: left;"> Check Availability </label>
                                <div class="hero-unit">
                                    <input  type="text" class="form-control  col-xs-4 " placeholder="Pick a date"  name="hall1" id="hall1">
                                 </div>
                                <button class="btn btn-primary col-xs-offset-3" value="1" name="check" id="check">Check</button><br>
                            </div>
                            <label id="availability" style="font-size: 20px; background-color:#f3e97a; color: #CD661D; border-color: #843534; border-radius: 5px;"><?php echo $availability1?> </label>

                        </div>
                    <br><br>
                <div class="row">

            </div>
                    </form>
                <?php
                $res1 = "";
                if($availability1=="Date Available!!! Click on reserve button To reserve."){
                    $res1 = "";
                }else{
                    $res1 = "disabled";
                } ?>
                <a href="reserveForm.php"><button class="btn btn-primary col-xs-offset-6" <?php echo $res1 ?>>Reserve</button></a>
                </div>
        </div>
    </div>

    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <form class="form-inline" method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <hr>
                <h2 class="intro-text text-center">
                    <strong>Hall Sapphire</strong>
                </h2>
                <hr>
                <div class="row">
                <img class="img-responsive img-border img-left col-xs-3" src="img/hallDetails/hall2.jpg" alt="">
                <hr class="visible-xs">

                <table class="col-xs-8">
                    <tr>
                        <td><br>Location &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                        <td><br>&nbsp;4<sup>th</sup> Floor</td>
                    </tr>
                    <tr>
                        <td><br> Dimensions &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</td>
                        <td><br>&nbsp;15.4 x 27.3m</td>
                    </tr>
                    <tr>
                        <td><br>Height &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                        </td>
                        <td><br>4.05m</td>
                    </tr>
                    <tr>
                        <td><br>Area &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                        </td>
                        <td><br>432sq.m.</td>
                    </tr>
                    <tr>
                        <td><br>Capacity &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</td>
                        <td><br>Dinner Style 200 | Buffet Style 300 | Theater Style 460 | School Style 230</td>
                    </tr>
                </table>
                    </div>

                    <!--check availability-->
                    <div class="row">
                        <div class="col-xs-5 col-xs-offset-1" >
                            <label  class="control-label col-xs-4 " style="display: inline-block; text-align: left;"> Check Availability </label>
                            <div class="hero-unit">
                                <input  type="text" class="form-control  col-xs-4 " placeholder="Pick a date"  name="hall2" id="hall2">
                            </div>
                            <button class="btn btn-primary col-xs-offset-3" value="2" name="check" id="check">Check</button><br>
                        </div>
                        <label id="availability" style="font-size: 20px; background-color:#f3e97a; color: #CD661D; border-color: #843534; border-radius: 5px;"><?php echo $availability2?> </label>

                    </div>
                    <!--end date picker-->


                <br>

                    </form>
                <?php
                $res2 = "";
                if($availability2=="Date Available!!! Click on reserve button To reserve."){
                    $res2 = "";
                }else{
                    $res2 = "disabled";
                } ?>
                <a href="reserveForm.php"><button class="btn btn-primary col-xs-offset-6" <?php echo $res2 ?>>Reserve</button></a>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <form class="form-inline" method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                <hr>
                <h2 class="intro-text text-center">
                    <strong>Hall Opal</strong>
                </h2>
                <hr>
                <div class="row">
                <img class="img-responsive img-border img-left col-xs-3" src="img/hallDetails/hall3.jpg" alt="">
                <hr class="visible-xs col-xs-8">
                <table>
                    <tr>

                        <td><br>Location &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                        <td><br>&nbsp;2<sup>nd</sup> Floor</td>
                    </tr>
                    <tr>
                        <td><br> Dimensions &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</td>
                        <td><br>&nbsp;10.4 x 17.3m</td>
                    </tr>
                    <tr>
                        <td><br>Height &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                        </td>
                        <td><br>4.05m</td>
                    </tr>
                    <tr>
                        <td><br>Area &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                        </td>
                        <td><br>356sq.m.</td>
                    </tr>
                    <tr>
                        <td><br>Capacity &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</td>
                        <td><br>Dinner Style 100 | Buffet Style 200 | Theater Style 360 | School Style 130</td>

                    </tr>
                </table>
                </div>
            </div>

    <br><br><br>
                <!--check availability-->
            <div class="row">
                <div class="col-xs-5 col-xs-offset-1" >
                    <label  class="control-label col-xs-4 " style="display: inline-block; text-align: left;"> Check Availability </label>
                    <div class="hero-unit col-xs-5">
                        <input  type="text" class="form-control  col-xs-4 " placeholder="Pick a date"  name="hall3" id="hall3">
                    </div>
                    <button class="btn btn-primary col-xs-offset-3" value="3" name="check" id="check">Check</button><br>
                </div>
                <label id="availability" style="font-size: 20px; background-color:#f3e97a; color: #CD661D; border-color: #843534; border-radius: 5px;"><?php echo $availability3?> </label>

            </div>
                <br><br>
            </form>
            <?php
            $res3 = "";
            if($availability3=="Date Available!!! Click on reserve button To reserve."){
                $res3 = "";
            }else{
                $res3 = "disabled";
            } ?>
            <a href="reserveForm.php"><button class="btn btn-primary col-xs-offset-6" <?php echo $res3 ?>>Reserve</button></a>
            </div>
        </div>
    </div>


</div>
<?php include 'footer.php'?>

    <script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script type="text/javascript">
        // When the document is ready
        $(document).ready(function () {

            $('#hall1').datepicker({
                format: "yyyy-mm-dd"
            });

        });
    </script>

    <script type="text/javascript">
        // When the document is ready
        $(document).ready(function () {

            $('#hall2').datepicker({
                format: "yyyy-mm-dd"
            });

        });
    </script>

    <script type="text/javascript">
        // When the document is ready
        $(document).ready(function () {

            $('#hall3').datepicker({
                format: "yyyy-mm-dd"
            });

        });
    </script>
</body>
</html>