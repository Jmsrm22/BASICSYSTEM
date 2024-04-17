
<?php

include 'connection.php';

session_start();

    $ID = $_POST['id']; 

    require_once("connection.php");
    $sql = "SELECT * FROM `sadmin` WHERE `ID` =  '".$ID."'";
    $result = mysqli_query($con,$sql);

    while($row = $result->fetch_assoc())
    {   
        $fname = $row["fname"];
        $lname = $row["lname"];
        $email = $row["email"];
        $username = $row["username"];
        $password = $row["password"];
        
    }


?>

    
          
    <div class="form-group">
        <form method="post">

        <div class="input-group input-group mb-3">
            <span class="input-group-text" style="font-weight:bold; border:transparent; background-color:transparent">First Name: </span>
            <input type="text" name="fname" value="<?php echo $fname; ?>" class="form-control" disabled required>
        </div>

        <div class="input-group input-group mb-3">
            <span class="input-group-text" style="font-weight:bold; border:transparent; background-color:transparent;">Last Name: </span>
            <input type="text" name="lname" value="<?php echo $lname; ?>" class="form-control" disabled required>
        </div>

        <div class="input-group input-group mb-3">
            <span class="input-group-text" style="font-weight:bold; border:transparent; background-color:transparent;">Email: </span>
            <input type="text" name="email" value="<?php echo $email; ?>" class="form-control" disabled required>
        </div>

        <div class="input-group input-group mb-3">
            <span class="input-group-text" style="font-weight:bold; border:transparent; background-color:transparent;">Username: </span>
            <input type="text" name="username" class="form-control" value="<?php echo $username?>" min="0" disabled required>
        </div>

        <div class="input-group input-group mb-3">
            <span class="input-group-text" style="font-weight:bold; border:transparent; background-color:transparent;">Password: </span>
            <input type="text" name="password" value="<?php echo $password; ?>" class="form-control" placeholder="Enter New Password" disabled required>
        </div>


            <div class="modal-footer">
            <a href="SAupdate.php" class="btn btn-danger">Update Account</a>
            <a href="SAlogout.php" class="btn btn-dark" style="margin-right: 5px;">Log Account</a>
            </div>
    </form>
   


