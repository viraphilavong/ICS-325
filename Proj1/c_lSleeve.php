<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Children Long Sleeve</title>
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
    </ul>
</div>
<!-- That's it! -->
<div id="left_col">

</div>

<div id="section">
    <h1>Children Long Sleeve Shirt's</h1>
    <img src="auntie.jpg" height="600" width="600" align="middle">&nbsp; &nbsp;<h3>#1 Seller</h3>

    <p>
        Our <strong>Custom Screen Printed Next Level 60/40 Blend V-Neck T-Shirt</strong> (Style 6240) is made of
        super-soft, 60% Combed Ringspun Cotton & 40% Polyester like it’s crewneck counterpart, making it a Shirt Shop
        “Favorite.”  We like to say this t-shirt offers the “perfect v-neck dip,” being not too low and not too high,
        and is comfortable for the majority of people wearing it. However, it does feature a ladies companion style
        (Next  Level 6640) if you are looking for a large group of both men and women.
    </p>
    <p> </p>
    <p>
        Available in sizes S-2XL
    </p>

</div>

<div id="footer">
    <p>Webmasters : Alexander Philavong, Martin Austin, & Wanny Hoang </p>
</div>
</body>
</html>
