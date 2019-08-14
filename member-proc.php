<?php
  session_start();
?>
<?php
$db = mysqli_connect('localhost', 'root', '', 'grocery');
$duration = $_POST['duration'];
$cost = (int)$_POST['cost'];
$username = $_SESSION['username'];


$query = "SELECT * FROM users where UserId = '$username'";
if ($result = mysqli_query($db, $query)) {
    while ($row = $result->fetch_assoc()) {
        $member = $row['membership'];
        $duration2 = $row['duration'];
        $duration += $duration2;

        $cash2 = $row['cash'];
        $cash2 -= ($duration*100);
}
}



$sql1 = "UPDATE users SET membership='premium' WHERE UserId='$username';";
mysqli_query($db , $sql1);

$sql1 = "UPDATE users SET cash = '$cash2'  WHERE UserId = '$username';";
mysqli_query($db , $sql1);

$sql1 = "UPDATE users SET duration='$duration' WHERE UserId='$username';";
mysqli_query($db , $sql1);

    header('location: my-account.php?member=success');
?>
