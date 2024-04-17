

<?php
include "connection.php";
require ('session.php');

$did = $_POST['did'];
$admin = $_POST['admin'];


$sql = "SELECT * FROM `driver_driver` WHERE `DID` = '".$did."'";
$result = mysqli_query($con,$sql);
while( $row = mysqli_fetch_array($result) ){
?>
	

<head>
    <link rel="stylesheet" href="design.css">
</head>
    
    <div class="inputBoxModal mb-3"> 
        <input type="number" name="DYbdnumber" id="bdnumber" class="input" disabled value="<?php echo $row['DYbdnumber']; ?>">
        <span>Complainant Body Number</span>
     </div>

	 <div class="inputBoxModal mb-3"> 
        <input type="number" name="Pbdnumber" id="bdnumber" class="input" disabled value="<?php echo $row['Dbdnumber']; ?>">
        <span>Body Number of the Alleged Wrongdoer.</span>
     </div>

	<div class="inputBoxModal mb-3"> 
        <textarea type="text" name="Pcomplaint" id="textarea" class="input" disabled style="height: 200px; min-height: 200px; max-height:200px "><?php echo $row['Dcomplaint']; ?></textarea>
        <span>Complaint</span>
    </div>

    <div class="modal-footer">
        <button data-another='<?php echo $admin?>' data-id='<?php echo $row['DID'];?>' class="deleteinfo btn btn-success">Solve</button> 
        <button class="btn btn-dark" data-bs-dismiss="modal">Back</button>                                      
    </div>

<?php 

}


?>

    <script type='text/javascript'>

    $(document).ready(function(){
        $('.deleteinfo').click(function(){
            var did = $(this).data('id');
            var admin = $(this).data('another');

            $.ajax({
                url: 'DRdelete.php',
                type: 'post',
                data: {did: did, admin: admin},
                success: function(response){ 
                    alert("This Case is Solve.");
                    location.reload(); 
                }
            });


        });
    });

    </script>

