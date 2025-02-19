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
</head>

<body>
    <?php include "./topbar.php"; ?>
    <div class="dash-container">
        <div>
            <?php include "./sidebar.php"; ?>
        </div>
        <div class="full-page-container">

            <h1 class="Dashboard-name">Administrator Dashboard
            </h1>
            <div style="display: flex;">

                <div>
                    <div class="dashboard-card">
                        <?php
                        $query1 = mysqli_query($conn, "SELECT * from tblstudents");
                        $students = mysqli_num_rows($query1);
                        ?>
                        <div class="font">Students</div>
                        <div class="font">
                            <?php echo $students; ?>
                        </div>
                        <div>
                            <i class="fas fa-users fa-2x text-info"></i>
                        </div>
                    </div>
                    <div class="dashboard-card">
                        <?php
                        $query1 = mysqli_query($conn,"SELECT * from tblclass");
                        $class = mysqli_num_rows($query1);
                        ?>
                        <div class="font">Classes</div>
                        <div class="font">
                            <?php echo $class; ?>
                        </div>
                        <div>
                            <i class="fas fa-chalkboard fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="dashboard-card">
                        <?php
                        $query1 = mysqli_query($conn, "SELECT * from tblclassteacher");
                        $classTeacher = mysqli_num_rows($query1);
                        ?>
                        <div class="font">Class Teacher</div>
                        <div class="font">
                            <?php echo $classTeacher; ?>
                        </div>
                        <div>
                            <i class="fas fa-chalkboard-teacher fa-2x text-danger"></i>
                        </div>
                    </div>
                    <div class="dashboard-card">
                        <?php
                        $query1 = mysqli_query($conn, "SELECT * from tblsessionterm");
                        $sessTerm = mysqli_num_rows($query1);
                        ?>
                        <div class="font">Session & Terms</div>
                        <div class="font">
                            <?php echo $sessTerm; ?>
                        </div>
                        <div>
                            <i class="fas fa-calendar-alt fa-2x text-warning"></i>
                        </div>
                    </div>
                </div>
</body>

</html>