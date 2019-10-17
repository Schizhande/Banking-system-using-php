<?php
session_start();

if (!isset($_SESSION['email'])){
    header('location:index.php');
}
$name=$_SESSION['name'];
?>
<?php
include 'src/dbcon.php';
include 'header.php';

$sql = "SELECT * From receiver WHERE sender_name='$name'"; 

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<table border='1' class='table'><tr><th>ID</th><th>NAME</th><th>SURNAME</th><th>ACCOUNT NO</th><th>BRANCH</th><th>ACTION</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["receiver_name"]."</td><td> ".$row["receiver_surname"]."</td><td>".$row["receiver_account"]."</td><td>".$row["branch"]."</td><td> <a class='btn btn-danger' href='delete_receiver.php?delete=$row[id]'>DELETE</a></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();

?>
<?php include 'footer.php';
