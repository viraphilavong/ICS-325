<?php
session_start();
session_destroy();
/**
 * Created by PhpStorm.
 * User: marty
 * Date: 6/16/2016
 * Time: 2:04 PM
 */

$msg = "Goodbye!";

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Logout Form</title>
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
<body>
<div id="left_col">
    <h3>Products</h3>
</div>
You have successfully logged out!
</br>
<a href = "login.php">Click here to login!</button></a></p>
<?php
require ("footer.php");
?>
</body>
</html>