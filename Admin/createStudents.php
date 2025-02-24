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
            <form id="studentForm">
            <label for="number" class="form-control-label">Number:</label>
            <input type="text" id="number" class="form-control"  required><br><br>
            <label for="firstname" class="form-control-label">First Name:</label>
        <input type="text" id="firstname" class="form-control" required><br><br>

        <label for="lastname" class="form-control-label">Last Name:</label>
        <input type="text" id="lastname" class="form-control" required><br><br>

        <label for="admissionNo" class="form-control-label">Admission No:</label>
        <input type="text" id="admissionNo" class="form-control" required><br><br>

        <label for="class" class="form-control-label">Class:</label>
        <input type="text" id="class" class="form-control"  required><br><br>

        <button type="submit" class="btn-view">Add Student</button>
            </form>
          </div>
        

        <!-- Input Group -->
        
            <div class="viweAttendance-card">
              <div >
                <h6 style="color: blue; padding:5px" class="side-text">All Student</h6>
              </div>
              <div >
                <table class="table " id="studentTable">
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

                  <tbody></tbody>
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
  

    

  
  </table>



  <script>
        document.addEventListener('DOMContentLoaded', () => {
            const studentForm = document.getElementById('studentForm');
            const studentTable = document.getElementById('studentTable').getElementsByTagName('tbody')[0];

            const loadStudents = () => {
                studentTable.innerHTML = '';
                const students = JSON.parse(localStorage.getItem('students')) || [];
                students.forEach((student, index) => {
                    const row = studentTable.insertRow();
                    row.insertCell(0).innerText = student.number;
                    row.insertCell(1).innerText = student.firstname;
                    row.insertCell(2).innerText = student.lastname;
                    row.insertCell(3).innerText = student.admissionNo;
                    row.insertCell(4).innerText = student.class;
                    const actionsCell = row.insertCell(5);
                    const deleteButton = document.createElement('button');
                    deleteButton.innerText = 'Delete';
                    deleteButton.onclick = () => deleteStudent(index);
                    actionsCell.appendChild(deleteButton);
                });
            };

            const deleteStudent = (index) => {
                const students = JSON.parse(localStorage.getItem('students')) || [];
                students.splice(index, 1);
                localStorage.setItem('students', JSON.stringify(students));
                loadStudents();
            };

            studentForm.addEventListener('submit', (event) => {
                event.preventDefault();
                const students = JSON.parse(localStorage.getItem('students')) || [];
                const newStudent = {
                    number: studentForm.number.value,
                    firstname: studentForm.firstname.value,
                    lastname: studentForm.lastname.value,
                    admissionNo: studentForm.admissionNo.value,
                    class: studentForm.class.value
                };
                students.push(newStudent);
                localStorage.setItem('students', JSON.stringify(students));
                loadStudents();
                studentForm.reset();
            });

            loadStudents();
        });
    </script>
</body>

</html>