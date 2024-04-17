<?php

    include "connection.php";
    session_start();

     if($_SESSION['SAforgot'] == 'invalid' || empty($_SESSION['SAforgot'])){
        $_SESSION['SAforgot'] = 'invalid';
    }

    if($_SESSION['SAforgot'] == 'valid'){
        echo "<script>window.location.href = 'http://localhost/finals/Schangepass.php'</script>";
    }

     if(isset($_POST['submit'])){

        $PresCode = "5678";
        $code = $_POST['code'];


         if($code == $PresCode){

            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];


            $sql = "SELECT * FROM `sadmin` WHERE `email` = '$email' AND `fname` = '$fname' AND `lname` = '$lname'";
            $result = mysqli_query($con,$sql);

                if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_assoc($result);


                    if($row['fname'] === $fname && $row['lname'] === $lname && $row['email'] === $email){

                        $_SESSION['SAforgot'] = 'valid';
                        $_SESSION['SAforgotID'] = $row['ID'];
                        header("refresh: 0; SAchangepass.php");
                        echo '<script>alert("Super Admin Change your Username and Password.")</script>';
                        exit();

                    }else{
                        $_SESSION['SAforgot'] = 'valid';
                        header("refresh: 0; SAforgot.php");
                        echo '<script>alert("No Account Found!")</script>';
                        exit();     
                    }


            }else{
                header("refresh: 0; SAforgot.php");
                echo '<script>alert("No Account Found!")</script>';
                exit();
            }


         }else{
            $_SESSION['SAforgot'] = 'invalid';
            header("refresh: 0; SAforgot.php");
            echo '<script>alert("Wrong Super Admin Code!")</script>';
            exit();
         }        

     }      

?>


<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Recover Account</title>
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
    
    <div class="row">
            <h1 class="head bg-success bg-opacity-75 text-white mb-5" style="text-align:center;">SUPER ADMIN</h1>
        </div>

    <div class="container-fluid">

        <div class="col-12 d-flex justify-content-center align-items-center text-center">
            <div class="card mt-3" style="width:35%; min-width: 300px;"> 
                <div class="card-header bg-success text-white text-start">
                    <h5><i class="bi bi-arrow-clockwise" style="margin-right:.50rem;"></i>Recover Account</h5>
                </div>


                <div class="card-body">

                    <div class="form-group">
                        <form method="post">
                            <div class="inputBox mb-3"> 
                                <input type="number" name="code" class="input" pattern="\d{4}" max="9999" min="0000" required="required"> 
                                <span>Super Admin Code</span>
                            </div>

                            <div class="inputBox mb-3"> 
                                <input type="text" name="email" class="input" required="required"> 
                                <span>Email Address</span>
                            </div>

                            <div class="inputBox mb-3"> 
                                <input type="text" name="fname" class="input" required="required"> 
                                <span>First Name</span>
                            </div>

                            <div class="inputBox mb-3"> 
                                <input type="text" name="lname" class="input" required="required"> 
                                <span>Last Name</span>
                            </div>
                            <input type="submit" name="submit" class="form-control btn btn-success mt-2" value="Submit" style="width:30%; min-width: 100px;">
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>


        <div class="col 12 text-center text-white mt-3">
            <p>Click to Go <a href="Sadmin.php" class="link-offset-light">Log In Page.</a></p>
        </div>

    </div>

    





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


</body>


</html>
