<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Children</title>
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
        <li><a href="children.php">Children</a></li>
        <li><a href="contact.php">Contact Us</a></li>
        <li><a href="index.php">Register</a></li>
        <li><a href="customers.php">Customers</a></li>
    </ul>
</div>
<!-- That's it! -->
<div id="left_col">

</div>

<div id="section">
    <h1>Children Shirt's</h1>
    <a href="c_sSleeve.php"><img src="sSleeve.jpg" height="100" width="100" align="middle"></a>&nbsp; &nbsp;<h3>Short Sleeve T-shirts</h3>
    <a href="c_lSleeve.php"><img src="lSleeve.jpg" height="100" width="100" align="middle"></a>&nbsp; &nbsp; <h3>Long Sleeve T-shirts</h3>
    <img src="sweatshirt.jpg" height="100" width="100" align="middle">&nbsp; &nbsp; <h3>Sweatshirts</h3> <br />
    <p>More </p>

</div>

<div id="footer">
    <p>Webmasters : Alexander Philavong, Martin Austin, & Wanny Hoang </p>
</div>
</body>
</html>
