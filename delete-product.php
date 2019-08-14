<?php
$pid = $_GET['q'];

  $db = mysqli_connect('localhost', 'root', '', 'grocery');
  $query = "DELETE FROM products WHERE Id = '$pid'";
  mysqli_query($db,$query);

  echo "<h4>Deleted ProductID : $pid Successfully</h4>";

?>
