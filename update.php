<?php
  session_start();

?>
<?php include "header.php";?>
<?php include "user-header.php";?>

<?php
    $db = mysqli_connect('localhost', 'root', '', 'grocery');
    $username = $_SESSION['username'];
    $quantity = $_POST['qty'];




    $query = "UPDATE cart SET Quantity='$quantity' WHERE UserId = '$user'";
    mysqli_query($db,$query);

    
?>
