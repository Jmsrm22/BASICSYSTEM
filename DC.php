<?php

    include "connection.php";
    require ('session.php');

    $ID = $_SESSION['ID'];
    $_SESSION['status'];


?>

<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Driver's Complaint</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="design.css">
</head>

<body class="bg-image">
    
    <nav class="navbar navbar-expand-md bg-success bg-opacity-75 shadow">
        <h5 class="navbar-brand fs-3 ms-4 text-white">COSTODA NAIC</h5>

    <button class="navbar-toggler mx-3 shadow bg- text-white" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
        <i class="bi bi-list  mx-2"></i>
    </button>


    <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a href="Alanding.php" class="nav-link mx-2 text-white fs-6">My Account</a>
            </li>
            <li class="nav-item">
                <a href="PC.php" class="nav-link mx-2 text-white fs-6">Passenger's Complaint</a>
            </li>
            <li class="nav-item">
                <a href="DC.php" class="nav-link mx-2 text-white fs-6">Driver's Complaint</a>
            </li>
        </ul>

    </div>

</nav>


    <!-- Function-->

    <div class="container mt-5">
        <div class="row">
        <div class="col-md-12">
        
        <div class="panel-body">
            <?php 
                include "connection.php";
                $query = "SELECT * FROM `driver_driver`";
                $result = mysqli_query($con,$query);
            ?>


            <h5 class="text-white text-center mb-4">DRIVERS COMPLAINTS<h5>

                
            <div class="table">
                <table class="table">

            
                    <thead class="table-head table-dark">

                        <tr>
                            <th>Complaint No.</th>
                            <th>Date of Accident</th>
                            <th>Complainant Name</th>
                            <th>Cellphone Number</th>
                            <th>Action</th>
                        </tr>
                        </thead> 
                        <?php 

                        if (mysqli_num_rows($result) > 0 ){
                            while($row = mysqli_fetch_array($result)){ ?>
                            <tr>
                                <td data-label="Complaint No."><?php echo $row['DID']; ?></td>
                                <td data-label="Date of Accident"><?php echo $row['Ddate']; ?></td>
                                <td data-label="Complainant Name"><?php echo $row['Dname']; ?></td>
                                <td data-label="Cellphone Number"><?php echo $row['Dcpnumber']; ?></td>
                                <td data-label="Action">

                                
                                    <button style="height:35px;" data-another='<?php echo $ID?>' data-id='<?php echo $row['DID'];?>' class="complaintIn btn btn-success">Complaint</button>
                                    
                                    
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
                $('.complaintIn').click(function(){
                    var did = $(this).data('id');
                    var admin = $(this).data('another');

                    $.ajax({
                        url: 'DRajaxfile.php',
                        type: 'post',
                        data: {did: did, admin: admin},
                        success: function(response){ 
                            $('.modal-body').html(response); 
                            $('#DriverpModal').modal('show'); 
                        }
                    });
                });
            });

            </script>


            <div class="modal fade" id="DriverpModal" role="dialog" style="width: 100%; min-width: 300px;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Driver Complaint</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                            
                                <div class="modal-body">
                                    
                                </div>

                        </div>


                    </div>
                </div>

</body>


</html>
