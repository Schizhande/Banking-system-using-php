<?php
session_start();
if (empty($_SESSION["Admin_email"])) {
    header("location: admin_login.php");
}
?>
<?php include 'admin_nav.php' ?>;
<?php
// define variables and set to empty values
$nameErr = $emailErr = $snameErr = $genderErr = $addressErr = $mobileErr = $passErr = $IDErr = $departErr = $cityErr = $confirm_password_err = $employerErr = $dateErr = $birthErr = "";
$fname = $sname = $email = $gender = $mobile = $address = $pass = $ID = $birth = $city = $depart = $date = $confirm_password = "";
if (isset($_POST['submit'])) {
    if (empty($_POST["fname"])) {
        $nameErr = "Name is required";
    } else {
        $fname = test_input($_POST["fname"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $fname)) {
            $nameErr = "Only letters and white space allowed";
        }
    }
    if (empty($_POST["sname"])) {
        $snameErr = "Name is required";
    } else {
        $sname = test_input($_POST["sname"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $sname)) {
            $snameErr = "Only letters and white space allowed";
        }
    }
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }
    if (empty($_POST["mobile"])) {
        $mobileErr = "Mobile is required";
    } else {
        if (!preg_match('/^[0-9]*$/', $mobile)) {
            $mobileErr = "Only digits are required";
        } else {
            $mobile = test_input($_POST["mobile"]);
        }
    }
    if (empty($_POST["ID"])) {
        $IDErr = "Enter National ID";
    } else {
        $ID = test_input($_POST["ID"]);
    }
    if (empty($_POST["date"])) {
        $dateErr = "Enter Today's date";
    } else {
        $date = test_input($_POST["date"]);
    }
    if (empty($_POST["address"])) {
        $addressErr = "Enter address";
    } else {
        $address = test_input($_POST["address"]);
    }
    if (empty($_POST["city"])) {
        $cityErr = "Enter city";
    } else {
        $city = test_input($_POST["city"]);
    }

    if (empty($_POST["depart"])) {
        $departErr = "Select account type";
    } else {
        $depart= test_input($_POST["depart"]);
    }

    if (empty($_POST["birth"])) {
        $birthErr = "Enter your date of birth";
    } else {
        $birth = test_input($_POST["birth"]);
    }
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = test_input($_POST["gender"]);
    }
    if (empty($_POST["pass"])) {
        $passErr = "Password is required";
    } else {
        if (!preg_match('/^[0-9]*$/', $pass)) {
            $passErr = "Only digits are required";
        } else {
            $pass = test_input($_POST["pass"]);
        }
    }
    if (empty($_POST["confirm_password"])) {
        $confirm_password_err = 'Please confirm password.';
    } else {
        $confirm_password = test_input($_POST['confirm_password']);
        if ($pass != $confirm_password) {
            $confirm_password_err = 'Password did not match.';
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
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $pass = $_POST['pass'];
    $ID = $_POST['ID'];    
    $birth = $_POST['birth'];
    $city = $_POST['city'];
    $depart = $_POST['depart'];
    $date = $_POST['date'];
    $date=date("Y-m-d");
    $sql = "INSERT INTO staff (firstname,lastname,national,email,mobile,dob,department,address,gender,city,date,password) VALUES ('$fname','$sname','$ID','$email','$mobile','$birth','$depart','$address','$gender','$city','$date','$pass')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
   mysqli_close($conn);
}
?>
<div class="heading">REGISTRATION</div>
<div class="container">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8 jumbotron">
            <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <table width="100%"  class="log">
                    <tr>
                        <th colspan="2"><h3>REGISTRATION</h3></th>
                    </tr>
                    <tr>
                        <td id="lab" >FIRST NAME:</td>
                        <td><input type="text"  maxlength="20" class="form-control" name="fname"><span class="error"><?php echo $nameErr; ?></span></td>
                    </tr>            
                    <tr>
                        <td id="lab">LAST NAME:</td>
                        <td><input type="text"  maxlength="20" class="form-control" name="sname"><span class="error"><?php echo $snameErr; ?></span></td>
                    </tr>
                    <tr>
                        <td id="lab">NATIONAL ID:</td>
                        <td><input type="text" maxlength="20" name="ID" class="form-control" placeholder="07-22222Y-07"><span class="error"><?php echo $IDErr; ?></span></td>			
                    </tr>
                    <tr>
                        <td id="lab">EMAIL:</td>
                        <td><input type="email" name="email" value="" class="form-control" placeholder="example@gmail.com"><span class="error"> <?php echo $emailErr; ?></span></td>
                    </tr>                            
                    <tr>
                        <td id="lab">MOBILE:</td>
                        <td><input type="text"  maxlength="10" class="form-control" name="mobile" placeholder="07********"><span class="error"> <?php echo $mobileErr; ?></span></td>
                    </tr>          
                    <tr>
                        <td id="lab">DATE OF BIRTH</td>
                        <td><input type="text"  maxlength="10"  class="form-control" name="birth" placeholder="dd-mm-yy"><span class="error"> <?php echo $birthErr; ?></span></td>
                    </tr>        
                    <tr>
                        <td id="lab">DEPARTMENT:</td>
                        <td id="lab"><select name="depart">
                                <option value="Finance">FINANCE DEPARTMENT</option>
                                <option value="HR">HUMAN RESOURSE</option>
                            </select> <span class="error"><?php echo $departErr; ?></span>
                        </td>
                    </tr>  
                    
                    <tr>
                        <td id="lab">ADDRESS:</td>
                        <td><textarea rows="5" cols="25" name="address" class="form-control" maxlength="100"></textarea><span class="error"> <?php echo $addressErr; ?></span>
                        </td>
                    </tr>                
                    <tr>
                        <td id="lab">GENDER:</td>
                        <td id="lab"><input type="radio" name="gender" <?php if (isset($gender) && $gender == "female") echo "checked"; ?> value="female">Female
                            <input type="radio" name="gender" <?php if (isset($gender) && $gender == "male") echo "checked"; ?> value="male" checked>Male
                            <span class="error"><?php echo $genderErr; ?></span></td>
                    </tr>                    
                    <tr>
                        <td id="lab">CITY:</td>
                        <td id="lab">
                            <input type="text" name="city" value="" class="form-control"><span class="error"><?php echo $cityErr; ?></span>
                        </td>
                    </tr>                    
                    <tr>
                        <td id="lab">DATE:</td>
                        <td><input type="text" name="date" value="" class="form-control" placeholder="yy-mm-dd"><span class="error"> <?php echo $dateErr; ?></span></td>
                    </tr>                   
                    <tr>
                        <td id="lab">PASSWORD:</td>
                        <td><input type="password" class="form-control" maxlength="10" name="pass"><span class="error"> <?php echo $passErr; ?></span></td>			
                    </tr> 
                    <tr>
                        <td></td>
                        <td><input type="submit"  name="submit" value="Submit" class="form-control btn btn-success ">
                    </tr>
                </table>
            </form>            
        </div>
    </div>
</div>

<?php include 'footer.php' ?>;