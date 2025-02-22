<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./../css/style.css">
  <link rel="stylesheet" href="./../css/teacher.css">
</head>
<body>
<div id="wrapper">
    <?php include "Includes/topbar.php"; ?>
    <!-- Sidebar -->

    <!-- Sidebar -->
    <div id="content-wrapper" class="attendanceView-container">
      <?php include "Includes/sidebar.php"; ?>

      <div id="content">
        <div class="">
          <h1 class="Dashboard-name">Take Attendance (Today's Date : <?php echo $todaysDate = date("d-m-Y");?>)</h1>
        </div>
        <div class="viweAttendance-card">
        <form method="post">
        <div>
            <h6 style="color: blue; padding:5px" class="side-text">All Student in Class</h6>
            
          </div>
                <div >
                  <table  class="table">
                    <thead class="thead-light">
                      <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Other Name</th>
                        <th>Admission No</th>
                        <th>Class</th>
                        <th>Class Arm</th>
                        <th>Check</th>
                      </tr>
                    </thead>
                  </table> 
                    <tbody>
       

</body>
</html>