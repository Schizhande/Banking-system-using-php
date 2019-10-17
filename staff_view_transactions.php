<?php
session_start();
if (empty($_SESSION["Staff_email"])) {
    header("location: staff_login.php");
}
?>
<?php
include 'staff_header.php';
include 'src/dbcon.php';
?>

<?php
$sql = "SELECT * FROM passbook";
$balance="";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
     echo "<h2 class='heading'>ACCOUNT STATEMENT</h2>";
    echo "<table border='1' class='table'><tr><th>ID</th><th>DETAILS</th><th>CREDIT</th><th>DEBIT</th><th>RECEIVER NAME</th><th>TRANSACTION DATE</th><th>BANK BALANCE</th></tr>";
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
    echo "<script>alert('no transactions')</script>";
    header("Location:staff_nav.php");
}
$conn->close();
?>
<?php include 'footer.php'; ?>
