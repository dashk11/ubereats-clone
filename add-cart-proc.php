<?php
if (isset($_POST['add-button'])) {
  $db = mysqli_connect('localhost', 'root', '', 'grocery');

  $uid = $_POST['username'];
  $product = $_POST['product'];
  $pid = $_POST['Id'];
  $price = $_POST['price'];
  $quantity = $_POST['quantity'];
  $img = $_POST['img'];


  $sql = "INSERT INTO cart values ('$uid', '$product','$quantity','$price','$pid','$img')";
  mysqli_query($db, $sql);
  header('location: user-home.php');
}

?>
