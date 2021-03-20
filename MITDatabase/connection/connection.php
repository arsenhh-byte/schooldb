
<?php
// create a connection to the database 

$servername =  "localhost";
$username = "root";
$password = "root";
$dbname = "school";


//use mysqli extension to connect to db 
$conn = new mysqli($servername,$username,$password,$dbname);

//check if the connection is valid
if ($conn->connect_error) {
      die("connection failed" . $conn->connect_error);
 } 

 echo "successfully connected";


$conn->close(); //closes the connection


?>