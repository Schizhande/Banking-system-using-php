<?php
session_start();

if (!isset($_SESSION['email']))
    header('location:login.php');
?>

<?php

include 'src/dbcon.php';
$id=$_GET['delete'];
$sql = "DELETE FROM receiver WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();

?>
