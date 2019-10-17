<?php
session_start();
if (empty($_SESSION["Admin_email"])) {
    header("location: admin_login.php");
}
?>
<?php
include 'admin_nav.php';
include 'src/dbcon.php';
?>
<?php
$sql = "SELECT id, firstname, lastname,national,email,mobile,dob,accountType,branch,address,gender,city,date,account_no,password FROM customers";
$result = $conn->query($sql);
?>
<form action="." method="POST">
    <?php
    if ($result->num_rows > 0) {

    echo "<table class='table'><caption class='heading'>CUSTOMERS</caption><tr><th>ID:</th><th>FIRST NAME:</th><th>Surname:</th><th>NATIONAL ID:</th><th>EMAIL:</th>";
        echo "<th>MOBILE:</th><th>DATE OF BIRTH:</th><th>ACCOUNT TYPE:</th><th>BRANCH</th><th>GENDER:</th><th>CITY</th><th>REGISTRATION DATE:</th>";
        echo "<th>PASSWORD</th><th>ACCOUNT NO</th><th>ACTION</th><th>ACTION</th></tr>";
        ;
        // output data of each row
        while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td>";
            echo "<td>" . $row["firstname"] . "</td><td>" . $row["lastname"] . "</td>";
            echo "<td>" . $row["national"] . "</td><td>" . $row["email"] . "</td>";
            echo "<td>" . $row["mobile"] . "</td><td>" . $row["dob"] . "</td>";
            echo "<td>" . $row["accountType"] . "</td><td>" . $row["branch"] . "</td>";
            echo "<td>" . $row["gender"] . "</td><td>" . $row["city"] . "</td>";
            echo "<td>" . $row["date"] . "</td><td>" . $row["password"] . "</td>";
            echo "<td>" . $row["account_no"]. "</td>";
            echo "<td> <a class='btn btn-success' href='edit.php?edit=$row[id]'>EDIT</a>";
            echo "<td> <a class='btn btn-danger' href='delete_customer.php?delete=$row[id]'>DELETE</a></tr>";
        }
        echo "</table>";
    } else {
    echo "<script>alert('0 results')</script>";
    }
    $conn->close();
    ?>
</form>  
<?php include 'footer.php'; ?>