
<!DOCTYPE html>
<html>
<head>
	<title>Students FORM</title>


<link rel="stylesheet" type="text/css" href="css/style.css">

<meta charset="utf-8">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

</head>
<body>
    <?php
require 'students.php';
   ?>

<h1 style="text-align: center;">STUDENTS FORM</h1>
	<div class="container container-fluid">
  


<div class="jumbotron">
  
  <img src="images/students.jpeg">

</div>
</div>

    <p>Hi and Welcome</p>
  </div>
    
</div>

<div class="container container-fluid">
	
	<div class="alert alert-success">
      <strong>Please fill in your details below </strong> 
  </div>
</div>

<div class="container container-fluid">
	
	<p>Not a student ... click the button below</p>
<a href="staff.php" target="_blank" class="btn btn-primary" role="button">staff Form</a>
</div>


<?php echo "<br>"; ?>

<div class="container container-fluid">
	

	<form action="Students.php  <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">    
    <div class="row">

<div class="col-sm-6">
        <label for="uname">First Name:</label>
        <input type="text" class="form-control" id="fname" placeholder="please put your first name" name="first_name"value=<?php echo"$first_name"?>>

<span class="error"> <?php echo $studentfirstnameerr;?></span>
          <br><br>

      </div>

      <div class="col-sm-6">
        <label for="uname">Last Name:</label>
        <input type="text" class="form-control" id="lname" placeholder="please put your last name" name="last_name"value=<?php echo"$last_name"?>>

<span class="error"> <?php echo $studentlastnameerr;?></span>
          <br><br>
      </div>

         <div class="col-sm-6">
  <label for="uname">Email:</label>
        <input type="text" class="form-control" id="email" placeholder="please put your email address" name="student_email"value=<?php echo"$email"?>>

        <span class="error"> <?php echo $studentemailerr;?></span>
          <br><br>
        </div>

        <div class="col-sm-6">
        <label for="uname">Gender:</label>
        <input type="text" class="form-control" id="gender" placeholder="male, female , prefer not to say" name="staffgender"
        
   value=<?php echo""?>> </div>
   
         <div class="col-sm-6">
  <label for="uname">Admission Number:</label>
        <input type="text" class="form-control" id="admission" placeholder="please put your Admission Number" name="admission_number"value=<?php echo"$admission_number"?>>
        </div>

     
   
<!--         
        <div class="col-sm-6">
  <label for="uname">Registration Date:</label>
        <input type="Date" class="form-control" id="Reg" placeholder="please choose your Registration Date" name="reg_date"value=<?php echo""?>>
     
</div>
 -->

<?php echo "<br>"; ?>
         

         <div class="col-sm-6" style="margin: 20px width: 550px" ;>
        	<div class="form-group">
        		<input class="btn btn-success btn-block" type="submit" name="save" class="form-control" value="submit" style="width: 550px">
            
        		
        	</div>
        </div>


 <div class="col-sm-6">
        <a href="http://localhost:8888/PROJECTS/MITDatabase/connection/students.php">
          

                <button type="button" class="btn btn-block btn-danger" id="submit" style="width: 550px">Reset</button>
        </a>
         </div>




    
    </form>

</div>

</form>
</div>
</body>
</html>
