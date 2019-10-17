<?php 
session_start();
session_destroy();
header('location:staff_nav.php');
echo '<script>alert("LOG OUT SUCCESSFUL")</script>';
?>
