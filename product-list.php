<?php
  session_start();

?>
<?php include "header.php";?>
<?php include "root-header.php";?>

<style>
.product_img{
  width: 30%;
  height: 50%;
}
</style>
<center>
<table>
  <tr>
    <th> Product Id </th>
    <th> Product </th>
    <th> Category </th>
    <th> Price </th>
    <th> Brand </th>
    <th> Picture </th>
    <th> Remove </th>

  </tr>


<?php
      $text='';
      $db = mysqli_connect('localhost', 'root', '', 'grocery');
      $query = "SELECT * FROM products";
      if ($result = mysqli_query($db, $query)) {
         while ($row = $result->fetch_assoc()) {
               $text .=  "<tr>".
                         "<td>". $row['Id'] ."</td>".
                         "<td>". $row['Product'] ."</td>".
                         "<td>". $row['Type'] ."</td>".
                         "<td>". $row['Price'] ."</td>".
                         "<td>". $row['Brand'] ."</td>".
                         "<td><img class='product_img' src='image/".$row['pic']."'/></td>".
                         "<td><button class='btn btn-danger' name='".$row['Id']."' onclick='dele(this.name)'>Delete</button></td>".
                         "</tr>";
         }
      }

      echo $text;


?>

</table>
<br><br>
<div id='disp'></div>
</center>
<script>
function dele(nam){
  xttp = new XMLHttpRequest();
  xttp.onreadystatechange = function(){
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById("disp").innerHTML = this.responseText;
    }
  };
  xttp.open('GET','delete-product.php?q='+nam,true);
  xttp.send();
}

</script>
