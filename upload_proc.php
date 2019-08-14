<?php
session_start();
// connect to database
$db = mysqli_connect('localhost', 'root', '', 'grocery');

if(isset($_POST['pic-submit'])){

date_default_timezone_set("America/New_York");
$uid = $_SESSION['username'];

$pic = $_POST['pic'];
$Product = $_POST['Product'];
$Type = $_POST['Type'];
$Price = $_POST['Price'];
$Brand = $_POST['Brand'];
$Description = $_POST['Description'];
$timestamp = date("Y/m/d");

$sql1 = "INSERT INTO products(   Product, Type, Price, Brand, Description, pic)
         VALUES ('$Product' ,'$Type','$Price','$Brand' ,'$Description','$pic');";

mysqli_query($db , $sql1);

header('location: create_pic.php?upload=success');

}
/*
function get_data(){ //convert data to JSON
   $db = mysqli_connect('localhost', 'root', '', 'blog');
   $query2 = "SELECT * FROM pics";
   $result  =  mysqli_query($db,$query2);
   $pic_data = array();

   while($row = mysqli_fetch_array($result)){
     $pic_data[] = array( 'picId' => $row["picId"],
                          'UserId' => $row["UserId"],
                          'pic' => $row["pic"],
                          'hashtag' => $row["hashtag"],
                          'views' => $row["views"],
                          'downloads' => $row["downloads"],

      );
   }
   return json_encode($pic_data);

}
$file_name = 'pic_data'. '.json';
file_put_contents($file_name, get_data()); //Create JSON file
*/
//header('location: create_pic.php?upload=success');

?>
