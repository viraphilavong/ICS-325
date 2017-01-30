<?php session_start(); if (@$_SESSION['access'] == 2 || @$_SESSION['access'] == 1) { ?>
<p align = "right"><a href = "logout.php">Logout</button></a></p>
<?php } else { ?>
<p align = "right"><a href = "login.php"> Login </button></a></p>
<?php } ?>
<?php
/**
 * Created by PhpStorm.
 * User: marty
 * Date: 6/5/2016
 * Time: 1:52 PM
 */
require ("header.php");

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Index Page</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div id="left_col">
<h3>Products</h3>
</div>
<img src="uc1.png" height="600" width="600" align="middle">

<?php
require("footer.php");
?>
</body>
</html>

