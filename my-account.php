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
#member-signup{
  background-color: gray;
  width: 40%;
  height: 80%;
}
</style>




<?php
    $db = mysqli_connect('localhost', 'root', '', 'grocery');
    $username = $_SESSION['username'];
    $prev_type='';
    $query = "SELECT * FROM users where UserId = '$username'";

    if ($result = mysqli_query($db, $query)) {
        while ($row = $result->fetch_assoc()) {
            $cash = $row['cash'];
            $member = $row['membership'];
            $duration = $row['duration'];

            if ($member == 'regular') {
              echo "
                    <div class='well'>
                    <h4>Cash : $cash <br>
                    Membership: $member <button id='upgrade' class='btn'> Upgrade ?</button><br>
                    User: $username <br></h4>
                    </div>";
            }else {
              echo "
                    <div class='well'>
                    <h4>Cash : $cash <br>
                    Membership: $member <button id='upgrade' class='btn'> Extend ?</button><br>
                    User: $username <br>
                    Duration: $duration Months </h4>
                    </div>";
            }

   }
 }
 else {
   echo "Error: No User Found";
 }
?>

<br><br>
<center>
<div id='member-signup' hidden>
    <form action="member-proc.php" method="post">
          <br><br>Duration <input id='duration' type="number" value="0" min="1" max="12" name='duration'> Months<br><br>
          Cost <input id='cost' type="button" name='cost'><br><br>
          <input type="submit" value="Pay" name='member-btn'><br><br>
    </form>

</div>
</center>
<script>
$(document).ready(function(){
      $('#upgrade').click(function(){
           $("#member-signup").show(1000);
      });

      $('#duration').click(function(){
        if ($('#duration').val() != '0') {
            var cost = parseInt($('#duration').val()) * 100;
            $('#cost').val(cost);
        }
      });


});

</script>
