<?php
include "connection.php";

$admin = $_POST['admin'];


$sql = "SELECT * FROM `admin` WHERE `ID` = '".$admin."'";
$result = mysqli_query($con,$sql);
while( $row = mysqli_fetch_array($result) ){
?>
	

<head>
    <link rel="stylesheet" href="design.css">
</head>

<form method="post">
    <div class="inputBoxModal mb-3"> 
        <input type="text" name="fname" id="fname" class="input" required="required">
        <span>First Name</span>
     </div>

     <div class="inputBoxModal mb-3"> 
        <input type="text" name="lname" id="lname" class="input" required="required">
        <span>Last Name</span>
     </div>

     <div class="inputBoxModal mb-3"> 
        <input type="text" name="email" id="email" class="input" required="required">
        <span>Email</span>
     </div>

     <div class="inputBoxModal mb-3"> 
        <input type="text" name="username" id="username" class="input"required="required">
        <span>Username</span>
     </div>

     <div class="inputBoxModal mb-3"> 
        <input type="text" name="password" id="password" class="input" required="required">
        <span>Password</span>
     </div>


      <div class="modal-footer">
        <input type="submit" name="submit" id="myButton" class="btn btn-success" value="Update Account">

        <button type="button" id="myDeleteButton" class="admindelete btn btn-dark" data-id='<?php echo $admin?>' style="width: 138px;">
           Delete Account
        </button>             
    </div>

</form>


<?php 

}


?>
    

    <label >


    <script type='text/javascript'>

    $(document).ready(function() {
    $('#myButton').click(function(event) {
        
        event.preventDefault();

        var admin = <?php echo json_encode($admin); ?>;
        var username = $('#username').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var fname = $('#fname').val();
        var lname = $('#lname').val();

         if (!username || !email || !password || !fname || !lname) {
            alert('Please fill in all the fields.');
            return; 
        }


        var data = {
            admin: admin,
            username: username,
            email: email,
            password: password,
            fname: fname,
            lname: lname
        };

        $.ajax({
            url: 'DOupdate.php', 
            type: 'post',
            data: data,
            success: function(response) {
                alert(response);
                location.reload(); 
            }
        });
    });
});



            $(document).ready(function(){
                $('.admindelete').click(function(){
                    var admin = $(this).data('id');
                    
                     var confirmation = confirm('Are you sure you want to delete this account?');

                     if (confirmation) {

                    $.ajax({
                        url: 'deleteacc.php',
                        type: 'post',
                        data: {admin: admin},
                        dataType: 'json',
                        success: function(response){

                            if (response.status === 'success') {
                                alert('Account deleted successfully');
                                window.location.href = 'Alogin.php';
                                } else {
                                    alert('Account deletion failed');
                                }


                        }
                    });


                    } else {
                            // No Action
                        }

                });
            });

         


    </script>

