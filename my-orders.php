<?php
  session_start();

?>
<?php include "header.php";?>
<?php include "user-header.php";?>

<style>

.well2{
  width: 100%;
  background-color: #4286f4;
}
.well{
  margin: 2px 2px 2px 2px;
}

</style>

<center>
<table>
  <table>
    <tr>
      <th> Product Id </th>
      <th> Name </th>
      <th> Quantity </th>
      <th> Cost </th>
      <th> Delivery Time </th>
    </tr>

<?php
    $db = mysqli_connect('localhost', 'root', '', 'grocery');
    $username = $_SESSION['username'];
    $prev_type='';
    $query = "SELECT * FROM checkout where uid='$username'";
    $txt = '';
    if ($result = mysqli_query($db, $query)) {
            /* fetch associative array */

        while ($row = $result->fetch_assoc()) {
          $uid=$row['uid'];
          $pid=$row['pid'];
          $name=$row['name'];
          $qty=$row['qty'];
          $cost=$row['cost'];
          $deliveryTime=$row['deliveryTime'];

          $txt .= "<tr>
            <th> ".$pid." </th>
            <th> ".$name." </th>
            <th> ".$qty." </th>
            <th> ".$cost." </th>
            <th> ".$deliveryTime." Days</th>
          </tr>";



    }
  }
    echo $txt;
    mysqli_close($db);
?>
</table>
</center>
