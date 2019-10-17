<?php
session_start();
if (empty($_SESSION["email"])) {
    header("location: login.php");
}
?>
<?php
include 'header.php';
include 'src/dbcon.php';
?>
<?php
$email="";
$email=$_SESSION['email'];
$sql = "SELECT id, firstname, lastname,national,email,mobile,dob,accountType,branch,address,gender,city,date,account_no,password FROM customers WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

echo "<table class='table'><caption class='heading'>CUSTOMER PROFILE</caption>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
    echo "<tr><th>FIRST NAME:</th><td>".$row["firstname"]."</td><th>Surname:</th><td>".$row["lastname"]."</td></tr>";
    echo "<tr><th>NATIONAL ID:</th><td>".$row["national"]."</td><th>EMAIL:</th><td>".$row["email"]."</td></tr>";
    echo "<tr><th>MOBILE:</th><td>".$row["mobile"]."</td><th>DATE OF BIRTH:</th><td>".$row["dob"]."</td></tr>";
    echo "<tr><th>ACCOUNT TYPE:</th><td>".$row["accountType"]."</td><th>BRANCH:</th><td>".$row["branch"]."</td></tr>";
    echo "<tr><th>ADDRESS:</th><td>".$row["address"]."</td><th>GENDER:</th><td>".$row["gender"]."</td></tr>";
    echo "<tr><th>CITY</th><td>".$row["city"]."</td><th>REGISTRATION DATE:</th><td>".$row["date"]."</td></tr>";
    echo "<tr><th>PASSWORD</th><td>".$row["password"]."</td><th>ACCOUNT NO:</th><td>".$row["account_no"]."</td></tr>";
  
    
    
    }
    echo "</table>";
    echo "<a class='btn btn-primary' href='customer_changepass.php'>CHANDE PASSWORD</a>";
} else {
echo "0 results";
}
$conn->close();

?>
<?php include 'footer.php'; ?>