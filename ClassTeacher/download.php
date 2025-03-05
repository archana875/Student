<?php
error_reporting(0);
include '../Includes/dbconn.php';
include '../Includes/session.php';



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image" href="./../image/logo.png">
    <title>Download Attendance</title>
</head>
<body>
<?php include "Includes/topbar.php"; ?>
<div id="content-wrapper" class="attendanceView-container">
      <?php include "Includes/sidebar.php"; ?>
      <div>
      <div>
      <h1 class="Dashboard-name">Download Attendance</h1>
      </div>
      <div class="viweAttendance-card">
      <div>
    <h6 style="color: blue; padding:5px" class="side-text">Download Attendance for a Specific Date</h6>
      </div>
    <form action="downloadRecord.php" method="POST">
        <label for="attendance_date" class="form-control-label">Enter Attendance Date:</label>
        <input type="date" id="attendance_date" name="attendance_date" class="form-control" required><br>
        <input type="submit" value="Download Attendance" class="btn-view">
    </form>
      </div>
      </div>
</div>

</body>
</html>
