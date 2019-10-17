<?php 
session_start();
session_destroy();
header('location:login.php');
echo '<script>alert("LOG OUT SUCCESSFUL")</script>';
?>
