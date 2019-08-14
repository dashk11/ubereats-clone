<?php
$user = $_SESSION['username'];
echo "$user";
?>


<style>
  .login-btn{
    float: right;
    margin-top: -4%;

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
    <form class="" action="logout.php" method="get">
      <input class="login-btn btn btn-lg btn-danger" type="submit" name="logout" value="Logout">
    </form>
  </div>

  <nav class="navbar navbar-inverse">
  <div class="container-fluid">


    <form class="search-bar" action="search-users.php" method="post">
      <input type="search" name="search" value="">
      <input type="submit" value="search" name='search-button'>
    </form>


    <div class="navbar-header">
      <a class="navbar-brand" href="user-home.php">FitKart.com</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="#"><a href="root-home.php">Myaccount</a></li>
      <li class="#"><a href="create_pic.php">Create Product</a></li>
      <li class="#"><a href="product-list.php">Product list </a></li>
      <li class="#"><a href="user-list.php">User List </a></li>
    </ul>
  </div>
</nav>


</body>


</html>
