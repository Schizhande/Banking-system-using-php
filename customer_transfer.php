<?php
session_start();

if (!isset($_SESSION['email']))
    header('location:index.php');
?>
<?php include 'header.php' ?>
<div class='content_customer'>


    <div class="customer_top_nav">
        <div class="text">Welcome <?php echo $_SESSION['name'] ?></div>
    </div>
    <br><br><br><br>
    <h3 style="text-align:center;color:#2E4372;"><u>Transfer Funds</u></h3>


    <?php
    include '_inc/dbcon.php';
    $sender_id = $_SESSION["login_id"];


    $sql = "SELECT * FROM beneficiary1 WHERE sender_id='$sender_id' AND status='ACTIVE'";
    $result = mysql_query($sql);
    $rws = mysql_fetch_array($result);
    $s_id = $rws[1];
    ?>


    <?php
    if ($sender_id == $s_id) {
        echo "<form action='customer_transfer_process.php' method='POST'>";
        echo "<table align='center'>";
        echo "<tr><td>Select Beneficiary:</td><td> <select name='transfer'>";

        $sql1 = "SELECT * FROM beneficiary1 WHERE sender_id='$sender_id' AND status='ACTIVE'";
        $result = mysql_query($sql);

        while ($rws = mysql_fetch_array($result)) {
            echo "<option value='$rws[3]'>$rws[4]</option>";
        }

        echo "</td></tr></select>";

        echo "<tr><td>Enter Amount: </td><td><input type='number' name='t_val' required></td></table>";

        echo "<table align='center'><tr><td style='padding:5px;'><input type='submit' name='submitBtn' value='Transfer' class='addstaff_button'></td></tr></table></form>";
    } else {
        echo "<br><br><div class='head'><h3>No Benefeciary Added with your account.</h3></div>";
    }
    ?>
</div> 
    <?php include 'footer.php'; ?>