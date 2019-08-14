<?php
  session_start();

?>
<?php include "header.php";?>
<?php include "user-header.php";?>

<style>
  .dropdown{
    float: right;
    margin-right: 10%;
  }
</style>

<div class="dropdown">
  <button class="dropbtn">Filter</button>
  <div class="dropdown-content">
    <a href="ltoh.php">Price:Low to High</a>
    <a href="phtol.php">Price:High to Low</a>
    <a href="alpha.php">Alphabetical</a>


  </div>
</div>
<?php

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'grocery');


  $username = $_SESSION['username'];
  $search = $_SESSION['search'];
  echo "<h2>Showing results for $search  </h2><br><br>";

  $query = "SELECT * FROM products ORDER BY Price Desc";

  if ($result = mysqli_query($db, $query)) {
      while ($row = $result->fetch_assoc()) {

        $img = $row["pic"];
        $type = $row["Type"];
        $product = $row["Product"];
        $description = $row["Description"];
        $picId = $row["Id"];
        $price = $row["Price"];
        $brand = $row["Brand"];
        if (strtolower($row["Product"])  == strtolower($search) ) {
          echo "<div class='well img_div'>
                  <form action='add-cart-proc.php' method='post'>
                  <img class='disp-img' src='image/$img'></img><br><br>
                  <input name='Id' value='$picId' hidden>
                  <input name='price' value='$price' hidden>
                  <input name='product' value='$product' hidden>
                  <input name='username' value='$username' hidden>
                  <input name='img' value='$img' hidden>
                  <input type='number' name='quantity' value='1' min='1' max='50'>

                  <br><br>Description:<br>
                  <h3>$description</h3>

                  <br><br>Brand:<br>
                  <h3>$brand</h3><br>

                  <br><br>Price:<br>
                  <h3>$price/-</h3><br>

                  <input type='submit' name='add-button'value='Add to cart'></input>
                  </form>
                </div>";

        }


          if ($row["Id"] == $search) {
            echo "<div class='well img_div'>
                    <form action='add-cart-proc.php' method='post'>
                    <img class='disp-img' src='image/$img'></img><br><br>
                    <input name='Id' value='$picId' hidden>
                    <input name='price' value='$price' hidden>
                    <input name='product' value='$product' hidden>
                    <input name='username' value='$username' hidden>
                    <input name='img' value='$img' hidden>
                    <input type='number' name='quantity' value='1' min='1' max='50'>

                    <br><br>Description:<br>
                    <h3>$description</h3>

                    <br><br>Brand:<br>
                    <h3>$brand</h3><br>

                    <br><br>Price:<br>
                    <h3>$price/-</h3><br>

                    <input type='submit' name='add-button'value='Add to cart'></input>
                    </form>
                  </div>";

            }

            if (strtolower($row["Brand"]) == strtolower($search)) {
              echo "<div class='well img_div'>
                      <form action='add-cart-proc.php' method='post'>
                      <img class='disp-img' src='image/$img'></img><br><br>
                      <input name='Id' value='$picId' hidden>
                      <input name='price' value='$price' hidden>
                      <input name='product' value='$product' hidden>
                      <input name='username' value='$username' hidden>
                      <input name='img' value='$img' hidden>
                      <input type='number' name='quantity' value='1' min='1' max='50'>

                      <br><br>Description:<br>
                      <h3>$description</h3>

                      <br><br>Price:<br>
                      <h3>$price/-</h3><br>

                      <input type='submit' name='add-button'value='Add to cart'></input>
                      </form>
                    </div>";

              }

      }
  }





?>
</body>
</html>
