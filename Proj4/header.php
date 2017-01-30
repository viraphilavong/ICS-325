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
        <p align = "right"><?php echo $msg_header ?></p></ br>
    </div>
    <!-- Here's all it takes to make this navigation bar. -->
    <div id="wrap">
        <ul class="navbar">
            <li><a href="index.php">Home</a></li>
            <li><a href="#">Comic Characters</a>
                <ul>
                    <li><a>Super Heroes</a></li>
                    <li><a>Anti Heroes</a></li>
                    <li><a>Villains</a></li>
                    <li><a>Featured Character</a></li>
                </ul>
            </li>
            <li><a href="#">Comic Books</a>
                <ul>
                    <li><a>Golden Age</a></li>
                    <li><a>Silver Age</a></li>
                    <li><a>Bronze Age</a></li>
                    <li><a>Modern Age</a></li>
                </ul>
            </li>
            <li><a>Contact Us</a></li>
        </ul>
    </div>
</body>
