<?php
$user = $_SESSION['username'];
echo "$user";
?>


<style>
/* Style The Dropdown Button */
.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #f1f1f1}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
  display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
  background-color: #3e8e41;
}


  .login-btn{
    float: right;
    position: relative;
    margin-top: -6%;
    margin-right: 2%;

  }
  .cart-btn{
    position: relative;
    margin-top: -4%;
    margin-left: 81%;

  }
  .cart-value{
    position: relative;
    margin-top: -4%;
    margin-left: 85%;
    width: 4%;
    text-align: left;
    border-radius: 50px;

  }
  table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    text-align: center;
}
.navbar{
  margin-top: -1.5%;
}
.disp-img{
  width:60%;
  height: 80%;
}
.img_div{
  display: inline-block;
  width: 30%;
  padding-left: 10%;

}
.search-bar{
  float: right;
  margin-right: 10%;
  margin-top: 1%;
  position: relative;
}
.userIdName{
  font-size: 17px;
  font-weight: bold;
}
.profilePic{
  width:20%;
  height: 40%;
  border-radius: 250px;
}
.top-div{
  width: 100%;
  background-color: #32ba93;
}
</style>
<body>
  <div class="home-head well">
    <center><h1><i>FitKart</i></h1></center>

    <form class="" action="cart.php" method="post">
      <input class="cart-btn btn btn-lg btn-primary" type="submit" name="Cart" value="Cart">


      <?php
      $db = mysqli_connect('localhost', 'root', '', 'grocery');
      $user = $_SESSION['username'];
      $query = "SELECT * FROM cart WHERE UserId = '$user'";
      $value = 0;
      if ($result = mysqli_query($db, $query)) {
          while ($row = $result->fetch_assoc()) {
              $value++;
          }
      }
          echo '<input class="cart-value btn " type="button" value="'.$value.'">'
      ?>

    </form>

    <form class="" action="logout.php" method="get">
      <input class="login-btn btn btn-lg btn-danger" type="submit" name="logout" value="Logout">
    </form>
  </div>

  <nav class="navbar navbar-inverse">
  <div class="container-fluid">


    <form class="search-bar" action="search-product.php" method="post">
      <input type="search" name="search" value="">
      <input type="submit" value="search" name='search-button'>
    </form>


    <div class="navbar-header">
      <a class="navbar-brand" href="user-home.php">FitKart.com</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="#"><a href="my-account.php">Myaccount</a></li>
      <li class="active"><a href="user-home.php">Browse</a></li>
      <li class="#"><a href="my-orders.php">My orders</a></li>

    </ul>
  </div>
</nav>


</body>


</html>
