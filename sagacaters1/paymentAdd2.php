<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10/19/2015
 * Time: 5:50 AM
 */
require("DBConnection.php");

//$paymentID     = $_POST['paymentID'];
$name          = $_POST['Name'];
//$customerID    = $_POST['customerID'];
$nic           = $_POST['NIC'];
//$orderID       = $_POST['orderID'];
$discount      = $_POST['Discount'];
$amount        = $_POST['Amount'];
$paymentMethod = $_POST['PaymentMethod'];



$name = mysqli_real_escape_string($conn, $name);
$lnameR = mysqli_real_escape_string($conn, $lname);
$emailR = mysqli_real_escape_string($conn, $email);
$addressR = mysqli_real_escape_string($conn, $address);
$contactR = mysqli_real_escape_string($conn, $contact);
$nicR = mysqli_real_escape_string($conn, $nic);



// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else {

    $sql1 = "INSERT INTO`payments` (`paymentMethod`, `discount`, `amount`,`nic`) VALUES ";
//    $sql1 .= "('{$paymentID}','{$customerID}','{$orderID}','{$paymentMethod}','{$discount}','{$amount}','{$nic}')";
      $sql1 .= "('{$paymentMethod}','{$discount}','{$amount}','{$nic}')";
    //$sql2 = 'SELECT * FROM `payments` ';
    $result = mysqli_query($conn,$sql1);

    if($result){
        echo "<script type='text/javascript'>alert('Payment Added Successfully!')</script>";
//		echo "<script>alert('Payment Added Successfully.');</script></a>";
        //echo "<br /><a href='index.php'>OK</a>";
    }else{
        echo 'Adding failed.';
    }
    include "index.php";

}

mysqli_close($conn);
?>