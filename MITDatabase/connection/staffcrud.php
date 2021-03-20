<?php include "connection.php"?>
<?php
$sql="SELECT id, stafffirst_name, staffflast_name, email, staffgender, passport FROM staff";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
	<title>staff details</title>
	
<link rel="stylesheet" type="text/css" href="css/style.css">

<meta charset="utf-8">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>


</head>
<div class="container container-fluid">
  


<div class="jumbotron">
  
  <img src="images/staff.jpeg">

</div>
</div>
<body>
<p style="font-size: 3rem;font-weight: bold;text-align: center;">Your details</p>
<div class="container">
		<table class="table table-dark table-hover">
    <thead>
      <tr>
      	<th>#</th>
        <th> id</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Gender</th>
        <th>Salary</th>
        <th>photo</th>
        <th colspan="2">Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php 
    while($row =$result->fetch_assoc()):
    ?>
      <tr>
      	<th><?php echo $row['id']; ?></th>
        <td><?php echo $row['stafffirst_name']; ?></td>
        <td><?php echo $row['stafflast_name'] ;?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['staffgender']; ?></td>
        <td><?php echo $row['salary']; ?></td>
        <td><?php echo $row['passport']; ?></td>
        <td>
        <?php echo "<img src='staffpassportphotos/" . $row['passport'] . "'style='width:100px; height:100px;'>" 
        ?>
        </td>
        <td>
      	<a href="staffupdateform.php?edit=<?php echo $row['id'];  ?>" type="button" value="edit" name="edit" class="btn btn-warning">Edit</a>
      	<a href="stafflist.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger" type="button" name="delete">Delete</a>
      	</td>


      </tr>
     <?php
 		endwhile;
     ?> 

     <?php
       //delete 
       if (isset($_GET['delete'])) {
         # code...
          $id = $_GET['delete'];
          //sql query
          $conn->query("DELETE FROM staff where id=$id") or die($conn->error);

          echo "deleted";
          header('Location: staffcrud.php');
       }

    ?>
    </tbody>
  </table>
</div>


</div>

</body>
</html>