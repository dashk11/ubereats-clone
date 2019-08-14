<?php
  session_start();

?>
<?php include "header.php";?>
<?php include "root-header.php";?>


<center>
<table>
  <tr>
    <th> UserId </th>
    <th> Name </th>
    <th> Age </th>
    <th> E-mail </th>
    <th> Remove </th>

  </tr>


<?php
      $text='';
      $db = mysqli_connect('localhost', 'root', '', 'grocery');
      $query = "SELECT * FROM users";
      if ($result = mysqli_query($db, $query)) {
         while ($row = $result->fetch_assoc()) {
               $text .=  "<tr>".
                         "<td>". $row['UserId'] ."</td>".
                         "<td>". $row['Name'] ."</td>".
                         "<td>". $row['Age'] ."</td>".
                         "<td>". $row['Email'] ."</td>".
                         "<td>

                               <button id='".$row['UserId']."' name='".$row['UserId']."'  class='btn btn-danger'  onclick='dele(this.name)'>Delete</button></td>

                            ".
                         "</tr>";
         }
      }

      echo $text;
?>



</table>
<div id='txtHint'></div>
</center>

<script>
function dele(nam) {

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "delete-user-proc.php?q="+nam, true);
        xmlhttp.send();
}
</script>
