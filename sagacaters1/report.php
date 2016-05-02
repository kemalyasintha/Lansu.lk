<form>
  <div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Details About Customer</div>
  <div class="panel-body">
    <p>           </p>
  </div>

  <!-- Table -->
  <table class="table">

    <thead>
    <tr>
      <th>first name</th>
      <th>last name</th>
      <th>contact no</th>
      <th>booked date</th>
    </tr>
  </thead>
    <!--<thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>-->
    <tbody>

      <?php
require 'DBconnection.php';
$res = $conn->query("SELECT customer.fname, customer.lname, customer.contactno,orders.bookedDate
FROM customer
INNER JOIN orders
ON Orders.customerId=customer.customerId;");
while ($row = $res->fetch_assoc()) {
?>

<tr>
      <td><?php echo $row['fname']; ?></td>
      <td><?php echo $row['lname']; ?></td>
      <td><?php echo $row['contactno']; ?></td>
      <td><?php echo $row['bookedDate']; ?></td>
      <!--<tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>-->
    </tr>
      <?php


}
?>
    </tbody>


  </table>
</div>
</form>