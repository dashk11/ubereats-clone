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



<?php
    $db = mysqli_connect('localhost', 'root', '', 'grocery');
    $username = $_SESSION['username'];

    $query = "SELECT * FROM users where UserId = '$username'"; //check subscription type
    if ($result = mysqli_query($db, $query)) {
        while ($row = $result->fetch_assoc()) {
            $subscription=$row['membership'];
        }
    }

    $query = "SELECT * FROM cart WHERE UserId = '$user'";
    $text='<center>
    <table>
      <tr>
        <th> Product Id </th>
        <th> Product </th>
        <th> Quantity </th>
        <th> Price </th>
        <th> Image </th>
        <th> Remove </th>

      </tr>';
    $total=0;
    if ($result = mysqli_query($db, $query)) {
            /* fetch associative array */
        while ($row = $result->fetch_assoc()) {

          $product = $row['Product'];
          $quantity = $row['Quantity'];
          $price = $row['Price'];
          $pid = $row['pid'];
          $total += $row['Price']*$row['Quantity'];

          $text .=  "<tr>".
                    "<td>". $row['pid'] ."</td>".
                    "<td>". $row['Product'] ."</td>".
                    "<td>". $row['Quantity'] ."</td>".
                    "<td>". $row['Price']*$row['Quantity'] ."</td>".
                    "<td><img class='product_img' src='image/".$row['pic']."'/></td>".
                    "<td>
                      <form action='delete/cart-delete.php' method='POST'>
                          <input name='pid' value='$pid' type='text' hidden>
                          <input class='btn btn-danger' value='Delete' type='submit' name='cart-del-btn'>
                      </form>
                    </td>".
                    "</tr>";

        }
    }
    if ($subscription == 'regular') {
      $text .= " </table><br>Subtotal: ".$total." /-<br> GST: ".$total*0.05." /-<br>Delivery: ".$total*0.30." /- <br><br>";

      $total += ($total*0.05)+($total*0.30);
      $text .= "<h3>Total:  ".$total." Rs</h3><br>
                <form action='checkout.php' method='POST'>
                    <input type=text value='$username' name='username' hidden>
                    <input type=text value='$total' name='total' hidden>
                    <input type=text value='$subscription' name='subscription' hidden>
                    <input type='submit' value='Checkout' name='checkout-btn' class='btn btn-success'>
                </form>
                </center><br>";


    }else { //premium subcriber
      $text .= " </table><br>Subtotal: ".$total." /-<br> GST: ".$total*0.05." /- <br><br>";

      $total += ($total*0.05);
      $text .= "<h3>Total:  ".$total." Rs</h3><br>
                <form action='checkout.php' method='POST'>
                    <input type=text value='$username' name='username' hidden>
                    <input type=text value='$total' name='total' hidden>
                    <input type=text value='$subscription' name='subscription' hidden>
                    <input type='submit' value='Checkout' name='checkout-btn' class='btn btn-success'>
                </form>
                </center><br>";


    }

    if ($total == 0) {
      echo "<center><br><br><h3>Cart is Empty !<h3/><br><a href='user-home.php'>Shop ?</a></center>";
    }else {
      echo $text;
    }


    mysqli_close($db);
?>
