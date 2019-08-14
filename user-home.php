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
    $prev_type='';
    $query = "SELECT * FROM products ORDER BY Type";

    if ($result = mysqli_query($db, $query)) {
            /* fetch associative array */

        while ($row = $result->fetch_assoc()) {

            $img = $row["pic"];
            $type = $row["Type"];
            $product = $row["Product"];
            $description = $row["Description"];
            $picId = $row["Id"];
            $price = $row["Price"];
            $brand = $row["Brand"];
            if ($prev_type == $type) {
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
            }else {

              echo "</div><div class='well2'>";
              echo "<center><h2>$type<h2></center><br>";
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
                      <h3> $description</h3>

                      <br><br>Brand:<br>
                      <h3>$brand</h3><br>


                      <br><br>Price:<br>
                      <h3>$price/-</h3><br>

                      <input type='submit' name='add-button'value='Add to cart'></input>
                      </form>
                    </div>";
              $prev_type = $type;
            }



        }
    }
    mysqli_close($db);
?>
