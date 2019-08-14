<?php


    $db = mysqli_connect('localhost', 'root', '', 'grocery');
    $username = $_POST['username'];
    $total = number_format($_POST['total']);
    $subscription = $_POST['subscription'];


    if ($subscription == 'regular') {
      $delivery_time = 7;
    }else {
      $delivery_time = 2;
    }

    $query = "SELECT * FROM users where UserId = '$username'";
    if ($result = mysqli_query($db, $query)) {
        while ($row = $result->fetch_assoc()) {
            $cash2 = $row['cash'];
            $cash2 -= $total;
    }
    }

    $query = "SELECT * FROM cart WHERE UserId = '$username'";
    if ($result = mysqli_query($db, $query)) {
        while ($row = $result->fetch_assoc()) {
            $uid=$row['UserId'];
            $pid=$row['pid'];
            $name=$row['Product'];
            $qty=$row['Quantity'];
            $price = $row['Price'];;
            $del_time = $delivery_time;

            $query = "INSERT INTO checkout (uid,pid,name,qty,cost,deliveryTime)VALUES ('$uid','$pid','$name',$qty,$price,$del_time);";
            mysqli_query($db,$query);

            $sql1 = "UPDATE users SET cash = '$cash2'  WHERE UserId = '$username';";
            mysqli_query($db , $sql1);

            $sql1 = "DELETE FROM cart WHERE pid='$pid' AND UserId='$uid';";
            mysqli_query($db , $sql1);
        }
    }
    header('location:cart.php?checkout=success');

?>
