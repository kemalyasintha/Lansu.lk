<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Saga Caters</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">
    <!--Form css-->
    <link rel="stylesheet" href="css/reserveForm.css">
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

<?php
$fname = $lname = $email = $contact = $address = $nic = "";

require("DBConnection.php");
$bookingDate=$_SESSION['date'];
$hallName=$_SESSION['hallname'];
$hallNumber= $_SESSION['hallnumber'];
$addeddate = date("Y-m-d");


if($_SERVER["REQUEST_METHOD"] == "POST") {

   // if($validate) {
        $fname = ($_POST["firstName"]);
        $lname = ($_POST["lastName"]);
        $email = ($_POST["email"]);
        $contact = ($_POST["contactno"]);
        $nic = ($_POST["nic"]);
        $address = ($_POST["address"]);
        $packageid = ($_POST["package"]);


        $fnameR = mysqli_real_escape_string($conn, $fname);
        $lnameR = mysqli_real_escape_string($conn, $lname);
        $emailR = mysqli_real_escape_string($conn, $email);
        $addressR = mysqli_real_escape_string($conn, $address);
        $contactR = mysqli_real_escape_string($conn, $contact);
        $nicR = mysqli_real_escape_string($conn, $nic);

        $flag = mysqli_query($conn, "INSERT INTO customer (fname, lname,contactno, email, address,nic) VALUES ('$fnameR', '$lnameR','$contactR', '$emailR', '$addressR','$nicR')") or die (mysqli_error($conn));

        if ($flag) {
            $customerid = $conn->insert_id;

            $hallnoR = mysqli_real_escape_string($conn, $hallNumber);
            $customeridR = mysqli_real_escape_string($conn, $customerid);
            $addeddateR = mysqli_real_escape_string($conn, $addeddate);
            $orderdateR = mysqli_real_escape_string($conn, $bookingDate);
            $packageidR = mysqli_real_escape_string($conn, $packageid);

            $flag = mysqli_query($conn, "INSERT INTO orders (hallid, customerid,orderDate, bookedDate, packageId) VALUES ('$hallnoR', '$customeridR','$addeddateR', '$orderdateR', '$packageidR')") or die (mysqli_error($conn));


        }

        if ($flag) {
            echo "<script>
    alert('Your Reservation is Successfully Done!!!!');
    window.location.href='index.php';
    </script>";
            exit();
        }
    //}

}

  ?>




<?php include 'header.php'?>

<!--start of form-->
<div class="row">
<div class="wrapper col-xs-8 col-xs-offset-2">
    <div class="container1">
        <h1>Reserve Online</h1>
        <form class="form-inline" method="post" onsubmit="return(validateForm())" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">s

            <div class="row">
                <label class="col-xs-12 label1" style="font-weight: 600;">Personal Details</label>
            </div>
            <div class="row">
            <label class="col-xs-4">First Name</label><label class="error">*</label>
            <input class="col-xs-4" type="text" id="firstName" name="firstName" placeholder="first name">
                <label id="errorFName" style="font-size: 10px;"> </label>
            </div>

            <div class="row">
                <label class="col-xs-4">Last Name</label><label class="error">*</label>
            <input class="col-xs-4" type="text" id="lastName" name="lastName" placeholder="last name">
                <label id="errorLName" style="font-size: 10px;"> </label>
            </div>

            <div class="row">
                <label class="col-xs-4">Contact Number</label><label class="error">*</label>
                <input class="col-xs-4" type="tel" id="contactno" name="contactno" placeholder="contact number" maxlength="10">
                <label id="errorContact" style="font-size: 10px;"> </label>
            </div>

            <div class="row">
                <label class="col-xs-4">Email</label><label class="error">*</label>
                <input class="col-xs-4" type="email" id="email" name="email" placeholder="email address" >
                <label id="errorEmail" style="font-size: 10px;"> </label>
            </div>

            <div class="row">
                <label class="col-xs-4">Address</label><label class="error">*</label>
                <textarea class="col-xs-4" type="text" id="address" name="address" placeholder="address"></textarea>
                <label id="errorAddress" style="font-size: 10px;"> </label>
            </div>

            <div class="row">
                <label class="col-xs-4">NIC Number</label><label class="error">*</label>
                <input class="col-xs-4" type="text" id="nic" name="nic" placeholder="nic number" maxlength="10">
                <label id="errorNic" style="font-size: 10px;"> </label>
            </div>

            <div class="row">
                <label class="col-xs-9 label1">Reserving Details</label>
            </div>

            <div class="row">

                <label class="col-xs-6">Hall Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $hallName;?></label>
                <label id="errorHall" style="font-size: 10px;"> </label>
            </div>
            <br>
            <div class="row">
                <label class="col-xs-4">Package</label><label class="error">*</label>
                <div class="col-xs-4">
                    <select class="form-control" id="package" name="package">
                        <option id="package" name="package" value="select"> ---------Select---------</option>
                        <option id="package" name="package" value="1"> 01 -  Rs: 2500.00</option>
                        <option id="package" name="package" value="2"> 02  -  Rs: 3000.00</option>
                        <option id="package" name="package" value="3"> 03 -  Rs: 3500.00</option>
                        <option id="package" name="package" value="4"> 04 -  Rs: 4000.00</option>
                    </select>
                </div>
                <label id="errorPackage" style="font-size: 10px;"> </label>
            </div>
            <br>
            <div class="row">


            </div>
            <label class="col-xs-6">Booking Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $bookingDate;?></label>



            <br><br>
            <div class="row">
                <div class="row">
                    <label class="col-xs-12 label1" style="font-weight: 600;">Payment Details</label>
                </div>
                <button class="col-xs-3 col-xs-offset-3 btn-default" style="color: #f0ad4e;">Pay via PayPal</button>
                
            </div>

            <br><br>
            <div class="row">
            <button class="col-xs-3 col-xs-offset-9" type="submit">Reserve</button>
                <p><span class="error col-xs-4 col-xs-offset-0" style="font-size: 15px;">* required fields</span></p>
            </div>


    </div>

    <ul class="bg-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
    </form>
