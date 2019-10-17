<?php
session_start();
if (empty($_SESSION["Admin_email"])) {
    header("location: admin_login.php");
}
?>
<?php

include 'src/dbcon.php';
$id=$_GET['delete'];
$sql = "DELETE FROM staff WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();

?>
