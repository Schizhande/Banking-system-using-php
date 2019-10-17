<?php
session_start();

if (isset($_SESSION['Admin_email']))
    header('location:admin_header.php');
?>
<?php
$emailErr = $passErr = "";
$email = $pass = "";

if (isset($_POST['submit'])) {
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
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
if (!isset($_SESSION['Admin_email'])) {
    if (isset($_POST['submit'])) {
        $email = $password = '';

        $email = $_POST['email'];
        $password = $_POST['pass'];


        $sql = "SELECT * FROM admin WHERE email='$email' AND password='$password'";

        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row["id"];
                $email = $row["email"];
                session_start();
                $_SESSION['id'] = $id;
                $_SESSION['Admin_email'] = $email;
            }
            header("Location:admin_header.php");
        } else {
            echo "<script>alert('Invalid password or email')</script>";
        }
    }
}
?>
<?php include 'admin_nav.php' ?>;
<div class="heading">Log In</div>
<div class="container">
    <div class="row">
        <div class="col-lg-3"></div>
        <div id="backg">
            <div class="col-sm-5">
                <div class="jumbotron">                    
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <h3>Please sign in</h3>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email address">
                            <span class="error"> <?php echo $emailErr; ?></span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="pwd" name="pass" placeholder="Password">
                            <span class="error"> <?php echo $passErr; ?></span>
                        </div>                        
                        <input type="submit"  name="submit" value="Submit" class="form-control btn btn-success ">
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php' ?>;


