<?php

session_start();

$_SESSION['SAstatus'] = 'invalid';

unset($_SESSION['SID']);
echo "<script>window.location.href = 'http://localhost/finals/Sadmin.php'</script>";

?>