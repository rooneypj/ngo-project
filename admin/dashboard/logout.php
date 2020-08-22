<?php   
session_start(); 
session_destroy(); 
unset($_SESSION['admin']);
echo"<script>alert('Logout successfully');
        window.location.href = 'login.php';
        </script>";
exit();
?>