<?php
error_reporting(0);
include '../Includes/dbcon.php';
include '../Includes/session.php';



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./../css/login.css">
  <link rel="stylesheet" href="./../css/teacher.css">
  <link rel="stylesheet" href="./../css/admin.css">
  
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
            <form method="post">
              <div class="form-group">
                <div >
                  <label class="form-control-label">Firstname:</label>
                  <input type="text" class="form-control" name="firstName" value="<?php echo $row['firstName']; ?>" id="exampleInputFirstName">
                </div>
                <div class="form-group">
                  <div class="col-xl-6">
                    <label class="form-control-label">Lastname:</label>
                    <input type="text" class="form-control" name="lastName" value="<?php echo $row['lastName']; ?>" id="exampleInputFirstName">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-xl-6">
                  <label class="form-control-label">Admission Number:</label>
                  <input type="text" class="form-control" required name="admissionNumber" value="<?php echo $row['admissionNumber']; ?>" id="exampleInputFirstName">
                </div>
              </div>
              <div class="form-group " style="padding-bottom: 15px;">
                <div class="col-xl-6">
                  <label class="form-control-label">Select Class:</label>
                  <input type="text" class="form-control" required name="admissionNumber">
                  
                </div>
              </div>
              <button type="button" id="saveButton" class="btn-view">Save</button>
            </form>
          </div>
        

        <!-- Input Group -->
        
            <div class="viweAttendance-card">
              <div >
                <h6 style="color: blue; padding:5px" class="side-text">All Student</h6>
              </div>
              <div >
                <table class="table " id="dataTableHover">
                  <thead class="thead-light">
                    <tr>
                      <th>#</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Admission No</th>
                      <th>Class</th>
                      <th>Date Created</th>
                      <th>Delete</th>
                    </tr>
                  </thead>

                  <tbody>

                    
                  </tbody>
                </table>
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

  


  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function() {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
</body>

</html>