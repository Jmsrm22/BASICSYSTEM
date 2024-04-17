<?php

include "connection.php";

session_start();

if($_SESSION['SAvalidate'] == 'invalid' || empty($_SESSION['SAvalidate'])){
        $_SESSION['SAvalidate'] = 'invalid';
        echo "<script>window.location.href = 'http://localhost/finals/SAvalidation.php'</script>";

    }

 if(isset($_POST['submit'])){


        $existingUsername = "SELECT `username` FROM `sadmin`";
        $Usernameresult = $con->query($existingUsername);


        if($Usernameresult->num_rows > 0){
        $existingRUsername = array();
            while ($row = $Usernameresult->fetch_assoc()) {
                $existedUsername[] = $row['username'];
            }
        }else{
            $existedUsername = array();
        }

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];


        if (!in_array($username,$existedUsername)){

            $sql = "INSERT INTO `sadmin`(`username`, `password`, `email`, `fname`, `lname`) VALUES ('$username','$password','$email','$fname','$lname')";
            $result = mysqli_query($con,$sql);


            if($result){
                ob_start();
                $_SESSION['SAvalidate'] = 'invalid';
                echo '<script>alert("Create Successfully, Super Admin!")</script>';
                header("refresh:0; Sadmin.php");
                ob_end_flush();

            }else{
                 ob_start();
                 $_SESSION['SAvalidate'] = 'valid';
                echo '<script>alert("Try to Create Again!")</script>';
                header("refresh:0; Sadmin.php");
                ob_end_flush();
                exit();
            }



        }

        else{
             ob_start();
             $_SESSION['SAvalidate'] = 'valid';
            header("refresh: 0; SAsignup.php");
            echo '<script>alert("Use a different Username. Your Username is Already in Use!")</script>';
           ob_end_flush();
                exit();}



 }


?>


<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Super Admin Create Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="design.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
    
        <style>
            .head{
                font-family: 'Permanent Marker', cursive;
            }
        </style>
</head>

<body class="bg-image">
    

    <div class="container-fluid">
        <div class="row">
            <h1 class="head bg-success bg-opacity-75 text-white mb-5 shadow" style="text-align:center;">SUPER ADMIN</h1>
        </div>
    </div>

    
    <div class="container-fluid d-flex justify-content-center align-items-center">
        <div class="row border rounded-4 p-3 bg-white shadow">
           



           <div class="col-md-6 mb-2 left-box text-center" style="border: 2px solid #333; border-radius: 10px;">
                <div class="feature-image mt-4">
                    <img src="image/TL.png" class="img-fluid" style="width:250px; ">
                </div>

                <h5>SUPER ADMIN FORM</h5>
                <p style="font-size: .80rem;">Only authorized administrators can create an account.</p>
            </div>



                <div class="col-md-6 right-box text-start">
                    <h5>Create Account</h5>

                    
                        <div class="form-group mt-3">
                            <form method="post">

                                <div class="inputBox mb-3"> 
                                    <input type="text" name="email" class="input" required="required"> 
                                    <span>Enter Email Address</span>
                                </div>

                                <div class="inputBox mb-3"> 
                                    <input type="text" name="fname" class="input" required="required"> 
                                    <span>First Name</span>
                                </div>

                                <div class="inputBox mb-3"> 
                                    <input type="text" name="lname" class="input" required="required"> 
                                    <span>Last Name</span>
                                </div>

                                <div class="inputBox mb-3"> 
                                    <input type="text" name="username" class="input" required="required"> 
                                    <span>Create Username</span>
                                </div>

                                <div class="inputBox d-flex mb-2">

                                    <div class="input-group">

                                    <input type="text" name="password" id="password" class="input" aria-describedby="toggle-password" required="required">
                                    <span>Password</span>  

                                    </div>

                                </div>


                                <div class="mt-3 mb-3">
                                    <input type="submit" name="submit" class="btn btn-success" value="Create Account" style="width:100%;">
                                </div>

                            </form>
                        </div>

                </div>









        </div>
    </div>

    <div class="container-fluid d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="col-12">

                <div class="col 12 text-center text-white mt-3">
                    <p>Click to Back <a href="Sadmin.php" class="link-offset-light">Log In Page.</a></p>
                </div>
               
            </div>

        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


</body>


</html>