</div>
</div>
<br><br>

<!--end of form-->
<?php include 'footer.php'?>

<!--sscripts for form-->
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/reserveForm.js"></script>
<script src="js/jquery.validate.min.js"></script>
<!-- Data validation-->
<script type="text/javascript">
    function validateForm() {
        var errors = [];

        //Start of personal detail validate
        if (!validateName("firstName", "errorFName")) {
            errors.push("errorFName");
        }

        if (!validateName("lastName", "errorLName")) {
            errors.push("errorLName");
        }

        var nicNumber = document.getElementById("nic").value;
        if (!validateNicNumber(nicNumber)) {
            errors.push("errorNic");
        }
        //End of personal detail validate

        //Start of contact detail validate
        if (!validateName("address", "errorAddress")) {
            errors.push("errorAddress");
        }

        var mobileNumber = document.getElementById("contactno").value;
        if (!validateMobileNumber(mobileNumber)) {
            errors.push("errorcontact");
        }
        var email = document.getElementById("email").value;
        if (!validateEmail(email)) {
            errors.push("errorEmail");
        }


        //End of contact detail validate

        //Start of category detail validate
        if (!validateCategory("hallName", "errorHall")) {
            errors.push("errorHall");
        }

        if (!validateCategory("package", "errorPackage")) {
            errors.push("errorPackage");
        }

        //End of category detail validate


        //End of other detail validate

        if (errors.length > 0) {
            return false;
        }
        else {
            return true;
        }
    }

    function validateName(text, errorLbl) {
        if (document.getElementById(text).value == "" || document.getElementById(text).value == null) {
            document.getElementById(text).focus();
            document.getElementById(text).style.borderColor = "red";
            document.getElementById(errorLbl).innerHTML = "required";
            document.getElementById(errorLbl).style.color = "red";
            return false;
        }
        else {
            document.getElementById(text).style.borderColor = "green";
            document.getElementById(errorLbl).innerHTML = "";
            return true;
        }
    }

    function validateNicNumber(text) {
        var pattern = /^[0-9]{9}(V|v){1}/;
        if (text == "" || text == null) {
            document.getElementById("nic").focus();
            document.getElementById("nic").style.borderColor = "red";
            document.getElementById("errorNic").innerHTML = "required";
            document.getElementById("errorNic").style.color = "red";
            return false;
        }
        else if ((pattern.test(text)) == false || text.length < 10) {
            document.getElementById("nic").focus();
            document.getElementById("nic").style.borderColor = "red";
            document.getElementById("errorNic").innerHTML = "invalid type";
            document.getElementById("errorNic").style.color = "red";
            return false;
        }
        else {
            document.getElementById("nic").style.borderColor = "green";
            document.getElementById("errorNic").innerHTML = "";
            return true;
        }
    }

    function validateMobileNumber(text) {
        var pattern = /^([+0-9]{1,3})?([0-9]{10,11})$/i;
        if (text == null || text == "") {
            document.getElementById("contactno").focus();
            document.getElementById("contactno").style.borderColor = "red";
            document.getElementById("errorContact").innerHTML = "required";
            document.getElementById("errorContact").style.color = "red";
            return false;
        }
        else if ((pattern.test(text)) == false || text.length < 10) {
            document.getElementById("contactno").focus();
            document.getElementById("contactno").style.borderColor = "red";
            document.getElementById("errorContact").innerHTML = "invalid type";
            document.getElementById("errorContact").style.color = "red";
            return false;
        }
        else {
            document.getElementById("contactno").style.borderColor = "green";
            document.getElementById("errorContact").innerHTML = "";
            return true;
        }
    }



    function validateEmail(text) {
        var pattern = /^[a-z0-9._-]+@[a-z]+.[a-z.]{2,5}$/i;
        if (text == "" || text == null) {
            document.getElementById("email").focus();
            document.getElementById("email").style.borderColor = "red";
            document.getElementById("errorEmail").innerHTML = "invalid email";
            document.getElementById("errorEmail").style.color = "red";
            return false;
        }
        else if ((pattern.test(text)) == false) {
            document.getElementById("email").focus();
            document.getElementById("email").style.borderColor = "red";
            document.getElementById("errorEmail").innerHTML = "invalid email";
            document.getElementById("errorEmail").style.color = "red";
            return false;
        }
        else {
            document.getElementById("email").style.borderColor = "green";
            document.getElementById("errorEmail").innerHTML = "";
            return true;
        }
    }


    function validateCategory(text, errorLbl) {
        if (document.getElementById(text).value == "select") {
            document.getElementById(text).focus();
            document.getElementById(text).style.borderColor = "red";
            document.getElementById(errorLbl).innerHTML = "please select a value";
            document.getElementById(errorLbl).style.color = "red";
            return false;
        }
        else {
            document.getElementById(text).style.borderColor = "green";
            document.getElementById(errorLbl).innerHTML = "";
            return true;
        }
    }





</script>
</body>
</html>