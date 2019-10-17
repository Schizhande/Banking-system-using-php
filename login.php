<?php
session_start();

if (isset($_SESSION['email']))
    header('location:index.php');
?>

<?php
$emailErr=$passErr="";
$email=$pass="";

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
if (isset($_POST['submit'])) {
    $email = $password = '';

    $email = $_POST['email'];
    $password = $_POST['pass'];


    $sql = "SELECT * FROM customers WHERE email='$email' AND password='$password'";

    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row["id"];
            $email = $row["email"];
            $name=$row["firstname"];
            session_start();
            $_SESSION['id'] = $id;
            $_SESSION['email'] = $email;
            $_SESSION['name']=$name;
        }
        header("Location: index.php");
    } else {
        echo "<script>alert('Invalid password or email')</script>";
    }
}
?>
<?php include 'header_un.php' ?>;
<div class="heading">Log In</div>
<div class="container">
    <div class="row">
        <div class="col-lg-7">
            <h1>Important Security Information</h1>
            <p>Are you banking online safely? Knowing how to protect yourself 
                when banking online ensures that your accounts, data and identity are kept safe from the wrong hands.
                Here are some key things you can do to ensure 
                your accounts and information remain in your hands and no one else's.
            </p>
            <h3>DO</h3>
            <ol>
                <li>always ensure that you access your online banking account directly via 
                    the Lloyds Bank website, and not 
                    through suspicious hyperlinks that don't come from Lloyds Bank.</li>
                <li>protect all your data and accounts with strong passwords that
                    have at least eight or more characters consisting
                    of alphabets and numbers and change them regularly.</li>
                <li>make sure that you always log out of your account and
                    close your browser window once you have finished using online banking.</li>
                <li>keep all your operating systems, browsers, apps, and virus & malware software up to date.</li>
            </ol>
            <h3>DON'T</h3>
            <ol>
                <li>perform any banking transactions over unsecured wireless networks or public computers.</li>
                <li>respond to any unsolicited communication requesting your personal financial information.</li>
            </ol>
        </div>


        <div id="backg">
            <div class="col-sm-5">
                <div class="jumbotron">                    
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <h3>Please sign in</h3>
                        <div class="form-group">
                            <input  class="form-control" id="email" name="email" placeholder="Email address">
                            <span class="error"> <?php echo $emailErr; ?>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="pwd" name="pass" placeholder="Password">
                            <span class="error"> <?php echo $passErr; ?>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox">
                                Remember me
                            </label>
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


