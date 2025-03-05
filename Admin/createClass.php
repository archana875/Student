<?php
error_reporting(0);
include '../Includes/dbconn.php';
include '../Includes/session.php';

if (isset($_POST['save'])){
  $className = $_POST['className'];
  $query=mysqli_query($conn,"INSERT INTO class(className) VALUES ('$className')");
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
</head>

<body>
  <div>
    <?php include "./topbar.php"; ?>
    <div  class="attendanceView-container">
      <?php include "./sidebar.php"; ?>
      <div>
        <div class="Dashboard-name">
          <h1>Create Class</h1>
        </div>
        <div class="viweAttendance-card">
          <div>
            <h6 style="color: blue; padding:5px;" class="side-text">Create Class</h6>
          </div>
          <div class="card-body">
            <form method="post" action="">
              <label for="className" class="form-control-label">Class Name&nbsp;&nbsp;&nbsp;&nbsp;:</label>
              <input type="text" name="className" class="form-control" required><br><br>
              <button type="submit" class="btn-view" name="save">Save</button>
            </form>
          </div>
        
        <div>
          <div>
            <h6 style="color: blue; padding:5px" class="side-text">All Classes</h6>
          </div>
          <div>
            <table class="table " id="studentTable">
              <thead class="thead-light">
                <tr>
                  <th>#</th>
                  <th>Class Name</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody >
              <?php
                      $query = "SELECT * FROM class";
                      $rs = $conn->query($query);
                      $num = $rs->num_rows;
                      $sn=0;
                      if($num > 0)
                      { 
                        while ($rows = $rs->fetch_assoc())
                          {
                             $sn = $sn + 1;
                            echo"
                              <tr>
                                <td>".$sn."</td>
                                <td>".$rows['className']."</td>
                                <td><a href='?action=delete&Id=".$rows['Id']."'><i class='fas fa-fw fa-trash'></i>Delete</a></td>
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

 
</body>

</html>