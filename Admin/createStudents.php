<?php
error_reporting(0);
include '../Includes/dbconn.php';
include '../Includes/session.php';

if (isset($_POST['save'])) {

  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $admissionNo = $_POST['admissionNo'];
  $className = $_POST['className'];

  $query = mysqli_query($conn, "INSERT INTO student(firstName,lastName,admissionNo,className) VALUES ('$firstName','$lastName','$admissionNo','$className')");
  
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
  <link rel="stylesheet" href="./../css/style.css">

</head>

</head>

<body>
  <?php include "./topbar.php"; ?>
  <div id="wrapper" class="dash-container">
    <div id="content-wrapper" class="dash-container">
      <div id="content" class="attendanceView-container">
        <?php include "./sidebar.php"; ?>
        <div class="container-fluid" id="container-wrapper">



          <div class="Dashboard-name">
            <h1>Create Students</h1>
            <?php echo $statusMsg; ?>
          </div>

          <div class="viweAttendance-card">
          <div>
            <h6 style="color: blue; padding:5px;" class="side-text">Create Students</h6>
          </div>
            <form method="POST" action="">
            <div style="display: flex;">
            <div>
              <label for="firstName" class="form-control-label">First Name:<input type="text" name="firstName" required class="form-control"><br><br>
              <label for="lastName" class="form-control-label">Last Name:<input type="text" name="lastName" required class="form-control"><br><br>
              </div>
              <div style=" margin-left:50px;">
              <label for="admissionNo" class="form-control-label">Admission No:<input type="text" name="admissionNo" required class="form-control"><br><br>
              <label for="ClassName" class="form-control-label">Class Name:<input type="text" name="className" required class="form-control"><br><br>
              </div>
              </div>
              <input type="submit" name="save" value="Submit" class="btn-view">
            </form>
          


          <!-- Input Group -->

          <div >
            <div>
              <h6 style="color: blue; padding:5px" class="side-text">All Student</h6>
            </div>
            <div>
              <table class="table ">
                <thead class="thead-light">
                  <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Admission No</th>
                    <th>Class</th>

                    <th>Delete</th>
                  </tr>
                </thead>

                <tbody >
                <?php
                      $query = "SELECT * FROM student";
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
                                <td>".$rows['admissionNo']."</td>
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
    </div>

  </div>
  </div>
  <!---Container Fluid-->
  </div>

  </div>
  </div>





</body>

</html>