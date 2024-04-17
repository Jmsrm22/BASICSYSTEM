<?php

include "connection.php";

session_start();


if($_SESSION['SAvalidate'] == 'invalid' || empty($_SESSION['SAvalidate'])){
        $_SESSION['SAvalidate'] = 'invalid';
    }

    if($_SESSION['SAvalidate'] == 'valid'){
        echo "<script>window.location.href = 'http://localhost/finals/SAsignup.php'</script>";
    }

 if(isset($_POST['submit'])){


    $PresCode = "5678";
    $code = $_POST['code'];


    if($code == $PresCode){


                $SA = "SELECT `ID` FROM `sadmin`";
                $SAresult = $con->query($SA);


                if($SAresult->num_rows > 0){
                    $_SESSION['SAvalidate'] = 'invalid'; 
                    echo '<script>
                            alert("Alert: There is an existing super admin.");
                            window.location.href = "http://localhost/finals/Sadmin.php";
                            </script>';
                }else{
                     $_SESSION['SAvalidate'] = 'valid';
                    header("refresh: 0; SAsignup.php");
                    echo '<script>alert("Create Your Account Super Admin.")</script>';
                    exit();  
                }    


        }else
            $_SESSION['SAvalidate'] = 'invalid';
            header("refresh: 0; SAvalidation.php");
            echo '<script>alert("Wrong President Code!")</script>';
            exit();

}

?>


<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Create Account</title>
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
            <h1 class="head bg-success bg-opacity-75 text-white mb-5 shadow" style="text-align:center;">COSTODA NAIC</h1>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row">
            <div class="col d-flex justify-content-center align-items-center text-center">
                
                <div class="card mt-5 shadow" style="width:28%; min-width: 300px;">
                    <div class="card-header text-start text-white bg-success"><h5><i class="bi bi-person-check" style="margin-right:.60rem;"></i>Verification</h5></div>
                        <div class="card-body">
                                

                            <div class="form-group">
                                <form method="post">

                                <div class="inputBox mb-3">
                                    <h5>Super Admin Code</h5>
                                    <p>In accordance with the Costoda president, the code will be provided to enable the super admin to create an account.</p> 
                                    <input type="number" name="code" class="input" pattern="\d{4}" min="0000" max="9999" required> 
                                    <span>Super Admin Code</span>
                                </div> 


                                <div class="col-12 mt-3">
                                    <input type="submit" name="submit" class="btn btn-success" style="width:40%; min-width: 100px;">
                                </div>

                                </form>
                            </div>
                    </div>
                </div>


            </div>

            <div class="container-fluid">
                <div class="col 12 text-center text-white mt-3">
                    <p>Click to Back <a href="Sadmin.php" class="link-offset-light">Log In Page.</a></p>
                </div>
            </div>

        </div>
    </div>



   
        
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


</body>


</html>
