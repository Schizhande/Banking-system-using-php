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
$sql = "SELECT id, firstname, lastname,national,email,mobile,dob,department,address,gender,city,date,password FROM staff";
$result = $conn->query($sql);
?>
<form action="." method="POST">
    <?php
    if ($result->num_rows > 0) {

    echo "<table class='table'><caption class='heading'>STAFFS</caption><tr><th>ID:</th><th>FIRST NAME:</th><th>Surname:</th><th>NATIONAL ID:</th><th>EMAIL:</th>";
        echo "<th>MOBILE:</th><th>DATE OF BIRTH:</th><th>DEPARTMENT:</th><th>GENDER:</th><th>CITY</th><th>REGISTRATION DATE:</th>";
        echo "<th>PASSWORD</th><th>ACTION</th><th>ACTION</th></tr>";
        ;
        // output data of each row
        while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td>";
            echo "<td>" . $row["firstname"] . "</td><td>" . $row["lastname"] . "</td>";
            echo "<td>" . $row["national"] . "</td><td>" . $row["email"] . "</td>";
            echo "<td>" . $row["mobile"] . "</td><td>" . $row["dob"] . "</td>";
            echo "<td>" . $row["department"] . "</td>";
            echo "<td>" . $row["gender"] . "</td><td>" . $row["city"] . "</td>";
            echo "<td>" . $row["date"] . "</td><td>" . $row["password"] . "</td>";
            echo "<td> <a class='btn btn-success' href='edit_staff.php?edit=$row[id]'>EDIT</a>";
            echo "<td> <a class='btn btn-danger' href='delete_staff.php?delete=$row[id]'>DELETE</a></tr>";
        }
        echo "</table>";
    } else {
    echo "0 results";
    }
    $conn->close();
    ?>
</form>  
<?php include 'footer.php'; ?>