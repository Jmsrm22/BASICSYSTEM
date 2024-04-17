<?php

session_start();

	if($_SESSION['SAstatus'] == 'invalid' || empty($_SESSION['SAstatus'])){
        $_SESSION['SAstatus'] = 'invalid';

		unset($_SESSION['ID']);
		echo "<script>window.location.href = 'http://localhost/finals/Sadmin.php'</script>";
	}

?>