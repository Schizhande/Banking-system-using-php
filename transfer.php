<?php
session_start();
if (empty($_SESSION["email"])) {
    header("location: login.php");
}
?>

<?php
include 'src/dbcon.php';
if (isset($_POST['submit'])) {
    $name = "";
    $name = $_POST['name'];
    $balance = 0.00;
    $query = mysql_query("SELECT * from Passbook WHERE user='$name'");
    while ($row = mysql_fetch_array($query)) {
        $balance = $balance + $row['debit'] + $row['credit'];
    }
}
?>
<?php
if (isset($_POST['submit'])) {
    $amount = $_POST['amount'];


    if ($amount > $balance) {

        Print '<script>alert("You do not have sufficient Funds.");window.location.assign("balance.php")</script>';
        //exit("You have insufficient funds!");
        header("location: balance.php");
    }
    $date = "";
    $amount = (-$amount);
    $details = $_POST['details'];
    $name = $_POST['name'];
    $rname = $_POST['rname'];
    $num=$_POST['num'];
    $date = date("Y-m-d");

    $sql = "INSERT INTO passbook (details,credit,user,receiver_name,receiver_acc_no,date_transaction ) VALUES ('$details','$amount','$name','$rname','$num','$date')";
    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Transfer Successfully")</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    Print '<script>alert("Transfer Successful");window.location.assign("balance.php");</script>';
}
?>

<?php include 'header.php'; ?>
<h2 class="heading">TRANSFER PAGE</h2>
<div class="container cla" >
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <div class="jumbotron">       
                <form action="" method="POST">                 
                    <table border="0">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>ACCOUNT HOLDER'S NAME:</td>
                                <td><input type="text" class="form-control" name="name" required="required"/></td>
                            </tr>
                            <tr>
                                <td>RECEIVER'S NAME:</td>
                                <td><input type="text" class="form-control" name="rname" required="required"/></td>
                            </tr>
                            <tr>
                                <td>RECEIVER'S ACCOUNT:</td>
                                <td><input type="number" class="form-control" name="num" required="required"/></td>
                            </tr>
                            <tr>
                                <td>AMOUNT:</td>
                                <td><input type="number" class="form-control" name="amount" required="required" /></td>
                            </tr>
                            <tr>
                                <td>ADD SOME DETAILS</td>
                                <td><input type="text" class="form-control" name="details"/></td>
                            </tr>
                            <tr>            
                                <td colspan="2"><p>Please don't transfer more than customer's balance.</p></td>
                            </tr>
                            <tr>
                                <td><input type="submit" class="btn btn-success"  name="submit" value="TRANSFER"/></td>
                                <td> <a href="index.php" class="btn btn-primary">Click Here to Go Back.</a></td>
                            </tr>
                        </tbody>
                    </table>
                </form>                
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>