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

  <script>
    function typeDropDown(str) {
      if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
      } else {
        if (window.XMLHttpRequest) {
          // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp = new XMLHttpRequest();
        } else {
          // code for IE6, IE5
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("txtHint").innerHTML = this.responseText;
          }
        };
        xmlhttp.open("GET", "ajaxCallTypes.php?tid=" + str, true);
        xmlhttp.send();
      }
    }
  </script>

</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <?php include "Includes/topbar.php"; ?>
    <div id="content-wrapper" class="attendanceView-container">
      <?php include "Includes/sidebar.php"; ?>


      <div id="content">
        <div class="container-fluid" id="container-wrapper">
          <div>
            <h1 class="Dashboard-name">View Student Attendance</h1>
          </div>

          <div class="viweAttendance-card">
            <div>
              <h6 style="color: blue; padding:5px" class="side-text">View Student Attendance</h6>
              <?php echo $statusMsg; ?>
            </div>
            <form method="post">
              <div>
                <label class="form-control-label">Select Student<span class="text-danger ">*</span></label>
                <input class="form-control" placeholder="--Select Student--" /><br>
                <button type="submit" name="view" class="btn-view">View Attendance</button>
                <?php
                $qry = "SELECT * FROM tblstudents where classId = '$_SESSION[classId]' and classArmId = '$_SESSION[classArmId]' ORDER BY firstName ASC";
                $result = $conn->query($qry);
                $num = $result->num_rows;
                if ($num > 0) {
                  echo ' <select required name="admissionNumber" class="form-control mb-3">';
                  echo '<option value="">--Select Student--</option>';
                  while ($rows = $result->fetch_assoc()) {
                    echo '<option value="' . $rows['admissionNumber'] . '" >' . $rows['firstName'] . ' ' . $rows['lastName'] . '</option>';
                  }
                  echo '</select>';
                }
                ?>
              </div>
          </div>
          <?php
          echo "<div id='txtHint'></div>";
          ?>

          </form>
        </div>
      </div>

      <!-- Input Group -->


      <div class="viweAttendance-card">
        <div>
          <h6 style="color: blue; padding:5px" class="side-text">Class Attendance</h6>
        </div>
        <div class="">
          <table id="dataTableHover" class="table">
            <thead class="thead-light">
              <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Admission No</th>
                <th>Class</th>
                <th>Term</th>
                <th>Status</th>
                <th>Date</th>
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
  <!---Container Fluid-->
  </div>

  </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


  <script>
    $(document).ready(function() {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
</body>

</html>