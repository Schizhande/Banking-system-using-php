<?php
session_start();
if (empty($_SESSION["Staff_email"])) {
    header("location: staff_login.php");
}
?>
<?php include 'Staff_header.php';?>
<div class="heading">COMMENTS PAGE</div>
<div class="container">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="jumbotron">                    
                <?php
                include 'src/dbcon.php';
                $sql = "SELECT * FROM comments";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    echo "<table border='0' width='70%'><tr><th>COMMENTS</th></tr>";
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>EMAIL:</td><td>" . $row["email"] . "</td>";
                        echo"<td>COMMENT:</td><td>" . $row["message"] . "</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<script>alert('0 results')</script>";
                }
                $conn->close();
                ?>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php';?>
