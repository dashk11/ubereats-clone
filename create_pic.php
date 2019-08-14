<?php
  session_start();
?>

<?php include "header.php" ?>
<?php include "root-header.php";?>




  <div class="well">
    <form class="" action="upload_proc.php" method="post">
      <input type="file" name="pic" accept="image/*"><br>

      <input type="text" name="Product" placeholder="Product"><br>
      <input type="text" name="Type" placeholder="Type"><br>
      <input type="text" name="Price" placeholder="Price"><br>
      <input type="text" name="Brand" placeholder="Brand"><br>
      <input type="text" name="Description" placeholder="Description"><br><br>

      <input class="btn btn-primary"type="submit" name="pic-submit">
    </form>
  </div>
</body>
