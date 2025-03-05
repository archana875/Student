<?php
error_reporting(0);
include '../Includes/dbconn.php';
include '../Includes/session.php';

if (isset($_POST['save'])) {

  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $email = $_POST['email'];
  $phoneNo = $_POST['phoneNo'];
  $password = $password['password'];
  $className = $_POST['className'];

  $query = mysqli_query($conn, "INSERT INTO teacher (firstName,lastName,email,phoneNo,password,className) VALUES ('$firstName','$lastName','$email','$phoneNo','$password','$className')");
  
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image" href="./../image/logo.png">
  <title>AMS-Dashboard</title>
  <link rel="stylesheet" href="./../css/login.css">
  <link rel="stylesheet" href="./../css/teacher.css">
  <link rel="stylesheet" href="./../css/admin.css">
</head>

<body>
  <div>
    <?php include "./topbar.php"; ?>

    <div class="attendanceView-container">
      <?php include "./sidebar.php"; ?>

      <div>

        <div class="Dashboard-name">
          <h1>Create Class Teachers</h1>

        </div>


        <div class="viweAttendance-card">
          <div>
            <h6 style="color: blue; padding:5px;" class="side-text">Create Class Teachers</h6>

          </div>
          <div class="card-body">
            <form id="teacherForm" method="post" action="">
              <div style="display: flex;">
              <div>
              <label class="form-control-label">First Name &nbsp;&nbsp;:</label>
              <input type="text" class="form-control" name="firstName"><br><br>
              <label class="form-control-label">Last Name &nbsp;&nbsp;:</label>
              <input type="text" class="form-control" name="lastName"><br><br>
              <label class="form-control-label">Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
              <input type="email" class="form-control" name="email"><br><br>
              </div>
              <div style=" margin-left:50px;">
              <label class="form-control-label">Phone No&nbsp;&nbsp;&nbsp;:</label>
              <input type="text" class="form-control" name="phoneNo"><br><br>
              <label class="form-control-label">Password:</label>
              <input type="password" name="password" class="form-control"><br><br>
              <label class="form-control-label">Class Name:</label>
              <input type="text" class="form-control" name="className"><br><br>
              </div>
              </div>
              <button type="submit" class="btn-view" name="save">Save</button>
            </form>
          </div>

          <div>
            <div>
              <h6 style="color: blue; padding:5px" class="side-text">All Class Teachers</h6>
            </div>
            <div>
              <table id="teacherTable" class="table">
                <thead class="thead-light">
                  <tr>
                    <th>Number</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone No</th>
                    <th>Class Name</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                      $query = "SELECT * FROM teacher";
                      $rs = $conn->query($query);
                      $num = $rs->num_rows;
                      $sn=0;
                      $status="";
                      if($num > 0)
                      { 
                        while ($rows = $rs->fetch_assoc())
                          {
                             $sn = $sn + 1;
                            echo"
                              <tr>
                                <td>".$sn."</td>
                                <td>".$rows['firstName']."</td>
                                <td>".$rows['lastName']."</td>
                                <td>".$rows['email']."</td>
                                <td>".$rows['phoneNo']."</td>
                                <td>".$rows['className']."</td>
                                <td><a href='?action=delete&Id=".$rows['Id']."&classArmId=".$rows['classArmId']."'><i class='fas fa-fw fa-trash'></i></a></td>
                              </tr>";
                          }
                      }
                      else
                      {
                           echo   
                           "<div class='alert alert-danger' role='alert'>
                            No Record Found!
                            </div>";
                      }
                      
                      ?>
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>
    </div>

   

</body>

</html>