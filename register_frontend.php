 <?php
echo "<center><h1>Register</h1></center><br><br>
<form class='' action='proc/register_proc.php' method='post'>
  <center>
  Username <input class='form-control'type='text' name='uid' value='' required><br>
  Name <input class='form-control'type='text' name='name' value='' required><br>
  Age <input class='form-control'type='text' name='age' value='' required><br>
  E-mail <input class='form-control'type='text' name='email' value='' required><br>
  Password <input id='pass1' class='form-control'type='password' name='pass1' value='' required><br>
  Re-Enter Password <input id='pass2' class='form-control'type='password' name='pass2' value='' required><br>
  <input class='btn btn-lg btn-danger'type='submit' name='register-submit' value='Submit' onclick='pass_check()'><br>
  <span id='status'></span><br>
  <a href='login.php'>Login?</a>
</center>";

 ?>
