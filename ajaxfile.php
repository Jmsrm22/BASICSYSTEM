

<?php
include "connection.php";

session_start();

$pid = $_POST['pid'];
$admin = $_POST['admin'];


$sql = "SELECT * FROM `passenger_driver` WHERE `PID` = '".$pid."'";
$result = mysqli_query($con,$sql);
while( $row = mysqli_fetch_array($result) ){
?>
	

<head>
    <link rel="stylesheet" href="design.css">
</head>


	 <div class="inputBoxModal mb-3"> 
        <input type="number" name="Pbdnumber" id="bdnumber" class="input" disabled value="<?php echo $row['Pbdnumber']; ?>">
        <span>Body Number of the Alleged Wrongdoer.</span>
     </div>

	<div class="inputBoxModal mb-3"> 
        <textarea type="text" name="Pcomplaint" id="textarea" class="input" disabled style="height: 200px; min-height: 200px; max-height:200px "><?php echo $row['Pcomplaint']; ?></textarea>
        <span>Complaint</span>
    </div>

    <div class="modal-footer">
        <button data-another='<?php echo $admin?>' data-id='<?php echo $row['PID'];?>' class="deleteinfo btn btn-success">Solve</button> 
        <button class="btn btn-dark" data-bs-dismiss="modal">Back</button>                                      
    </div>

<?php 

}


?>

    <script type='text/javascript'>

    $(document).ready(function(){
        $('.deleteinfo').click(function(){
            var pid = $(this).data('id');
            var admin = $(this).data('another');

            $.ajax({
                url: 'delete.php',
                type: 'post',
                data: {pid: pid, admin: admin},
                success: function(response){ 
                    alert("This Case is Solve.");
                    location.reload(); 
                }
            });


        });
    });

    </script>

