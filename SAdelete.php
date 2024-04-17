


<?php

include "connection.php";

session_start();

if (isset($_POST['id'])) {
   
    $id = $_POST['id'];

            $sql = "DELETE FROM `admin` WHERE `ID` = '".$id."'";
            $result = mysqli_query($con,$sql);


            if($result){
                $_SESSION['SAstatus'] = 'valid'; 
                echo "success";

            }else {
                $_SESSION['SAstatus'] = 'valid'; 
                echo "Fail";}

} 

?>
