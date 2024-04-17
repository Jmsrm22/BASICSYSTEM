


<?php

include "connection.php";

session_start();

if (isset($_POST['pid']) && isset($_POST['admin'])) {
   
    $pid = $_POST['pid'];
    $admin = $_POST['admin'];


            $sql = "DELETE FROM `passenger_driver` WHERE `PID` = '".$pid."'";
            $result = mysqli_query($con,$sql);


            if($result){
        
            $_SESSION['status'] = 'valid';
            $_SESSION['ID'] = $admin;

            }else {
               
                echo "Fail";
            $_SESSION['status'] = 'valid';
            $_SESSION['ID'] = $admin;}

} 

?>
