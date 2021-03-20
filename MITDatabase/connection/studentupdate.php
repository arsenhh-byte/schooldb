<?php

$servername="localhost";
$username="root";
$password="root";
$dbname="school";

$conn=new mysqli($servername,$username,$password,$dbname);
// check connection
if($conn->connect_error){
  die("Connection failed: " . $conn->connect_error);
} else{
  echo "Connection successful<br>";
}


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
$idn="";
$id=0;
$passport="";

if (isset($_GET['edit'])) {
	# code...
	$id= $_GET['edit'];
	// pull requested code

	$sql="SELECT * FROM students WHERE id=$id ";
	$result=$conn->query($sql) or die($conn->error);

	$row=$result->fetch_assoc(); 
	$first_name=$row["first_name"];
	$last_name=$row["last_name"];
	$student_email=$row["student_email"];
	$gender=$row["gender"];
	$admission_number=$row["admission_number"];
	$passport=$row["passport"];

}

if (isset($_POST['update']))  {
	# code...
	$id = $_POST['id'];

	if (empty($_POST["first_name"])) {
		# code...
		$studentfirstnameerr="You're firstname required";
	}else{
		$first_name=$_POST["first_name"];
		$first_name=filter_var($first_name, FILTER_SANITIZE_STRING);
		// check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$first_name)) {
      $studentfirstnameerr = "You're first name is required";
    }
	}


	if (empty($_POST["last_name"])) {
		# code...
		$studentlastnameerr="You're lastname required";
	}else{
		$last_name=$_POST["last_name"];
		$last_name=filter_var($last_name, FILTER_SANITIZE_STRING);
		// check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$last_name)) {
      $studentlastnameerr = "You,re last name is required";
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

	if (empty($_POST["gender"])) {
		# code...
		$studentgendererr="You're gender is required";
	}else{
		$gender=$_POST["gender"];
	}


	if (empty($_POST["admission_number"])) {
		# code...
		$admissionnumbererr="student's admissionnumber is required";
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
	# code...	# code...
		 $sql ="UPDATE students SET first_name='$first_name', last_name='$last_name',
 		 student_email ='$student_email', gender='$gender',
 		  admission_number='$admission_number',passport='$passport'  WHERE id='$id'";

  		$a=$conn->query($sql) or die($conn->error);
  		if ($a===TRUE) {
  			# code...
  			echo "update successful";
  			header('Location:studentlist.php');
	
  		}
	}
	
	else{echo "please input valid details";}



}


?>