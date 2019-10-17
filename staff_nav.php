<!DOCTYPE html>
<html>
    <head>
        <title>LLOYDS BANK</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link type="text/css" rel="stylesheet" href="style.css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/animate.min.css" rel="stylesheet">
        <link href="css/font-awesome.css" rel="stylesheet">
        <link href="fonts/glyphicons-halflings-regular.svg" rel="stylesheet">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link href="css/bootstrap-dropdownhover.min.css" rel="stylesheet">
        <script src="jquery.min.js"></script>
        <script src="js/bootstrap-dropdownhover.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body id="body">
        <div class="header container-fluid">
            <img src="image/log.png" alt="logo">
            <marquee behavior="alternate" loop="-6" scrollamount="10" width="50%">
                <img src="image/donkey.jpg" width="94" height="88" alt="Swimming fish" /> <i>WELCOME TO LLOYDS BANK<br> Enjoy easy banking for every people</i></marquee> 
            <div id="social">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-google-plus"></i></a>
                <a href="#"><i class="fa fa-youtube"></i></a>
            </div>
        </div>
        <div class="container">
            <div id="header">
                <p>STAFF PAGE</p>
            </div>
            <div class="row" id="sec">
                <div class="col-lg-4">             

                    <h5><a href="staff_nav.php" >STAFF HOME</a></h5>
                    <ol>
                        <li><a href="staff_changepass.php">Change Password</a></li>
                        <li><a href="staff_logout.php">LOG OUT</a></li>
                        <li><a href="personalise_staff.php">VIEW PROFILE</a></li>
                    </ol>   
                </div>
                <div class="col-lg-4">
                <h5>CUSTOMERS</h5>
                <ol>
                    <li><a href="staff_view_customers.php">VIEW CUSTOMERS</a></li>
                    <li><a href="staff_view_transactions.php">VIEW TRANSACTIONS</a></li> 
                    <li><a href="staff_display_comments.php">VIEW COMMENTS</a></li>
                    
                </ol>
                </div>
                 <div class="col-lg-4">
                <h5>TRANSACTIONS</h5>
                <ol>
                    <li><a href="deposit.php">DEPOSIT</a></li>
                    <li><a href="withdraw.php">WITHDRAWALS</a></li>                
                </ol>
                 </div>
            </div>
        </div>
        <br><br><br><br><br><br><br><br><br>
        <?php include 'footer.php'; ?>
        