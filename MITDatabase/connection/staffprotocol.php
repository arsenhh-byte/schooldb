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

$iderr='';
$id='';
$em='';
$stmt='';
$passport='';
$empid='';

if (isset($_POST["save"])) {
	# code...
	if (empty($_POST["stafffirst_name"])) {
		# code...
		$stafffirstnameerr="you're firstname required";
	}else{
		$stafffirst_name=$_POST["stafffirst_name"];
		$stafffirst_name=filter_var($stafffirst_name, FILTER_SANITIZE_STRING);
		// check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$firstname)) {
      $stafffirstnameerr = "You're firstname is required";
    }
	}


	if (empty($_POST["stafflast_name"])) {
		# code...
		$stafflastnameerr="you're lastname required";
	}else{
		$stafflastnameerr=$_POST["stafflast_name"];
		$stafflastnameerr=filter_var($stafflast_name, FILTER_SANITIZE_STRING);
		// check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$stafflast_name)) {
      $stafflast_name = "You're lastname is required";
    }
	}


	if (empty($_POST["email"])){
		# code...
		$emailerr="You're email is required";
	}else{
		$email=$_POST["email"];
		$email=filter_var($email, FILTER_SANITIZE_EMAIL);
    // Validate e-mail
		if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
 			$em="valid email" ;
		} else {
  			 $emailerr ="Please put a valid email address";
				}
	}

	if (empty($_POST["id"])) {
		# code...
		$employeeidErr=" ID is required";
	}else{
		$id=$_POST["id"];
		$id=filter_var($id, FILTER_SANITIZE_NUMBER_INT);
		// validate integers
		if (filter_var($id, FILTER_VALIDATE_INT) === 0 || !filter_var($id, FILTER_VALIDATE_INT) === false) {
  		$empid="ID is valid";
			} else {
  			$iderr="ID is invalid";
			}
	}


	if (empty($_POST["staffgender"])) {
		# code...
		$staffgendererr="you're gender is required";
	}else{
		$staffgender=$_POST["staffgender"];
	}


	
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


	//captures users input
	$passport = $_FILES['passport']['name'];
	 # code...
    // this variable is for the path of the image storage
    $target = "staffpassportphotos/" .basename($_FILES['passport']['name']);	
    $temp=$_FILES['passport']['tmp_name'];
    move_uploaded_file($temp,$target);





      if (empty($stafffirstnameerr) && empty($stafflastnameerr) && empty($emailerr) && empty($iderr) && empty($salaryErr)) {
  //     	# code...
  //     	$sql = "INSERT INTO staff ( stafffirst_name, stafflast_name, email,  salary)
		// VALUES ('$stafffirst_name', '$stafflast_name', '$email',  '$salary')";
		$stmt = $conn->prepare("INSERT INTO staff (stafffirst_name, stafflast_name, email, salary, passport) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssis", $stafffirst_name, $stafflast_name, $email,$salary, $passport);
		// set parameters and execute

		 $stafffirst_name=$stafffirst_name;
		 $stafflast_name=$stafflast_name;
		 $email=$email;
		 $salary=$salary;
		 $passport=$passport;
		 
		 $stmt->execute();
		 echo "new record successfully created";
		 $stmt->close();
		 $conn->close();
	 //  if ($conn->query($sql) === TRUE) {
		//  	 echo "New staff record created successfully";
		// } else {
  // 		echo "Error: " . $sql . "<br>" . $conn->error;
		// }

      }else{echo "Please put valid credentials";}




}





?>