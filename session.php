<?php

session_start();

	if($_SESSION['status'] == 'invalid' || empty($_SESSION['status'])){
        $_SESSION['status'] = 'invalid';

		unset($_SESSION['ID']);
		echo "<script>window.location.href = 'http://localhost/finals/Alogin.php'</script>";
	}

?>