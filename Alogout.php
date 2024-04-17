<?php

session_start();

$_SESSION['status'] = 'invalid';

unset($_SESSION['ID']);
echo "<script>window.location.href = 'http://localhost/finals/Alogin.php'</script>";

?>