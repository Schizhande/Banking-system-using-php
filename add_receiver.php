<?php
session_start();

if (!isset($_SESSION['email'])){
    header('location:index.php');
}
$name=$_SESSION['name'];
?>
<?php
$fnameErr = $snameErr = $branchErr =$account_noErr="";
$fname = $sname = $branch =$account_no= "";
if (isset($_POST['submit'])) {
    if (empty($_POST["fname"])) {
        $fnameErr = "Name is required";
    } else {
        $fname = test_input($_POST["fname"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $fname)) {
            $fnameErr = "Only letters and white space allowed";
        }
    }
    if (empty($_POST["sname"])) {
        $snameErr = "Last Name is required";
    } else {
        $sname = test_input($_POST["sname"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $sname)) {
            $snameErr = "Only letters and white space allowed";
        }
    }
    if (empty($_POST["branch"])) {
        $branchErr = "Enter branch";
    } else {
        $branch = test_input($_POST["branch"]);
    }
    if (empty($_POST["account_no"])) {
        $account_noErr = "Password is required";
    } else {
        if (!preg_match('/^[0-9]*$/', $account_no)) {
            $account_noErr = "Only digits are required";
        } else {
            $account_no = test_input($_POST["account_no"]);
        }
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<?php
include 'src/dbcon.php';
if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $sname = $_POST['sname'];
    $branch = $_POST['branch'];
    $account_no = $_POST['account_no'];
    $name=$_SESSION['name'];
    $sql = "INSERT into receiver (sender_name,receiver_account,receiver_name,receiver_surname,branch) VALUES ('$name','$account_no','$fname','$sname','$branch')";
    if ($conn->query($sql) === TRUE) {
       echo "<script>alert('New receiver added')</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    mysqli_close($conn);
}
?>
<?php include 'header.php' ?>

<form action='' method='post'>
    <h3>Add Receiver</h3>
    <table align="center">

        <tr><td>Payee First Name:</td>
            <td><input type='text' name='fname' required><span><?php echo $fnameErr ?></span></td>
        </tr>
        <tr><td>Payee Last Name:</td>
            <td><input type='text' name='sname' required><span><?php echo $snameErr ?></span></td>
        </tr>
        <tr><td>Account No: </td>
            <td><input type='text' name='account_no' required><span><?php echo $account_noErr ?></span></td>
        </tr>
        <tr><td>Select Branch:</td>
            <td><select name='branch' required>

                    <option value='HARARE'>HARARE</option>
                    <option value='BULAWAYO'>BULAWAYO</option>
                    <option value='MUTARE'>MUTARE</option>
                </select><span><?php echo $branchErr ?>;</span>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input type='submit' name='submit' value='Add Receiver'></td>
        </tr>
    </table>
</form>
<?php include 'footer.php' ?>;
