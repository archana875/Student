<?php
error_reporting(0);
include '../Includes/dbcon.php';
include '../Includes/session.php';



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Dashboard</title>
  <link rel="stylesheet" href="./../css/style.css">
  <link rel="stylesheet" href="./../css/teacher.css">
</head>

<body id="page-top">
  <div id="wrapper">
    <?php include "Includes/topbar.php"; ?>
    <!-- Sidebar -->

    <!-- Sidebar -->
    <div id="content-wrapper" class="attendanceView-container">
      <?php include "Includes/sidebar.php"; ?>
      <div id="content">
        <div class="">
          <h1 class="Dashboard-name">View Class Attendance</h1>
        </div>
        <!-- Form Basic -->
        <div class="viweAttendance-card">
          <div>
            <h6 style="color: blue; padding:5px" class="side-text">View Class Attendance</h6>
            <?php echo $statusMsg; ?>
          </div>
          <form method="post">
            <div>
              <label class="form-control-label">Select Date<span class="text-danger ml-2">*</span></label>
              <input type="date" class="form-control" name="dateTaken" id="exampleInputFirstName">
            </div>
            <button type="submit" name="view" class="btn-view">View Attendance</button>
          </form>
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

 
  <script>
    $(document).ready(function() {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
</body>

</html>