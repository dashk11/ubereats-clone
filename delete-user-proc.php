<?php
$uid = $_GET['q'];
if ($uid == 'root') {
  echo "<h4>Can't Remove Root : Contact Admin</h4>";
}else {
  $db = mysqli_connect('localhost', 'root', '', 'grocery');
  $query = "DELETE FROM users WHERE UserId = '$uid'";
  mysqli_query($db,$query);
  
  echo "<h4>Deleted $uid Successfully</h4>";

}

?>
