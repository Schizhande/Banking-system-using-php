<?php 
session_start();
session_destroy();
header('location:admin_nav.php');  
echo '<script>alert("LOG OUT SUCCESSFUL")</script>';
?>
