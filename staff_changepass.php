<?php
session_start();
if (empty($_SESSION["Staff_email"])) {
    header("Location: staff_login.php");
}
?>

<?php
mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_select_db("bank") or die(mysql_error());
if ($_POST) {
    $opass = $_POST['opass'];
    $npass = $_POST['npass'];
    $cpass = $_POST['cpass'];

    $email = $_SESSION["Staff_email"];

    $oqr = mysql_query("SELECT password from staff WHERE email ='{$email}'") or die(mysql_error());
    $odata = mysql_fetch_row($oqr);

    if ($odata[0] == $opass) {
        if ($npass == $cpass) {
            $q = mysql_query("UPDATE staff SET password='{$npass}' WHERE email='{$email}'") or die(mysql_error());
            if ($q) {
                echo "<script>alert('password changed')</script>";
                header("Location: index.php");
            } else {
                echo "<script>alert('old password and new password not match')</script>";
            }
        }
    } else {
        echo "<script>alert('old password not match')</script>";
    }
}
?>
<?php include 'staff_header.php'?>;
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <table align="center">
        <tr>
            <td>Enter old password</td>
            <td><input type="password" name="opass" required=""/></td>
        </tr>
        <tr>
            <td>Enter new password</td>
            <td><input type="password" name="npass" required=""/></td>
        </tr>
        <tr>
            <td>Enter password again</td>
            <td><input type="password" name="cpass" required=""/></td>
        </tr></table>

    <table align="center"><tr>
            <td><input type="submit" name="submit" value="Change Password"/></td>
        </tr>
    </table>
</form>
<?php include 'footer.php' ?>