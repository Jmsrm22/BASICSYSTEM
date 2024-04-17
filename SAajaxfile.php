

<?php
include "connection.php";

$id = $_POST['id'];

$sql = "SELECT * FROM `admin` WHERE `ID` = '".$id."'";
$result = mysqli_query($con,$sql);
while( $row = mysqli_fetch_array($result) ){
?>
	

<head>
    <link rel="stylesheet" href="design.css">
</head>


	 <div class="inputBoxModal mb-3"> 
        <input type="text" name="Pbdnumber" id="bdnumber" class="input" disabled value="<?php echo $row['fname']; echo' '; echo $row['lname'];?>">
        <span>Full Name</span>
     </div>

     <div class="inputBoxModal mb-3"> 
        <input type="text" name="Pbdnumber" id="bdnumber" class="input" disabled value="<?php echo $row['email'];?>">
        <span>Email</span>
     </div>

     <div class="inputBoxModal mb-3"> 
        <input type="text" name="Pbdnumber" id="bdnumber" class="input" disabled value="<?php echo $row['username'];?>">
        <span>Username</span>
     </div>


    <div class="modal-footer">
        <button data-id='<?php echo $id;?>' class="deleteinfo btn btn-success">Delete Account</button> 
        <button class="btn btn-dark" data-bs-dismiss="modal">Back</button>                                      
    </div>

<?php 

}


?>

    <script type='text/javascript'>

    $(document).ready(function(){
        $('.deleteinfo').click(function(){
            var id = $(this).data('id');

            $.ajax({
                url: 'SAdelete.php',
                type: 'post',
                data: {id: id,},
                success: function(response){ 
                    alert("Admin Delete Success!");
                    location.reload(); 
                }
            });


        });
    });

    </script>

