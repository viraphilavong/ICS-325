<?php
/**
 * Created by PhpStorm.
 * User: marty
 * Date: 6/12/2016
 * Time: 3:56 PM
 */
if (@$_SESSION['access'] == 2) {
    $msg = "Welcome Admin!";
} elseif (@$_SESSION['access'] == 1) {
    $msg = "Welcome Customer!";
} else {
    $msg = "Welcome Guest!";
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <script src="../_js/jquery-1.7.2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script>
        function getDate()
        {
            var now = new Date();
            var dayNames = new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
            var monNames = new Array("January","February","March","April","May","June","July","August","September","October","November","December");
            document.write(dayNames[now.getDay()] + " " + monNames[now.getMonth()] + " " + now.getDate() + ", " + now.getFullYear()) + " , ";
        }
    </script>
</head>
<div id="header">
    <h1>The Comic Book</h1>
    <p align = "left"><script>getDate();</script></p></ br>
    <p align = "left"><?php echo $msg ?></p></ br>
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
</html>