


<?php

include "connection.php";

session_start();

if (isset($_POST['admin'])) {
   
    $admin = $_POST['admin'];


            $sql = "DELETE FROM `admin` WHERE `ID` =  '".$admin."'";
            $result = mysqli_query($con,$sql);


            if($result){
        
                    echo json_encode(['status' => 'success']);
                    $_SESSION['status'] = 'invalid';
                    unset($_SESSION['ID']);


            }else {
               
               echo json_encode(['status' => 'failure']);
                $_SESSION['status'] = 'valid';}

} 

?>
