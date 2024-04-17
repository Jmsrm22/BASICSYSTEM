<?php

include 'connection.php';

session_start();

    $_SESSION['validate'] = 'invalid';
    $_SESSION['forgot'] = 'invalid';


    if($_SESSION['status'] == 'invalid' || empty($_SESSION['status'])){
        $_SESSION['status'] = 'invalid';
    }

    if($_SESSION['status'] == 'valid'){
        echo "<script>window.location.href = 'http://localhost/finals/Alanding.php'</script>";
    }


if(isset($_POST['submit'])){

    function validate($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);

        return $data;
   }

        $username = validate($_POST['username']);
        $password = validate($_POST['password']);


        $sql = "SELECT * FROM `admin` WHERE `username` = '$username' AND `password` = '$password'";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($result);


        if(mysqli_num_rows($result) == 1){
            $_SESSION['status'] = 'valid';
            $_SESSION['ID'] = $row['ID'];
            echo "<script>window.location.href = 'http://localhost/finals/Alanding.php'</script>";

        }else{
            $_SESSION['status'] = 'invalid';
            echo '<script>alert("Wrong Username or Password!")</script>';
            echo "<script>window.location.href = 'http://localhost/finals/Alogin.php'</script>";
        }


}





?>


<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Log In</title>
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

   
        <div class="row mb-5">
            <h1 class="head bg-success bg-opacity-75 text-white" style="text-align:center;">COSTODA NAIC</h1>
        </div>


    <div class="row mb-3">
        
        <div class="form-group d-flex justify-content-center align-items-center text-center">
        <div class="card shadow" style="width:28%; min-width: 300px;">
            



            <div class="input-group-text text-white mb-3" style="background-color: #03A678;"> 
                <h5><i class="bi bi-box-arrow-in-right" style="margin-right:.50rem;"></i>LOG - IN</h5>
            </div>





        <div class="card-body">
        <form method="post">

            <div class="inputBox mb-3"> 
                <input type="text" name="username" id="username" class="input" required="required"> 
                <span>Username</span>
            </div> 

            <div class="d-flex justify-content-center align-items-center text-center">
            


            <div class="inputBox d-flex mb-2">

                <div class="input-group">

                <input type="password" name="password" id="password" class="input" aria-describedby="toggle-password" required="required" style="width: 84%; min-width: 100px;">
                <span>Password</span>  

                    <button type="button" class="btn btn-success">
                        <i class="bi bi-eye" id="password-toggle-icon"></i>
                    </button>

                </div>

            </div>

            </div> 


            <div class="col-12 text-end">
                <a href="Aforgot.php" class="link-offset-light">Forgot Password?</a>
            </div>

            <div class="col-12 mt-3 mb-3">
                <input type="submit" name="submit" class="btn btn-success" style="width:30%; min-width: 100px;">
            </div>


                <script>

                    const togglePassword = document.querySelector('#password-toggle-icon');
                    const password = document.querySelector('#password');togglePassword.addEventListener('click', () => {
                    const type = password
                        .getAttribute('type') === 'password' ?
                        'text' : 'password';
                        password.setAttribute('type', type);
                        this.classList.toggle('bi-eye');
                    });
   
                </script>

        </form>

            
        </div>
        </div>
        </div>

    </div>

    <div class="container-fluid">
        <div class="col 12 text-center text-white">
            <p>Don't have account? <a href="Avalidation.php" class="link-offset-light">Sign Up</a></p>
        </div>
    </div>


    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


</body>

</html>
