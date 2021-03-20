<?php include "connection.php"?>
<?php
$sql="SELECT student_ID, first_name, last_name, student_email, gender, admission_number, reg_date, passport FROM students";
$result = $conn->query($sql);

?>	
<!DOCTYPE html>
<html>
<head>
	<title>student details</title>

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
<p style="font-size: 3rem;font-weight: bold;text-align: center;">list of students and details</p>
<div class="container">
		<table class="table table-dark table-hover">
    <thead>
      <tr>
      	<th>#</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Gender</th>
        <th>admissionnumber</th>
        <th>Reg Date</th>
          <th>photo</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
    <?php 
    while($row =$result->fetch_assoc()):
    ?>
      <tr>
      	<th><?php echo $row['student_ID']; ?></th>
        <td><?php echo $row['first_name']; ?></td>
        <td><?php echo $row['last_name'] ;?></td>
        <td><?php echo $row['student_email']; ?></td>
        <td><?php echo $row['gender']; ?></td>
        <td><?php echo $row['admission_number']; ?></td>
<td><?php echo $row['reg_date']; ?></td>

         <td>
        <?php echo "<img src='studentspassportphotos/" . $row['passport'] . "'style='width:100px; height:100px;'>" 
        ?>
        </td>
         <td>
        <a href="studentupdateform.php?edit=<?php echo $row['student_ID'];  ?>" type="button" value="edit" name="edit" class="btn btn-warning">Edit</a>
        <a href="studentlist.php?delete=<?php echo $row['student_ID']; ?>" class="btn btn-danger" type="button" name="delete">Delete</a>
        </td>

      </tr>
     <?php
 		endwhile;
     ?> 


        <?php 
        if (isset($_GET['delete'])) {
          # code...
          $student_ID=$_GET['delete'];
          $sql="DELETE FROM students WHERE student_ID=$student_ID";
          $conn->query($sql) or die($conn->error);

          echo "deleted";
          header('Location: studentcrud.php');

        } 

         ?>

    </tbody>
  </table>
</div>


</div>

</body>
</html>