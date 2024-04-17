<?php

    include "connection.php";

    if(isset($_POST['Dsubmit'])){

        $Ddate = $_POST['Ddate'];
        $Dbdnumber = $_POST['Dbdnumber'];
        $Dcomplaint = $_POST['Dcomplaint'];
        $Dcpnumber = $_POST['Dcpnumber'];
        $DYbdnumber = $_POST['DYbdnumber'];
        $Dname = $_POST['Dname'];

        $sql = "INSERT INTO `driver_driver`(`Dname`, `Ddate`, `DYbdnumber`, `Dcpnumber`, `Dbdnumber`, `Dcomplaint`) VALUES ('$Dname','$Ddate','$DYbdnumber','$Dcpnumber','$Dbdnumber','$Dcomplaint')";
        $result = mysqli_query($con,$sql);


        if ($result){
            header("refresh:0; user.php");
            echo '<script>alert("Your Complaint is Successfully Submitted!")</script>';
                        
        }else{
            echo '<script>alert("Your Complaint is not Successfully Submitted!\nTry to File a Complaint Again.")</script>';
            header("refresh:0; user.php");}
            


     }

    if(isset($_POST['Psubmit'])){

        $Pdate = $_POST['Pdate'];
        $Pbdnumber = $_POST['Pbdnumber'];
        $Pcomplaint = $_POST['Pcomplaint'];
        $Pcpnumber = $_POST['Pcpnumber'];
        $Pname = $_POST['Pname'];

        $sql = "INSERT INTO `passenger_driver`(`Pname`, `Pdate`, `Pbdnumber`, `Pcpnumber`, `Pcomplaint`) VALUES ('$Pname','$Pdate','$Pbdnumber','$Pcpnumber','$Pcomplaint')";
        $result = mysqli_query($con,$sql);


        if ($result){
            header("refresh:0; user.php");
            echo '<script>alert("Your Complaint is Successfully Submitted!")</script>';
                        
        }else{
            echo '<script>alert("Your Complaint is not Successfully Submitted!\nTry to File a Complaint Again.")</script>';
            header("refresh:0; user.php");}
    }      

?>




<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TODA SYSTEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="design.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
    
        <style>
            .head{
                font-family: 'Permanent Marker', cursive;
            }
        </style>
</head>

<body class="bg-image"> 
    
    <div class="row">
            <h1 class="head bg-success bg-opacity-75 text-white text-center" style="text-align:center;">COSTODA Ride Concerns</h1>
    </div>


    <div class="container-fluid align-items-center d-flex justify-content-center mt-5 mb-5">

        <div class="row">

            <div class="col-md-6 d-flex justify-content-center">
                <div class="card shadow mt-3" style="width: 18rem;">
                    <div class="inner">
                        <img src="image/PD.jpg" class="card-img-top" alt="Passenger to Driver">
                    </div>
                   
                <div class="card-body">
                    <h5 class="card-title">Passenger - Driver</h5>
                    <p class="card-text">Click the button if you are a passenger and you have a complaint against the driver.</p>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalPassenger" class="btn btn-success">File a Complaint</a>
                </div>
                </div>
            </div>

            <div class="col-md-6 d-flex justify-content-center">
                <div class="card shadow mt-3" style="width: 18rem;">
                    <div class="inner">
                        <img src="image/DD.jpg" class="card-img-top" alt="Driver to Driver">
                    </div>
                <div class="card-body">
                    <h5 class="card-title">Driver - Driver</h5>
                    <p class="card-text">Click the button if you are a driver and you have a complaint against your fellow driver.</p>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalDriver" class="btn btn-success">File a Complaint</a>
                </div>
                </div>
            </div>

        </div>


                <!-- Modal DD-->
                <div class="modal fade" id="modalDriver" tabindex="-1" aria-labelledby="DriverModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="DriverModalLabel">Driver - Driver</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="form-group">
                        <form method="post">
                            <div class="modal-body">
                        
                             <p class="mb-4 text-center" style="font-weight: bold;">Your Information</p>

                                    <div class="inputBoxModal mb-3"> 
                                        <input type="text" name="Dname" id="name" class="input" required="required"> 
                                        <span>Full Name</span>
                                    </div>
                                    <div class="inputBoxModal mb-3"> 
                                        <input type="number" name="DYbdnumber" id="bdnumber" class="input" required="required"  minlength="3" maxlength="3" min="000" max="999">  
                                        <span>Body Number</span>
                                    </div>
                                    <div class="inputBoxModal mb-3"> 
                                        <input type="number" name="Dcpnumber" id="cpnumber" class="input" required="required"  minlength="10" maxlength="10" pattern="\d{10}" min="9000000000" max="9999999999">  
                                        <span>Mobile Number</span>
                                    </div>

                                    <p class="mb-4 text-center" style="font-weight: bold; margin-top: 35px;">Complaint Information</p>

                                    <div class="inputBoxModal mb-3"> 
                                        <textarea type="text" name="Dcomplaint" id="textarea" class="input" required="required"></textarea>
                                        <span>Complaint</span>
                                    </div>
                                    <div class="inputBoxModal mb-3"> 
                                        <input type="number" name="Dbdnumber" id="bdnumber" class="input" required="required"  minlength="3" maxlength="3" min="000" max="999">  
                                        <span>Complaint Body Number</span>
                                    </div>
                                    <div class="inputBoxModal mb-3"> 
                                        <input type="date" name="Ddate" pattern="\d{3}" id="date" class="input"  required="required">  
                                        <span>Date of Accident</span>
                                    </div>   
                                    
                               

                            </div>
                            <div class="modal-footer">
                                <input name="Dsubmit" type="submit" class="btn btn-success">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>

                    </div>
                </div>
                </div>




                <!-- Modal PD-->
                <div class="modal fade" id="modalPassenger" tabindex="-1" aria-labelledby="PassengerModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="PassengerModalLabel">Passenger - Driver</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="form-group">
                        <form method="post">
                            <div class="modal-body">
                        
                             <p class="mb-4 text-center" style="font-weight: bold;">Your Information</p>

                                    <div class="inputBoxModal mb-3"> 
                                        <input type="text" name="Pname" id="name" class="input" required="required"> 
                                        <span>Full Name</span>
                                    </div>
                                    <div class="inputBoxModal mb-3"> 
                                        <input type="number" name="Pcpnumber" id="cpnumber" class="input" required="required"  minlength="10" maxlength="10" pattern="\d{10}" min="9000000000" max="9999999999">  
                                        <span>Mobile Number</span>
                                    </div>

                                    <p class="mb-4 text-center" style="font-weight: bold; margin-top: 35px;">Complaint Information</p>

                                    <div class="inputBoxModal mb-3"> 
                                        <textarea type="text" name="Pcomplaint" id="textarea" class="input" required="required"></textarea>
                                        <span>Complaint</span>
                                    </div>
                                    <div class="inputBoxModal mb-3"> 
                                        <input type="number" name="Pbdnumber" id="bdnumber" class="input" required="required"  minlength="3" maxlength="3" min="000" max="999">  
                                        <span>Complaint Body Number</span>
                                    </div>
                                    <div class="inputBoxModal mb-3"> 
                                        <input type="date" name="Pdate" pattern="\d{3}" id="date" class="input"  required="required">  
                                        <span>Date of Accident</span>
                                    </div>   
                                    
                               

                            </div>
                            <div class="modal-footer">
                                <input name="Psubmit" type="submit" class="btn btn-success">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>

                    </div>
                </div>
                </div>

    </div>
   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


</body>


</html>
