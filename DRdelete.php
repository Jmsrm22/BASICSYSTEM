


<?php

include "connection.php";
session_start();

if (isset($_POST['did']) && isset($_POST['admin'])) {
   
    $did = $_POST['did'];
    $admin = $_POST['admin'];


            $sql = "DELETE FROM `driver_driver` WHERE `DID` =  '".$did."'";
            $result = mysqli_query($con,$sql);


            if($result){

                $_SESSION['status'] = 'valid';
            $_SESSION['ID'] = $admin;
        
            

            }else {
                $_SESSION['status'] = 'valid';
                $_SESSION['ID'] = $admin;
                echo "Fail";}

} 

?>
