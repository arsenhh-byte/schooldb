<?php require 'studentupdate.php' ?>
<!DOCTYPE html>
<html>
<head>
	
<link rel="stylesheet" type="text/css" href="css/style.css">

<meta charset="utf-8">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</head>


<div class="container container-fluid">
  


<div class="jumbotron">
  
  <img src="images/students.jpeg">

</div>
</div>


<body>
  <div class="container container-fluid">
  <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
  <caption><h2>STUDENTS' FORM</h2></caption>
  <div class="row">
  <div class="col-6">  
  <input type="hidden" name="id" value="<?php echo $id; ?>">
    </div>
  </div>
  <div class="row">
    <div class="col-6">
      <div class="form-group padding">
          <label for="First Name"><strong>First Name:</strong></label>
           <input type="text" name="first_name" value="<?php echo $first_name;?>" class="form-control border-gradient"  placeholder="Please Enter your first name" id="studentname">
          <span class="error"> <?php echo $first_nameerr;?></span> 
          <br><br>
       </div>
      </div>
      <div class="col-6">
       <div class="form-group padding">
          <label for="Last Name"><strong>Last Name:</strong></label>
           <input type="text" name="last_name" value="<?php echo $last_name;?>" class="form-control border-gradient"  placeholder="Please enter your last name" id="studentlastname">
          <span class="error"> <?php echo $lastnameerr;?></span>
          <br><br>
       </div>
      </div>
    </div>
    <div class="row">
    <div class="col-6">
       <div class="form-group padding">
          <label for="studentemail"><strong>email Address:</strong></label>
          <input type="text" name="student_email" value="<?php echo $student_email;?>" class="form-control border-gradient"  placeholder="Enter You're email" id="student_email">
          <span class="error"> <?php echo $studentemailerr;?></span>
          <br><br>
        </div>
      </div>
     <!--  <div class="col-6">
        <div class="custom-control custom-checkbox mb-3">
            <input type="checkbox" class="custom-control-input" id="customCheck" name="studentgender" <?php if (isset($studentgender) && $studentgender=="male") echo "checked";?> value="male">
            <label class="custom-control-label" for="customCheck">male</label>
         </div>
         <div class="custom-control custom-checkbox mb-3">
            <input type="checkbox" class="custom-control-input" id="customCheck" name="studentgender" <?php if (isset($studentgender) && $studentgender=="female") echo "checked";?> value="female">
            <label class="custom-control-label" for="customCheck">Female</label>
            <span class="error"> <?php echo "<br>".$studentgenderErr;?></span>
         </div>
       </div> -->



 <div class="col-sm-6">
        <label for="uname">Gender:</label>
        <input type="text" class="form-control" id="gender" placeholder="male, female , prefer not to say" name="staffgender"
        
   value=<?php echo""?>> </div>
   





       <!-- </div>  -->



    <div class="row">
        <div class="col-6">
     
       <div class="form-group padding">
          <label for="admission_number"><strong>Admission number:</strong></label>
           <input type="text" name="admissionnumber" value="<?php echo $admission_number;?>" class="form-control border-gradient" placeholder="Enter You're admission number" id="admission_number" >
           <span class="error"> <?php echo $admissionnumbererr;?></span>
          <br><br>
       </div>
      
    </div>
    <div class="col-6">
      <label><strong>student's passport photo</strong></label>
      <input type="file" class="form-control" name="passport" id="passport"  placeholder="Student's passport photo" required="" value=""><br><br>
      <img src="studentspassportphotos/<?php echo $passport?>" style="height:100px;width: 100px;">
    </div>
   </div>
    <div class="row">
   <div class="col-6">
    <div><input type="submit" name="update" value="update" class="btn btn-lg btn-danger"></div>
   </div>
 </div>
    </div>
  </form>
  
</div>  

</body>
</html>