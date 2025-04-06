<?php
session_start();
unset($_SESSION['fname']); // unset session variable
session_destroy(); // destroy session
echo '<script>window.location.href="login.php"</script>';
?>