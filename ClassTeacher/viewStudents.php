<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                <div>
                    <h1 class="Dashboard-name">All Student in Class</h1>
                </div>
                <div class="viweAttendance-card">
                    <div>
                        <h6 style="color: blue; padding:5px" class="side-text">All Student In Class</h6>
                    </div>
                    <div class="table-responsive p-3">
                        <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Admission No</th>
                                    <th>Class</th>
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
</body>

</html>