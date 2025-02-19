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
  <link rel="stylesheet" href="./../css/style.css">
</head>

<body>
  <div id="wrapper">
    <!-- Sidebar -->
    <?php include "./topbar.php"; ?>
    <div id="content" class="attendanceView-container">
      <?php include "./sidebar.php"; ?>
      <!-- Sidebar -->

      <div class="container-fluid" id="container-wrapper">
        <div class="Dashboard-name">
          <h1>Create Class</h1>

        </div>


        <div class="viweAttendance-card">
          <div>
            <h6 style="color: blue; padding:5px" class="side-text">Create Class</h6>
            <?php echo $statusMsg; ?>
          </div>
          <div class="card-body">
            <form method="post" id="classForm" >
              <div class="form-group row mb-3">
                <div>
                  <label class="form-control-label">Class Name:</label>
                  <input type="text" class="form-control" name="className" value="<?php echo $row['className']; ?>" id="className" placeholder="Class Name"><br /><br />
                  <label class="form-control-label">Teacher Name:</label>
                  <input type="text" class="form-control" id="teacherName" name="teacherName" required placeholder="Teacher Name">
                </div>
              </div>
              <button type="button" id="saveButton" class="btn-view">Save</button>
            </form>
          </div>
        </div>


        <div class="viweAttendance-card">
          <div>
            <h6 style="color: blue; padding:5px" class="side-text">All Classes</h6>
          </div>
          <div>
            <table class="table " id="classTable">
              <thead class="thead-light">
                <tr>
                  <th>#</th>
                  <th>Class Name</th>
                  <th>Teacher Name</th>
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

  <script>
    document.getElementById('saveButton').addEventListener('click', function() {
      // Get form inputs
      const className = document.getElementById('className').value;
      const teacherName = document.getElementById('teacherName').value;

      // Create a new row for the class table
      const classTable = document.getElementById('classTable').getElementsByTagName('tbody')[0];
      const newRow = classTable.insertRow();

      // Add class name to the new row
      const classNameCell = newRow.insertCell(0);
      classNameCell.textContent = className;

      // Add teacher name to the new row
      const teacherNameCell = newRow.insertCell(1);
      teacherNameCell.textContent = teacherName;

      // Reset form
      document.getElementById('classForm').reset();
    });
  </script>
</body>

</html>