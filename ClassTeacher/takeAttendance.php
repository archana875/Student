<?php 
error_reporting(0);
include '../Includes/dbconn.php';
include '../Includes/session.php';

    $query = "SELECT * FROM student";
    $rs = $conn->query($query);
    $num = $rs->num_rows;
    $rrw = $rs->fetch_assoc();

if(isset($_POST['save'])){
    
    $admissionNo=$_POST['admissionNo'];

    $check=$_POST['check'];
    $N = count($admissionNo);
    $status = "";


//check if the attendance has not been taken i.e if no record has a status of 1
  $query=mysqli_query($conn,"select * from attendance  where classId = '$_SESSION[classId]' and  dateTimeTaken='$dateTaken' and status = '1'");
  $count = mysqli_num_rows($query);

  if($count > 0){

      $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>Attendance has been taken for today!</div>";

  }

    else //update the status to 1 for the checkboxes checked
    {

        for($i = 0; $i < $N; $i++)
        {
                $admissionNo[$i]; //admission Number

                if(isset($check[$i])) //the checked checkboxes
                {
                      $qquery=mysqli_query($conn,"update attendance set status='1' where admissionNo = '$check[$i]'");

                      if ($qquery) {

                          $statusMsg = "<div class='alert alert-success'  style='margin-right:700px;'>Attendance Taken Successfully!</div>";
                      }
                      else
                      {
                          $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!</div>";
                      }
                  
                }
          }
      }

   

}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image" href="./../image/logo.png">
    <title>AMS-Dashboard</title>
    <link rel="stylesheet" href="./../css/style.css">
    <link rel="stylesheet" href="./../css/teacher.css">
</head>

<body>
    <div id="wrapper">
        <?php include "Includes/topbar.php"; ?>
        <div id="content-wrapper" class="attendanceView-container">
            <?php include "Includes/sidebar.php"; ?>

            <div>
                <div>
                    <h1 class="Dashboard-name">Take Attendance (Today's Date : <?php echo $todaysDate = date("d-m-Y"); ?>)</h1>
                </div>
                <div class="viweAttendance-card">
                <form method="post">
                    <div>
                        <h6 style="color: blue; padding:5px" class="side-text">All Student in Class</h6>
                    </div>
                    <table class="table" >
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Admission No</th>
                                    <th>Class</th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php
                      $query = "SELECT * FROM student ";
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
                                <td><input name='check[]' type='checkbox' value=".$rows['admissionNo']." class='form-control'></td>
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
                    <button type="submit" name="save" class="btn-view">Take Attendance</button>
                </form>
                </div>
            </div>
        </div>
    </div>



</body>

</html>