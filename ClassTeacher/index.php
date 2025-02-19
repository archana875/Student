<?php
include '../Includes/dbconn.php';
include '../Includes/session.php';

?>

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
    <?php include "Includes/topbar.php"; ?>


    <div class="dash-container">
        <div>
            <?php include "Includes/sidebar.php"; ?>
        </div>
        <div class="full-page-container">

            <h1 class="Dashboard-name">Class Teacher Dashboard </h1>

            <div style="display: flex;">
                <div>
                    <div class="dashboard-card">
                        <?php
                        $query1 = mysqli_query($conn, "SELECT * from tblstudents where classId = '$_SESSION[classId]' and classArmId = '$_SESSION[classArmId]'");
                        $students = mysqli_num_rows($query1);
                        ?>
                        <div class="font">Students</div>
                        <div class="font">
                            <?php echo $students; ?>
                        </div>
                        <div>
                            <i class="fas fa-users fa-2x text-info dash-icon">S</i>
                        </div>
                    </div>
                    <div class="dashboard-card">
                        <?php
                        $query1 = mysqli_query($conn, "SELECT * from tblclass");
                        $class = mysqli_num_rows($query1);
                        ?>
                        <div class="font">Classes</div>
                        <div class="font">
                            <?php echo $class; ?>
                        </div>
                        <div>
                            <i class="fas fa-chalkboard fa-2x text-primary dash-icon">S</i>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="dashboard-card">
                        <?php
                        $query1 = mysqli_query($conn, "SELECT * from tblclassarms");
                        $classArms = mysqli_num_rows($query1);
                        ?>
                        <div class="font">Class Arms</div>
                        <div class="font">
                            <?php echo $classArms; ?>
                        </div>
                        <div>
                            <i class="fas fa-code-branch fa-2x text-success dash-icon">S</i>
                        </div>
                    </div>
                    <div class="dashboard-card">
                        <?php
                        $query1 = mysqli_query($conn, "SELECT * from tblattendance where classId = '$_SESSION[classId]' and classArmId = '$_SESSION[classArmId]'");
                        $totAttendance = mysqli_num_rows($query1);
                        ?>
                        <div class="font">Total Student Attendance</div>
                        <div class="font">
                            <?php echo $totAttendance; ?>
                        </div>
                        <div>
                            <i class="fas fa-calendar fa-2x text-warning dash-icon">S</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>