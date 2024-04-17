<?php 

include 'connection.php';
require ('session.php');

	$ID = $_SESSION['ID'];

    require_once("connection.php");
    $sql = "SELECT * FROM `admin` WHERE `ID` =  '".$ID."'";
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
	<title>Welcome Admin</title>
    
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



    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col d-flex justify-content-center align-items-center">
                <div class="card shadow mb-5" style="width:30%; min-width:270px;">
                    <img src="image/profile.jpg" class="card-img-top" alt="Profile">

                    <div class="card-body text-center">



                        <h5 class="card-title mb-4">Admin <?php echo $fname;?></h5>
                        
                        <div class="costume text-start d-flex">
                            <label class="nowrap-label">Full Name: </label>
                            <p class="nowrap-paragraph"> <?php echo $fname; echo ' '; echo $lname;?></p>
                        </div>

                        <div class="costume text-start d-flex">
                            <label class="nowrap-label">Email: </label>
                            <p class="nowrap-paragraph"> <?php echo $email;?></p>
                        </div>
                            
                        <div class="costume text-start d-flex">
                            <label class="nowrap-label">Username: </label>
                            <p class="nowrap-paragraph"> <?php echo $username;?></p>
                        </div>


                           
                                <button type="button" class="Update btn btn-success" data-id='<?php echo $ID?>' data-bs-toggle="modal" data-bs-target="#editacc">
                                Edit My Account
                                </button>

                            <a href="Alogout.php" class="btn btn-dark mb-2 mt-2">Log Out Account</a> 




                    </div>
                </div>
            </div>
        </div>
    </div>

        <script type='text/javascript'>
            $(document).ready(function(){
                $('.Update').click(function(){
                    var admin = $(this).data('id');
                  
                    $.ajax({
                        url: 'Ajaxupdate.php',
                        type: 'post',
                        data: {admin: admin},
                        success: function(response){ 
                            $('.modal-body').html(response); 
                            $('#update').modal('show'); 
                        }
                    });
                });
            });

            </script>


        
        <div class="modal fade" id="update" role="dialog" style="width: 100%; min-width: 300px;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Update My Account</h4>
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

