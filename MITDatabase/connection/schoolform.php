<?php
// define variables and set to empty values
$stafffirstnameerr= '';
$stafflastnameerr= '';
$emailerr= '';
$staffgendererr = '';
$salaryerr= '';


$stafffirst_name= '';
$stafflast_name= '';
$email= '';
$staffgender= '';
$salary='';


$studentfirstnameerr= '';
$studentlastnameerr= '';
$studentemailerr
$studentgendererr = '';
$admissionnumbererr ='';
$studentregerr ='';

$first_name= '';
$last_name= '';
$student_email = '';
$gender= '';
$admission_number= '';
$reg_date='';

if (isset($_POST['save'])){
  if (empty($_POST["stafffirst_name"])) {
    $stafffirstnameerr = "First Name is required";
  } else {
    $stafffirst_name = test_input($_POST["stafffirst_name"]);
    $stafffirst_name=filter_var($stafffirst_name, FILTER_SANITIZE_STRING);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$stafffirst_name)) {
      $stafffirstnameerr = "Please put your first name";
    }
  }
  

  if (empty($_POST["stafflast_name"])) {
    $stafflastnameerr = "Last Name is required";
  } else {
    $stafflast_name = test_input($_POST["stafflast_name"]);
    $stafflast_name=filter_var($stafflast_name, FILTER_SANITIZE_STRING);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$stafflast_name)) {
      $stafflastnameerr = "Please put your last name";
    }
  }
  if (empty($_POST["email"])) {
    $emailerr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    $email=filter_var($email, FILTER_SANITIZE_EMAIL);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailerr = "Invalid email address";
    }
  }


  // if (empty($_POST["staffgender"])) {
  //   $staffgendererr = "Gender is required";
  // } else {
  //   $staffgender = test_input($_POST["staffgender"]);
  // }

  if (empty($_POST["salary"])) {
  	# code...
  	$salaryerr="integer is required";
  }else{
  	$salary=test_input($_POST["salary"]);
  	// $integer=filter_var($integer, FILTER_SANITIZE_NUMBER_INT);
  	//filter integer
  		# code...
  	if (filter_var($salary, FILTER_VALIDATE_INT) ===0 || !filter_var($salary, FILTER_VALIDATE_INT) === false )
  	 {
  		$salaryerr="";
		}
		else
			{
				$salaryerr="Integer is not valid";
			}
	}




  if (empty($_POST["first_name"])) {
    $studentfirstnameerr = "First Name is required";
  } else {
    $first_name = test_input($_POST["first_name"]);
    $first_name=filter_var($first_name, FILTER_SANITIZE_STRING);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$first_name)) {
      $studentfirstnameerr = "Please put your first name";
    }
  }
  

  if (empty($_POST["last_name"])) {
    $studentlastnameerr = "Last Name is required";
  } else {
    $last_name = test_input($_POST["last_name"]);
    $last_name=filter_var($last_name, FILTER_SANITIZE_STRING);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$last_name)) {
      $studentlastnameerr = "Please put your Last Name ";
    }
  }
  if (empty($_POST["student_email"])) {
    $studentemailerr = "Your Email is required";
  } else {
    $student_email = test_input($_POST["student_email"]);
    $student_email=filter_var($student_email, FILTER_SANITIZE_EMAIL);
    // check if e-mail address is well-formed
    if (!filter_var($student_email, FILTER_VALIDATE_EMAIL)) {
      $studentemailerr = "Invalid email format";
    }
  }


  // if (empty($_POST["gender"])) {
  //   $studentgendererr = " Your Gender is required";
  // } else {
  //   $gender = test_input($_POST["gender"]);
  // }
  


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


$servername =  "localhost";
$username = "root";
$password = "root";
$dbname = "school";


$conn=new mysqli($servername,$username,$password,$dbname);
// check connection
if($conn->connect_error){
  die("Connection failed: " . $conn->connect_error);
} else{
  echo "Connection successful<br>";
}
// $sql="CREATE TABLE students(
// student_ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
// first_name VARCHAR(30) NOT NULL,
// last_name VARCHAR(30) NOT NULL,
// student_email VARCHAR(50),
// gender VARCHAR(50),
// admission_number INT(200),
// reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// )";

// if($conn->query($sql)===TRUE){

//  echo "Students table created<br>";
// }
// else{echo "StaffTable not created".$conn->error."<br>";
// }

// $sql="CREATE TABLE staff(
// id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
// stafffirst_name VARCHAR(30) NOT NULL,
// stafflast_name VARCHAR(30) NOT NULL,
// email VARCHAR(50),
// staffgender VARCHAR(50),
// salary INT(200) NOT NULL,


// if($conn->query($sql)===TRUE){

//  echo "Staff table created<br>";
// }
// else{echo "Staff table not created".$conn->error."<br>";
// }


if ($studentfirstnameerr="Please put your first name" ||
	$studentlastnameerr = "Please put your Last Name" ||$studentemailerr = "Invalid email format" ) {
  # code...
  echo "Student's inputs Invalid<br>";
}else{

$sql = "INSERT INTO students ( first_name, last_name, student_email, gender, admission_number)
VALUES ('$first_name', '$last_name', '$student_email','$gender','$admission_number')";

if ($conn->query($sql) === TRUE) {
  echo "New student record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}


if ($firstnameerr="Please put ypur first name" ||$lastnameerr = "Please put ypur last name" ||$emailerr = "Invalid email format" ) {
  # code...
  echo "Staff's inputs Invalid<br>";
}else{

$sql = "INSERT INTO staff ( stafffirst_name, stafflast_name, email, staffgender, salary)
VALUES ('$stafffirst_name', '$stafflast_name', '$email','$staffgender','$salary')";

if ($conn->query($sql) === TRUE) {
  echo "New staff record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

}



?>