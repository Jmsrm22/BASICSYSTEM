<?php

    include "connection.php";

    session_start();

    if($_SESSION['forgot'] == 'invalid' || empty($_SESSION['forgot'])){
        $_SESSION['forgot'] = 'invalid';

        unset($_SESSION['forgotID']);
        echo "<script>window.location.href = 'http://localhost/finals/Aforgot.php'</script>";
    }
    
    $ID = $_SESSION['forgotID'];
    echo $_SESSION['forgot'];


     if(isset($_POST['submit'])){

        $existingUsername = "SELECT `username`FROM `admin`";
        $Usernameresult = $con->query($existingUsername);


        if($Usernameresult->num_rows > 0){
        $existingRUsername = array();
            while ($row = $Usernameresult->fetch_assoc()) {
                $existedUsername[] = $row['username'];
            }
        }else{
            $existedUsername = array();
        }

        $check = "SELECT * FROM `admin` WHERE `ID` = '".$ID."' ";
        $checkresult = mysqli_query($con,$check);

        while($checkrow = $checkresult->fetch_assoc())
        {
            $GetID = $checkrow['ID'];
            $Getusername = $checkrow['username'];  
        }



        $username = $_POST['username'];
        $password = $_POST['password'];


         if(!in_array($username,$existedUsername) || $username == $Getusername){
            
            $sql = "UPDATE `admin` SET `username`='$username',`password`='$password' WHERE `ID` = '$GetID'";
            $result = mysqli_query($con,$sql);


            if($result){
                unset($_SESSION['forgotID']);
                $_SESSION['forgot'] = 'invalid';
                echo '<script>alert("Change Successfully, Try Logging In Now!")</script>';
                header("refresh:0; Alogin.php");
                exit();

            }else{
                header("refresh:0; Achangepass.php");
                $ID = $_SESSION['forgotID'];
                $_SESSION['forgot'];
                echo '<script>alert("Try to Create Again!")</script>';
                exit();}
             

            }else{
                header("refresh: 0; Achangepass.php");
                $ID = $_SESSION['forgotID'];
                $_SESSION['forgot'];
                echo '<script>alert("Use a different Username. Your Username is Already in Use!")</script>';
                exit();}

       
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
</head>

<body class="bg-image">
    


    <div class="container-fluid">

        <div class="col-12 d-flex justify-content-center align-items-center text-center">
            <div class="card" style="width:28%; min-width: 300px; margin-top: 100px;"> 
                <div class="card-header bg-success text-white text-start">
                    <h5 style="font-size:15px;"><i class="bi bi-arrow-clockwise" style="margin-right:.50rem;"></i>Change Username and Password</h5>
                </div>


                <div class="card-body">

                    <div class="form-group">
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

        <div class="col 12 text-center text-white mt-3">
            <p>Click Back to <a href="Alogin.php" class="link-offset-light">Log In Page.</a></p>
        </div>

    </div>

    





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


</body>


</html>
