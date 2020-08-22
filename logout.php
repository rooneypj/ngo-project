<?php   
session_start(); 
session_destroy(); 
unset($_SESSION['user']);
echo"<script>alert('Logout successfully');
        window.location.href = 'index.php';
        </script>";
exit();
?>