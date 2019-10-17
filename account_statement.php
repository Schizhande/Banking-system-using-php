<?php
session_start();
if (empty($_SESSION["email"])) {
    header("location: login.php");
}
$name=$_SESSION['name'];
?>
<?php
include 'header.php';
include 'src/dbcon.php';
?>

<?php
$sql = "SELECT * FROM passbook WHERE user='$name'";
$balance="";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
     echo "<h2 class='heading'>ACCOUNT STATEMENT</h2>";
    echo "<table border='1' class='table'><tr><th>ID</th><th>DETAILS</th><th>CREDIT</th><th>DEBIT</th><th>RECEIVER NAME</th><th>TRANSACTION DATE</th><th>BALANCE</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td>";
        echo "<td>".$row["details"]."</td>";
        echo "<td>".$row["credit"]."</td>";
        echo "<td>".$row["debit"]."</td>";
        echo "<td>".$row["receiver_name"]."</td>";
        echo "<td>".$row["date_transaction"]."</td>"; 
        $amount=$row['debit']+$row['credit'];
        $balance = $balance+$amount;
    }
    echo '<td> '.$balance.'</td></tr>';
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>
<?php include 'footer.php'; ?>
