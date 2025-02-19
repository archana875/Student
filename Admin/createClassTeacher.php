<?php 
error_reporting(0);
include '../Includes/dbcon.php';
include '../Includes/session.php';

//------------------------SAVE--------------------------------------------------

if(isset($_POST['save'])){
    
    $firstName=$_POST['firstName'];
  $lastName=$_POST['lastName'];
  $emailAddress=$_POST['emailAddress'];

  $phoneNo=$_POST['phoneNo'];
  $classId=$_POST['classId'];
  $classArmId=$_POST['classArmId'];
  $dateCreated = date("Y-m-d");
   
    $query=mysqli_query($conn,"select * from tblclassteacher where emailAddress ='$emailAddress'");
    $ret=mysqli_fetch_array($query);

    $sampPass = "pass123";
    $sampPass_2 = md5($sampPass);

    if($ret > 0){ 

        $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>This Email Address Already Exists!</div>";
    }
    else{

    $query=mysqli_query($conn,"INSERT into tblclassteacher(firstName,lastName,emailAddress,password,phoneNo,classId,classArmId,dateCreated) 
    value('$firstName','$lastName','$emailAddress','$sampPass_2','$phoneNo','$classId','$classArmId','$dateCreated')");

    if ($query) {
        
        $qu=mysqli_query($conn,"update tblclassarms set isAssigned='1' where Id ='$classArmId'");
            if ($qu) {
                
                $statusMsg = "<div class='alert alert-success'  style='margin-right:700px;'>Created Successfully!</div>";
            }
            else
            {
                $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!</div>";
            }
    }
    else
    {
         $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!</div>";
    }
  }
}

//---------------------------------------EDIT-------------------------------------------------------------






//--------------------EDIT------------------------------------------------------------

 if (isset($_GET['Id']) && isset($_GET['action']) && $_GET['action'] == "edit")
	{
        $Id= $_GET['Id'];

        $query=mysqli_query($conn,"select * from tblclassteacher where Id ='$Id'");
        $row=mysqli_fetch_array($query);

        //------------UPDATE-----------------------------

        if(isset($_POST['update'])){
    
             $firstName=$_POST['firstName'];
              $lastName=$_POST['lastName'];
              $emailAddress=$_POST['emailAddress'];

              $phoneNo=$_POST['phoneNo'];
              $classId=$_POST['classId'];
              $classArmId=$_POST['classArmId'];
              $dateCreated = date("Y-m-d");

    $query=mysqli_query($conn,"update tblclassteacher set firstName='$firstName', lastName='$lastName',
    emailAddress='$emailAddress', password='$password',phoneNo='$phoneNo', classId='$classId',classArmId='$classArmId'
    where Id='$Id'");
            if ($query) {
                
                echo "<script type = \"text/javascript\">
                window.location = (\"createClassTeacher.php\")
                </script>"; 
            }
            else
            {
                $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!</div>";
            }
        }
    }


//--------------------------------DELETE------------------------------------------------------------------

  if (isset($_GET['Id']) && isset($_GET['classArmId']) && isset($_GET['action']) && $_GET['action'] == "delete")
	{
        $Id= $_GET['Id'];
        $classArmId= $_GET['classArmId'];

        $query = mysqli_query($conn,"DELETE FROM tblclassteacher WHERE Id='$Id'");

        if ($query == TRUE) {

            $qu=mysqli_query($conn,"update tblclassarms set isAssigned='0' where Id ='$classArmId'");
            if ($qu) {
                
                 echo "<script type = \"text/javascript\">
                window.location = (\"createClassTeacher.php\")
                </script>"; 
            }
            else
            {
                $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!</div>";
            }
        }
        else{

            $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!</div>"; 
         }
      
  }


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
<body>
<div id="wrapper">
<?php include "./topbar.php";?>

<div id="content" class="attendanceView-container">
      <?php include "./sidebar.php";?>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
          <div class="Dashboard-name">
            <h1 class="h3 mb-0 text-gray-800">Create Class Teachers</h1>
            
          </div>

          
              <div class="viweAttendance-card">
                <div>
                  <h6 style="color: blue; padding:5px" class="side-text">Create Class Teachers</h6>
                    <?php echo $statusMsg; ?>
                </div>
                <div class="card-body">
                  <form method="post">
                   <div class="form-group ">
                        <div>
                        <label class="form-control-label">Firstname:</label>
                        <input type="text" class="form-control" required name="firstName" value="<?php echo $row['firstName'];?>" id="exampleInputFirstName">
                        </div>
                        <div class="form-group ">
                        <div >
                        <label class="form-control-label">Lastname:</label>
                      <input type="text" class="form-control" required name="lastName" value="<?php echo $row['lastName'];?>" id="exampleInputFirstName" >
                        </div>
                        </div>
                    </div>
                     <div class="form-group ">
                        <div class="col-xl-6">
                        <label class="form-control-label">Email Address:</label>
                        <input type="email" class="form-control" required name="emailAddress" value="<?php echo $row['emailAddress'];?>" id="exampleInputFirstName" >
                        </div>
                        <div class="form-group ">
                        <div class="col-xl-6">
                        <label class="form-control-label">Phone No:</label>
                      <input type="text" class="form-control" name="phoneNo" value="<?php echo $row['phoneNo'];?>" id="exampleInputFirstName" >
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xl-6">
                        <label class="form-control-label">Select Class:</label>
                        <input type="text" class="form-control">
                        </div>
                        
                    </div>
                    <button type="button" id="saveButton" class="btn-view">Save</button>
                  </form>
                </div>
              </div>
              <div class="viweAttendance-card">
              <div >
                <h6 style="color: blue; padding:5px" class="side-text">All Class Teachers</h6>
              </div>
              <div >
                <table class="table " id="dataTableHover">
                  <thead class="thead-light">
                    <tr>
                      <th>#</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Email Address</th>
                        <th>Phone No</th>
                      <th>Class</th>
                      <th>Date Created</th>
                      <th>Delete</th>
                    </tr>
                  </thead>

                  <tbody>

                    
                  </tbody>
                </table>
              </div>

</body>
</html>