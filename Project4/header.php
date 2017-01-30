<?php
/**
 * Created by PhpStorm.
 * User: marty
 * Date: 6/12/2016
 * Time: 3:56 PM
 */
if (@$_SESSION["loggedIn"] == "in")
    {
        $msg_header = "Welcome " . strtoupper($_SESSION["name"]);
        $msg_header .= "&nbsp &nbsp <a href = 'logout.php'><button>LOGOUT</button></a>";
    } else {
        $msg_header = "<a href = 'login.php'><button>LOGIN</button></a>";
        $msg_header .= " ";
        $msg_header .= "<a href = 'registration.php'><button>REGISTER</button></a>";
    }

if(!isset($_SESSION['myCart'])) {
    $_SESSION['myCart'] = array();
    $_SESSION['myToti'] = 0;
    $_SESSION['myTotp'] = 0;
}

?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <script src="../_js/jquery-1.7.2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div id="header">
        <h1>The Comic Book</h1>
        <p align = "right"><?php echo date(" l, F j, Y"); ?></p>
        <p align="right">
            Total Items = <?= $_SESSION['myToti'] ?> </br>
            Total Price = $<?=$_SESSION['myTotp'] ?> </br>
            <a href="Cart_View.php" style="color:#FFFFFF">View Cart</a>
        </p>
        <p align = "right"><?php echo $msg_header; ?></p>
    </div>
    
    <!-- START OF THE NAVIGATION BAR. -->
    <div id="wrap">
        <ul class="navbar">
            <li><a href="index.php">Home</a></li>
            <li><a href="Movies.php">Comic Movies</a>
            </li>
            <li><a href="Comics.php">Comic Books</a>
            </li>
            <li><a href="contact.php">Contact Us</a></li>
        </ul>
    </div>
    <!-- END OF THENAVIGATION BAR. -->
    
    <!-- START OF LEFT COLUMN -->
    <div id="left_col">
        <h3>Products</h3>
            <a href="Movies.php">Movies</a>
            <br/>
            <a href="Comics.php">Comics</a>
        <!--Used to allow only admin users to return to admin page-->
        <?php if (@$_SESSION['adminFlag'] == 1) { ?>
            <br />
            <a href="admin.php">Admin Menu</a><br />
            <br />
        <?php } ?>
    </div>
    <!-- END OF LEFT COLUMN -->
</body>

