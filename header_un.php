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
                <a href="http://www.facebook.com"><i class="fa fa-facebook"></i></a>
                <a href="www.twitter.com"><i class="fa fa-twitter"></i></a>
                <a href="www.google.com"><i class="fa fa-google-plus"></i></a>
                <a href="www.youtube.com"><i class="fa fa-youtube"></i></a>
            </div>
        </div>
        <div class="bar">
            <nav class="navbar">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span style="color:white">MENU</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span> 
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" data-hover="dropdown" data-animations="slidedown slidedown slidedown slidedown" id="myNavbar">
                        <ul class="nav navbar-nav">
                            <li><a href="index.php">Home</a></li>
                            <li  class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"  href="#">Account<span class="caret"></span></a>
                                <ul  class="dropdown-menu">                                    
                                    <li class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" href="#">Current Account<span class="caret"></span></a>
                                        <ul  class="dropdown-menu">
                                            <li><a href="balance.php">Balance inquiry</a></li>                       
                                            <li><a href="account_statement.php">Statements of Accounts</a></li>
                                        </ul> 
                                    </li>
                                </ul>
                            </li>
                            <li><a href="transfer.php">Transfer</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" href="#">About us<span class="caret"></span></a>
                                <ul  class="dropdown-menu">
                                    <li><a href="whoWeAre.php">Who we are</a></li>
                                    <li><a href="boardOfDirectors.php">Board of Director</a></li>
                                    <li><a href="exco.php">E.Management</a></li>
                                </ul>
                            </li>
                            <li><a href="contactUs.php"><span class="glyphicon glyphicon-earphone"></span>Contact us</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                             
                            <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
