<?php
session_start();
if (empty($_SESSION['Staff_email'])) {
    header("location:staff_login.php");
}
?>
<?php
include 'src/dbcon.php';
if (isset($_POST['submit'])) {
    $name = $amount = $details = "";
    $amount = $_POST['amount'];
    $details = $_POST['details'];
    $name = $_POST['name'];

    $date = date("Y-m-d");

    $sql = "INSERT INTO passbook (details,debit,user,date_transaction ) VALUES ('$details','$amount','$name','$date')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    Print '<script>alert("Successful Deposit Made.");window.location.assign("deposit.php");</script>';
}
?>
<?php include 'staff_header.php' ?>;
<div class="container">
    <h2 class="heading">The Deposit Page</h2>
    <div class="row">   
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <div class="jumbotron">    
                <br/><br/>
                <form action="" method="POST">
                    <table border="0" align="center">

                        <thead>
                            <tr>
                                <th></th>
                                <th><a href="index.php" class="btn btn-primary">Click Here to Go Back.</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>ACCOUNT HOLDER'S NAME:</td>
                                <td><input type="text" class="form-control" name="name" required="required"/></td>
                            </tr>
                            <tr>
                                <td> AMOUNT:</td>
                                <td><input type="number" class="form-control" name="amount" required="required"/></td>
                            </tr>
                            <tr>
                                <td>ADD SOME DETAILS:</td>
                                <td><input type="text" class="form-control" name="details"/></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>    <input type="submit"  name="submit" class="btn btn-success" value="Deposit Money"/></td>
                            </tr>
                        </tbody>
                    </table>    
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php' ?>;
