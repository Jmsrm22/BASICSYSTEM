<?php

    include "connection.php";
    
    session_start();
       
        $admin = $_POST['admin'];



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

        $check = "SELECT * FROM `admin` WHERE `ID` = '".$admin."' ";
        $checkresult = mysqli_query($con,$check);

        while($checkrow = $checkresult->fetch_assoc())
        {
            $GetID = $checkrow['ID'];
            $Getusername = $checkrow['username'];  
        }

        $username = $_POST['username'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        if(!in_array($username,$existedUsername) || $username == $Getusername){

            $sql = "UPDATE `admin` SET `username`='$username',`password`='$password',`email`='$email',`fname`='$fname',`lname`='$lname' WHERE `ID` = '".$admin."'";
            $result = mysqli_query($con,$sql);


            if($result){
               echo "Update Successfully";
               $_SESSION['status'] = 'valid';
               $_SESSION['ID'] = $admin;

            }else{
               echo "Fail";
               $_SESSION['status'] = 'valid';
               $_SESSION['ID'] = $admin;
            }


        }

        else{
            echo "Use a different Username. Your Username is Already in Use!";
            }

            

    ?>