<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Contact</title>
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
<!-- Here's all it takes to make this navigation bar. -->
<div id="wrap">
    <ul class="navbar">
        <li><a href="index.php">Home</a></li>
        <li><a href="#">New Arrivals</a></li>
        <li><a href="adult.php">Adult</a></li>
        <li><a href="#">Children</a></li>
        <li><a href="contact.php">Contact Us</a></li>
        <li><a href="index.php">Register</a></li>
        <li><a href="customers.php">Customers</a></li>
    </ul>
</div>
<!-- That's it! -->
<div id="left_col">
</div>

<div id="section">
    <h1>Contact Information</h1>
    <p>
        &nbsp; &nbsp; Thank you for your interest in contacting The Shirt Shop. If you would like additional information about shirts or
        like to be on our mailing list for upcoming sales, please leave your name and email address with any questions or comments you
        might have..
    </p>
    <p> </p>
    <p>
        By Email<br>
        support@theshirtshop.com<br>
    </p>
    <p> </p>
    <p>
        Address<br>
        The Shirt Shop<br>
        123 Oak Ave<br>
        St Paul, MN 55112<br>
    </p>
    <p> </p>
    <p>
        Phone<br>
        1-800-123-4567<br>
    </p>
</div>

<div id="footer">
    <p>Webmasters : Alexander Philavong, Martin Austin, & Wanny Hoang </p>
</div>
</body>
</html>
