<?php

    include "connection.php";
    require ('SAsession.php');
    
    $_SESSION['SAstatus'];
    echo $ID = $_SESSION['SID'];
    



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

<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Super Admin</title>
    
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="design.css">


</head>

<body class="bg-image">
    

<!-- Function-->

    <div class="container mt-5">
        <div class="row">
        <div class="col-md-12">
        
        <div class="panel-body">
            <?php 
                include "connection.php";
                $query = "SELECT * FROM `admin`  ";
                $result = mysqli_query($con,$query);
            ?>

             <h5 class="text-white text-center mb-4">ADMIN'S LIST<h5>

             <div class="text-end">
                  <button style="height:35px;" data-id='<?php echo $ID;?>' class="myacc btn btn-success mb-2">My Account</button>
             </div>

            <div class="table">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th>Admin No.</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Action</th>
                        </tr>
                        </thead> 
                        <?php 

                        if (mysqli_num_rows($result) > 0 ){
                            while($row = mysqli_fetch_array($result)){ 

                                    $ID = $row['ID'];

                                ?>
                            <tr>
                                <td data-label="Admin No."><?php echo $row['ID']; ?></td>
                                <td data-label="Full Name"><?php echo $row['fname']; echo ' '; echo $row['lname']; ?></td>
                                <td data-label="Email"><?php echo $row['email']; ?></td>
                                <td data-label="Username"><?php echo $row['username']; ?></td>
                                <td data-label="Action">

                                    <button style="height:35px;" data-id='<?php echo $row['ID'];?>' class="userinfo btn btn-danger">View Info</button>
                                </td>
                                

                            </tr>
                        <?php }

                    }else{
                        ?>

                        <td data-label="Complaint" colspan="5">No Complaint</td>

                        <?php
                    } ?>
                </table>
            </div>
        </div>    
    </div>    
    </div>
</div>    



<script type='text/javascript'>
            $(document).ready(function(){
                $('.userinfo').click(function(){
                    var id = $(this).data('id');
                  
                    $.ajax({
                        url: 'SAajaxfile.php',
                        type: 'post',
                        data: {id: id,},
                        success: function(response){ 
                            $('.modal-body').html(response); 
                            $('#empModal').modal('show'); 
                        }
                    });
                });
            });

            </script>


        
        <div class="modal fade" id="empModal" role="dialog" style="width: 100%; min-width: 300px;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Delete Account</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                         
                                <div class="modal-body">
                                    
                                </div>

                        </div>


                    </div>
                </div>
        </div>



        <script type='text/javascript'>
            $(document).ready(function(){
                $('.myacc').click(function(){
                    var id = $(this).data('id');
                  
                    $.ajax({
                        url: 'SAacc.php',
                        type: 'post',
                        data: {id: id,},
                        success: function(response){ 
                            $('.modal-body').html(response); 
                            $('#myacc').modal('show'); 
                        }
                    });
                });
            });

            </script>


        
        <div class="modal fade" id="myacc" role="dialog" style="width: 100%; min-width: 300px;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Super Admin Account</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                         
                                <div class="modal-body">
                                    
                                </div>

                        </div>


                    </div>
                </div>
        </div>


   










</body>




</html>








