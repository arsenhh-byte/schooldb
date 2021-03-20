<?php
// create a connection to the database 
 
$servername =  "localhost";
$username = "root";
$password = "root";
$dbname = "school";


//use mysqli extension to connect to db 
$conn = new mysqli($servername,$username,$password,$dbname);

// 


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

$adm="";
$em="";
$stmt="";
$passport="";


if (isset($_POST["save"])) {
	# code...
	if (empty($_POST["first_name"])) {
		# code...
		$studentfirstnameerr="You're firstname is required";
	}else{
		$first_name=$_POST["first_name"];
		$first_name=filter_var($first_name, FILTER_SANITIZE_STRING);
		// check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$first_name)) {
      $studentfirstnameerr = "please enter you're first name ";
    }
	}


	if (empty($_POST["last_name"])) {
		# code...
		$studentlastnameerr="You're lastname is required";
	}else{
		$last_name=$_POST["last_name"];
		$last_name=filter_var($last_name, FILTER_SANITIZE_STRING);
		// check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$last_name)) {
      $studentlastnameerr = "You're last name is required";
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


	if (empty($_POST["admission_number"])) {
		# code...
		$admissionnumbererr="You're admission_number is required";
	}else{
		$admission_number=$_POST["admission_number"];
		$admission_number=filter_var($admission_number, FILTER_SANITIZE_NUMBER_INT);
		// validate integer
		if (filter_var($admission_number, FILTER_VALIDATE_INT) === 0 || !filter_var($admission_number, FILTER_VALIDATE_INT) === false) {
  		$adm="admission_number is valid";
			} else {
  			$admissionnumbererr="admission_number is invalid";
			}
	}

	//captures users input
	$passport = $_FILES['passport']['name'];
	 # code...
    // this variable is for the path of the image storage
    $target = "studentspassportphotos/" .basename($_FILES['passport']['name']);	
    $temp=$_FILES['passport']['tmp_name'];
    move_uploaded_file($temp,$target);



if (empty($studentfirstnameerr)&& empty($studentlastnameerr) && empty($studentemailerr) && empty($studentgendererr) && empty($admissionnumbererr)) {
	# code...
	$stmt = $conn->prepare("INSERT INTO students (first_name, last_name, student_email, gender, admission_number, passport) VALUES (?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("ssssis", $first_name, $last_name, $student_email, $gender, $admission_number, $passport);

	// set parameters and execute

		 $first_name=$first_name;
		 $last_name=$last_name;
		 $student_email=$student_email;
		 $gender=$gender;
		 $admission_number=$admission_number;
		 $passport=$passport;

		 $stmt->execute();
		 echo "new student record successfully created";
		 $stmt->close();

// $sql = "INSERT INTO students ( first_name, last_name, student_email, gender,admission_number)
// VALUES ('$first_name', '$last_name', '$student_email','$gender','$admission_number')";

// if ($conn->query($sql) === TRUE) {
//   echo "New student record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }


}else{echo "please input valid details";}



}



?>