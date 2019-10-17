<?php
include 'src/dbcon.php';
session_start();
if (!isset($_SESSION['email'])) {
    header("location:login.php");
}
$name = $_SESSION['name'];
?>
<?php include 'header.php' ?>;
<h2 class="heading">The Balance Page</h2>
<div class="container cla" >
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <div class="jumbotron">
                <div class="balance">
                    <?php
                    $balance=$amount = 0.00;
                    $sql = "SELECT * FROM passbook WHERE user='$name'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            $amount=$row['debit']+$row['credit'];
                            $balance = $balance+$amount;
                        }
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                    ?>
                    <div align="center" class="bal">
                        <table>
                            <tr>
                                <th colspan="2"><h3> Hello <?php Print "$name" ?></h3></th>
                            </tr>
                            <tr>
                                <td><p>YOU ACCOUNT BALANCE IS:  $</p></td>
                                <td><p><?php echo $balance ?></p></td>
                            </tr>
                            <tr>
                                <td><a href="index.php" class="btn btn-primary" >Click Here to Go Back.</a></td>
                            </tr>
                        </table>            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>

