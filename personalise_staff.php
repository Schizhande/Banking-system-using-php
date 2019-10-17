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
$email="";
$email=$_SESSION['Staff_email'];
$sql = "SELECT id, firstname, lastname,national,email,mobile,dob,department,address,gender,city,date,password FROM staff WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

echo "<table class='table'><caption class='heading'>STAFF PROFILE</caption>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
    echo "<tr><th>FIRST NAME:</th><td>".$row["firstname"]."</td><th>Surname:</th><td>".$row["lastname"]."</td></tr>";
    echo "<tr><th>NATIONAL ID:</th><td>".$row["national"]."</td><th>EMAIL:</th><td>".$row["email"]."</td></tr>";
    echo "<tr><th>MOBILE:</th><td>".$row["mobile"]."</td><th>DATE OF BIRTH:</th><td>".$row["dob"]."</td></tr>";
    echo "<tr><th>DEPARTMENT:</th><td>".$row["department"]."</td><th>ADDRESS:</th><td>".$row["address"]."</td></tr>";
    echo "<tr><th>GENDER:</th><td>".$row["gender"]."</td><th>CITY</th><td>".$row["city"]."</td></tr>";
    echo "<tr><th>REGISTRATION DATE:</th><td>".$row["date"]."</td><th>PASSWORD</th><td>".$row["password"]."</td></tr>";
    
    }
    echo "</table>";
    echo "<a class='btn btn-primary' href='staff_changepass.php'>CHANDE PASSWORD</a>";
} else {
echo "0 results";
}
$conn->close();

?>
<?php include 'footer.php'; ?>