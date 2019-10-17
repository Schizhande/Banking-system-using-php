<?php
session_start();
if (empty($_SESSION["Admin_email"])) {
    header("location: admin_login.php");
}
?>
<?php
include 'admin_nav.php';
?>
<?php
$conn = mysql_connect("localhost", "root", "");
$db = mysql_select_db("bank", $conn);
?>
<?php
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $res = mysql_query("SELECT * FROM customers WHERE id='$id'");
    $rws = mysql_fetch_array($res);
}
include 'src/dbcon.php';
if (isset($_POST['fname']) && isset($_POST['sname']) && isset($_POST['national']) && isset($_POST['email']) && isset($_POST['mobile']) && isset($_POST['dob']) && isset($_POST['accountType']) && isset($_POST['employer']) && isset($_POST['address']) && isset($_POST['gender']) && isset($_POST['city']) && isset($_POST['date'])) {
$fname = $sname = $email = $gender = $mobile = $address  = $national = $employer = $dob = $city = $accountType = $date= "";
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $sname = $_POST['sname'];
    $national = $_POST['national'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $dob = $_POST['dob'];
    $accountType = $_POST['accountType'];
    $employer = $_POST['employer'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];
    $date = $_POST['date'];   
    $sql = "UPDATE customers SET firstname='$fname',lastname='$sname',national='$national',email='$email',mobile='$mobile',dob='$dob',accountType='$accountType',employer='$employer',address='$address',gender='$gender',city='$city',date='$date' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Details updated')</script>";
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
     $conn->close();
    }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8 jumbotron">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <table align="center" border="0" >
                        <tr><td><input type="hidden" name="id" value="<?php echo $rws[0]; ?>" /></td></tr>
                        <tr>
                            <td>FIRST NAME:</td>
                            <td><input type="text" class="form-control" name="fname" value="<?php echo $rws[1]; ?>" required=""/></td>
                        </tr>
                        <tr>
                            <td>LAST NAME:</td>
                            <td><input type="text"  class="form-control" name="sname" value="<?php echo $rws[2]; ?>" required=""/></td>
                        </tr>
                        <tr>
                            <td>NATIONAL ID:</td>
                            <td><input type="text"  class="form-control" name="national" value="<?php echo $rws[3]; ?>" required=""/></td>
                        </tr>
                        <tr>
                            <td>EMAIL:</td>
                            <td><input type="email"  class="form-control" name="email" value="<?php echo $rws[4]; ?>" required=""/></td>
                        </tr>                       
                        <tr>
                            <td>MOBILE:</td>
                            <td><input type="text"  class="form-control" name="mobile" value="<?php echo $rws[5]; ?>" required=""/></td>
                        </tr>
                        <tr>
                            <td>DATE OF BIRTH</td>
                            <td>
                                <input type="text"  class="form-control" name="dob" value="<?php echo $rws[6]; ?>" required="" />
                            </td>
                        </tr>
                        <tr>
                            <td>ACCOUNT TYPE:</td>
                            <td>
                                <select name="accountType">
                                    <option <?php if ($rws[7] == "saving") echo "selected"; ?>>Savings Account</option>
                                    <option <?php if ($rws[7] == "current") echo "selected"; ?>>Current Account</option>                   
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>EMPLOYER:</td>
                            <td><input type="text" class="form-control"  name="employer" value="<?php echo $rws[8]; ?>" required=""/></td>
                        </tr>
                        <tr>
                            <td>ADDRESS:</td>
                            <td><textarea  class="form-control"  name="address"><?php echo $rws[9]; ?></textarea></td>
                        </tr>
                        <tr>
                            <td>GENDER:</td>
                            <td>
                                M<input type="radio" name="gender" value="M" <?php if ($rws[10] == "M") echo "checked"; ?>/>
                                F<input type="radio" name="gender" value="F" <?php if ($rws[10] == "F") echo "checked"; ?>/>
                            </td>
                        </tr>
                        <tr>
                            <td>CITY:</td>
                            <td><input type="text"  class="form-control" name="city" value="<?php echo $rws[11]; ?>" required=""/></td>
                        </tr>
                        <tr>
                            <td>DATE:</td>
                            <td><input type="text"  class="form-control"  name="date" value="<?php echo $rws[12]; ?>" required=""/></td>
                    </tr>                          
                    <tr>
                        <td></td>
                        <td><input  class="btn btn-success"  type="submit" name="submit" value="UPDATE DATA"/></td>
                    </tr>
                </table>
            </form>           
        </div>
    </div>
</div>