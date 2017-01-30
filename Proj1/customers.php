<?php
/**
 * Created by PhpStorm.
 * User: AlexPhilavong
 * Date: 6/13/2016
 * Time: 11:22 AM
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Customers</title>
    <script src="../_js/jquery-1.7.2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="Style1.css"/>
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
<body>
<div id="header">
    <h1>The Shirt Shop</h1>
    <p align = "right"><script>getDate();</script></p>
</div>
<div id="wrap">
    <ul class="navbar">
        <li><a href="index.php">Home</a></li>
        <li><a href="#">New Arrivals</a></li>
        <li><a href="adult.php">Adult</a></li>
        <li><a href="children.php">Children</a></li>
        <li><a href="contact.php">Contact Us</a></li>
        <li><a href="index.php">Register</a></li>
        <li><a href="customers.php">Customers</a></li>
    </ul>
</div>
<div id="left_col">
</div>
<h3>Current Customers</h3>
<?php
$filePointer = fopen("testfile.txt", "r");
if (!$filePointer)
{
    print "The customer file is empty or missing";
    exit;
}

while(!feof($filePointer))
{
    $customerInfo = fgetcsv($filePointer, 0, ",", "\n");   // read
    if($customerInfo!="")
    {
        print "<td>$customerInfo[0],$customerInfo[1],$customerInfo[2],$customerInfo[3],$customerInfo[4],$customerInfo[5],$customerInfo[6] <br /></td>";
    }  // end if
}  // end while
?>
<div id="footer">
    <p>Webmasters : Alexander Philavong, Martin Austin, & Wanny Hoang </p>
</div>
</body>
