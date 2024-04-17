<?php 

include 'connection.php';
require ('SAsession.php');

$_SESSION['SAstatus'];
$ID = $_SESSION['SID'];


?>


<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update Super Admin</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="design.css">


</head>

<body class="bg-image">



    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col d-flex justify-content-center align-items-center">
                <div class="card shadow mb-5" style="width:40%; min-width:270px;">

                	<div class="input-group-text bg-success text-white "> 
                <h5><i class="bi bi-pencil-fill" style="margin-right:.50rem;"></i>Update Account</h5>
            </div>

                    <div class="card-body text-center">

          <div class="form-group">

          	<form method="post">


        <div class="input-group input-group mb-3">
            <span class="input-group-text" style="font-weight:bold; border:transparent; background-color:transparent">First Name: </span>
            <input type="text" name="fname" placeholder="Update First Name"  class="form-control" required>
        </div>

        <div class="input-group input-group mb-3">
            <span class="input-group-text" style="font-weight:bold; border:transparent; background-color:transparent;">Last Name: </span>
            <input type="text" name="lname" placeholder="Update Last Name" class="form-control" required>
        </div>

        <div class="input-group input-group mb-3">
            <span class="input-group-text" style="font-weight:bold; border:transparent; background-color:transparent;">Email: </span>
            <input type="text" name="email" placeholder="Update Email"  class="form-control" required>
        </div>

        <div class="input-group input-group mb-3">
            <span class="input-group-text" style="font-weight:bold; border:transparent; background-color:transparent;">Username: </span>
            <input type="text" name="username" placeholder="Update UserName" class="form-control" min="0"  required>
        </div>

        <div class="input-group input-group mb-4">
            <span class="input-group-text" style="font-weight:bold; border:transparent; background-color:transparent;">Password: </span>
            <input type="text" name="password" class="form-control" placeholder="Enter New Password"  required>
        </div>


         <div class="modal-footer align-items-center justify-content-center">
            <input type="submit" name="update" class="btn btn-success mb-3" style="margin-right: 5px;" value="Save Change">
            
         

    </form>

    <form method="post">
    	<input type="submit" name="cancel" class="btn btn-dark d-flex mb-3" value="Cancel Update">
	</form>

		</div>

    </div>
                           

    <?php

if(isset($_POST['update'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];

        $sql1 = "UPDATE `sadmin` SET `username`='$username',`password`='$password',`email`='$email',`fname`='$fname',`lname`='$lname' WHERE `ID` = '$ID'";
            $result1 = mysqli_query($con,$sql1);

        if($result1){
                $_SESSION['SAstatus'] = 'valid';
                $_SESSION['SID'] = $ID;
                echo '<script>alert("Change Successfully!"); window.location.href="Slanding.php";</script>';
            }else{
                $_SESSION['SAstatus'] = 'valid';
                $_SESSION['SID'] = $ID;
                echo '<script>alert("Error!"); window.location.href="Slanding.php";</script>';}
    }



    if(isset($_POST['cancel'])){
    	$_SESSION['SAstatus'] = 'valid';
        $_SESSION['SID'] = $ID;
        echo '<script>alert("Cancel Update!"); window.location.href="Slanding.php";</script>';
    }




?>

                    </div>
                </div>
            </div>
        </div>
    </div>

      


    

</body>


</html>


