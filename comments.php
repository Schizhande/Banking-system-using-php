<?php
if ((isset($_SESSION['email']))||(isset($_SESSION['Staff_email']))){
  
    header('location:display.php');  
} 

?>

<?php
$emailErr = $messageErr = "";
$email = $message = "";

if (isset($_POST['submit'])) {
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }
    if (empty($_POST["message"])) {
        $messageErr = "Password is required";
    } else {
        $message = test_input($_POST["message"]);
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
            $message = $_POST['message'];            
            $email = $_POST['email'];            
            $sql = "INSERT INTO comments (message,email) VALUES ('$message','$email')";
            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('COMMENT SEND')</script>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            mysqli_close($conn);
        }
        ?>
<?php include 'header.php';?>
<div class="heading">COMMENTS PAGE</div>
<div class="container">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="jumbotron">                    
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <h3>WRITE YOUR COMMENTS</h3>
                    <div class="form-group">
                        <input type="email" class="form-control"  name="email" placeholder="Email address">
                        <span class="error"> <?php echo $emailErr; ?></span>
                    </div>
                    <div class="form-group">
                        <textarea  class="form-control" rows="15" cols="30" name="message" placeholder="Type your comments"></textarea>
                        <span class="error"> <?php echo $messageErr; ?></span>
                    </div>                            
                    <input type="submit"  name="submit" value="Submit" class="btn btn-success ">
                    <br>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php';?>
